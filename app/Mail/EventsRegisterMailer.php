<?php

namespace App\Mail;

use App\Models\EventsRegistration;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EventsRegisterMailer extends Mailable implements ShouldQueue
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
    public function __construct( $result )
    {
        $this->eventsRegistration = $result;
        $this->onQueue( env( 'EVENTS_REGISTER_MAIL_QUEUE', 'events_register_email' ) );
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $introLines = [
            __( 'emails.events_registration.name' ) . ': ' . $this->eventsRegistration->first_name . ' ' . $this->eventsRegistration->last_name ,
            __( 'emails.events_registration.email' ) . ': ' . $this->eventsRegistration->email,
            __( 'emails.events_registration.phone' ) . ': ' . $this->eventsRegistration->phone_number,
        ];

        return $this->markdown( 'notifications::email' )
                    ->subject( __( 'emails.events_registration.subject' ) )
                    ->with( [
                                'greeting'   => __( 'emails.events_registration.greeting' ),
                                'level'      => '',
                                'introLines' => $introLines,
                                'actionText' => __( 'emails.events_registration.actionText' ),
                                'actionUrl'  => route( 'home.index' ),
                                'outroLines' => [
                                    __( 'emails.events_registration.actionDetail' ),
                                ],
                            ] );
    }
}
