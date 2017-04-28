<?php
/**
 * Manage User information.
 */

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

/**
 * Class User
 * @package App\Models
 */
class User extends Authenticatable
{
    use Notifiable;

    /** @var array The attributes that are mass assignable. */
    protected $fillable = [
        'email', 'password',
    ];

    /** @var array The attributes that should be hidden for arrays. */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get an encrypted password.
     *
     * @param string $password Plain password
     *
     * @return string Encrypted password
     */
    private function getEncryptedPassword( string $password )
    {
        return bcrypt( $password );
    }

    /**
     * Create a new user.
     *
     * @param array $data Data to create a new user
     *
     * @return User The new user
     */
    public function createNewUser( array $data )
    {
        return $this->create( [
                                  'email'    => $data['email'],
                                  'password' => $this->getEncryptedPassword( $data['password'] ),
                              ] );
    }

    /**
     * Change the authenticated user's password.
     *
     * @param string $password
     *
     * @return bool true = success, false = fail
     */
    public function changePassword( string $password )
    {
        $user           = Auth::user();
        $user->password = $user->getEncryptedPassword( $password );

        return $user->save();
    }
}
