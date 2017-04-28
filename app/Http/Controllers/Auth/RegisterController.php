<?php
/**
 * Register a user.
 */

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
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

    /** @var string Where to redirect users after register */
    protected $redirectTo;

    /** @var  User model instance */
    private $userModel;

    /**
     * Initialize RegisterController class.
     */
    public function __construct( User $user )
    {
        $this->redirectTo = route( 'home.index' );
        $this->userModel  = $user;
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
     * Create a new user instance after a valid registration.
     *
     * @param  array $data Data to create a mew user
     *
     * @return User The new user
     */
    protected function create( array $data )
    {
        return $this->userModel->createNewUser( $data );
    }
}
