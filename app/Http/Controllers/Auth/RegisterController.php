<?php
/**
 * This is a controller that use for registering an account.
 */

namespace App\Http\Controllers\Auth;

use App\Mail\RegisterMailer;
use App\Models\OrganizationCategory;
use App\Models\Users;
use App\Models\InterestIn;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Http\Requests\RecaptchaRequest;
use Illuminate\Foundation\Auth\RegistersUsers;

/**
 * Register User Controller
 * @package App\Http\Controllers\Auth
 */
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /** @var string Where to redirect users after register */
    protected $redirectTo;

    /** @var Users User model */
    protected $usersModel;

    /** @var InterestIn InterestIn model */
    protected $interestInModel;

    /** @var OrganizationCategory OrganizationCategory model */
    protected $organizationCategoryModel;

    /**
     * Initialize RegisterController class.
     *
     * @param Users $users Users model
     */
    public function __construct( Users $users, InterestIn $interestIn, OrganizationCategory $organizationCategory )
    {
        $this->middleware( 'guest' );

        $this->usersModel                = $users;
        $this->interestInModel           = $interestIn;
        $this->organizationCategoryModel = $organizationCategory;
        $this->redirectTo                = route( 'home.index' );
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator( array $data )
    {
        return Validator::make( $data, [
            'email'             => config( 'validation.authentication.email' ),
            'password'          => config( 'validation.authentication.password' ),
            'fk_permission_id'  => config( 'validation.authentication.fk_permission_id' ),
            'image_path'        => config( 'validation.authentication.image_path' ),
        ] );
    }

    /**
     * Handle a registration request for the application.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function register( Request $request )
    {
        $this->validator( $request->input() )->validate();

        event( new Registered( $user = $this->create( $request ) ) );

        Mail::to( $request->input( 'email' ) )
            ->send( new RegisterMailer( $user ) );

        if( $request->expectsJson() ){
            $message = ( $user ) ? __( 'register.form_submitted.success_message' )
                : __( 'register.form_submitted.failed_message' );

            return response()->json( [ 'success' => true, 'message' => $message ] );
        }

        $this->guard()->login( $user );

        return $this->registered( $request, $user )
            ?: redirect( $this->redirectPath() );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param Request $request User data
     *
     * @return Users              Users model
     */
    protected function create( Request $request )
    {
        return $this->usersModel->createUser( $request );
    }

    /**
     * Process this function after the user has been registered.
     *
     * @param Request $request Form request object
     * @param Users   $users   The registered user
     *
     * @return    \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function registered( Request $request, Users $user )
    {
        if( $request->ajax() ){
            return response()->json( [ 'redirectUrl' => $this->redirectPath() ] );
        } else {
            return redirect( $this->redirectPath() );
        }
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    protected function showRegistrationForm()
    {
        $interestList             = $this->interestInModel->getInterestInList();
        $organizationCategoryList = $this->organizationCategoryModel->getOrganizationCategoryList();

        return view( 'auth.register', compact( 'interestList', 'organizationCategoryList' ) );
    }

}
