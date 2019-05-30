<?php

namespace App\Mail;

use App\Models\Users;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterMailer extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     *
     * @var Users $contact
     */
    private $users;

    /**
     * RegisterMailer constructor.
     *
     * @param Users $users
     */
    public function __construct( Users $users )
    {
        $this->users = $users;
        $this->onQueue( env( 'REGISTER_MAIL_QUEUE', 'register_email' ) );
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $introLines = [
            __( 'emails.users.username' ) . ': ' . $this->users->username,
            __( 'emails.users.email' ) . ': ' . $this->users->email,
            __( 'emails.users.mobile' ) . ': ' . $this->users->phone_number,
        ];

        return $this->markdown( 'notifications::email' )
                    ->subject( __( 'emails.users.subject' ) )
                    ->with( [
                                'greeting'   => __( 'emails.users.greeting' ),
                                'level'      => '',
                                'introLines' => $introLines,
                                'actionText' => __( 'emails.users.actionText' ),
                                'actionUrl'  => route( 'home.index' ),
                                'outroLines' => [
                                    __( 'emails.users.actionDetail' ),
                                ],
                            ] );
    }
}
