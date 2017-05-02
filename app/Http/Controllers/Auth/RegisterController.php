<?php
/**
 * Register a user.
 */

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

/**
 * Class RegisterController
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

    /** @var  User model instance */
    private $userModel;

    /**
     * Initialize RegisterController class.
     */
    public function __construct( User $user )
    {
        $this->userModel = $user;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data Data to validate
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator( array $data )
    {
        return Validator::make( $data, config( 'validation.authentication' ) );
    }

    /**
     * Redirect the user to another page after the user has been registered.
     *
     * @param  \Illuminate\Http\Request $request HTTP request object
     * @param  mixed                    $user    User
     *
     * @return \Illuminate\Http\RedirectResponse HTTP redirect response
     */
    protected function registered( Request $request, $user )
    {
        return redirect()->route( 'home.index' );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data Data to create a new user
     *
     * @return User The new user
     */
    protected function create( array $data )
    {
        return $this->userModel->createNewUser( $data );
    }
}
