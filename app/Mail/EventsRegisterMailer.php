<?php

namespace App\Mail;

use App\Models\EventsRegistration;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterMailer extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     *
     * @var EventsRegistration $contact
     */
    private $eventsRegistration;

    /**
     * RegisterMailer constructor.
     *
     * @param EventsRegistration $eventsRegistration
     */
    public function __construct( EventsRegistration $eventsRegistration )
    {
        $this->eventsRegistration = $eventsRegistration;
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
            __( 'emails.users.username' ) . ': ' . $this->eventsRegistration->username,
            __( 'emails.users.email' ) . ': ' . $this->eventsRegistration->email,
            __( 'emails.users.mobile' ) . ': ' . $this->eventsRegistration->phone_number,
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
