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

            'Dear ' . $this->users->username,
            'Thank you for joining The Givers Network. Our ability to increase impact comes from members like you. We will be adding many new features, and updates over the next few months to allow you to share and interact with other members more. Please bear with us as we grow. The platform is built to support greater giving and impact for people and organizations, so please send your suggestions and questions to joinus@giversnetwork.org',
            'How to get started',
            '1. Complete your profile, tell us who you are and what you are passionate about. Don’t forget your picture. People like to know who they are networking and sharing ideas with.',
            '2. If you have an organization you would like to add to The Givers Network, please fill out this form. Don’t forget to add your website and social media links. We will be adding more functionality to organizations soon. http://bit.ly/TGN-Org-Signup',
            '3. Share something! https://www.giversnetwork.org/share We would love to hear about your project wins and challenges in the SHARE section. This can be an article you have written, a great project you heard about or are involved with. We also encourage you to share your challenges. When you SHARE what you or your organization is challenged with, this allows our community to assist and start conversations on how to improve or solve the problem',
            '4. GIVE or ASK for an item https://www.giversnetwork.org/give This section is for you to GIVE an item, service, or volunteer your time. It is also the place for you to ask for what your program or organization needs. Be specific, the more specific you are the easier it is for other GIVERS to determine if they can help you.  For example: “ 30 Childrens basic reading books 5-7 year olds in Thai” is a much clearer ASK then  “Children’s books needed.” This will save you time as GIVERS are clear on what you need, and donation resources are not wasted by sending the wrong items.',
            '5. LEARN https://www.giversnetwork.org/learn This is where Case studies, guides and other knowledge sharing content will be placed. This will be open to member contribution soon, for now please submit your content to joinus@giversnetwork.org',
            '6. EVENTS https://www.giversnetwork.org/events If you have an event you think we would be interested in, or to share with our network, please send details to us. The event, should have an act of giving, or support impact towards the one of the UN’s SDG goals. This will be open to member contribution soon, for now please submit your content to joinus@giversnetwork.org',
            'You can also follow us at',
            'Facebook : https://www.facebook.com/thegiversnetwork/',
            'Facebook Groups: https://www.facebook.com/groups/giversnetwork/',
            'Or',
            'Youtube: https://www.youtube.com/thegiversnetwork',
            'For any questions, please contact joinus@giversnetwork.org',
            'Again we thank you for joining us.',
            '“Together We Can Give Better”',
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
