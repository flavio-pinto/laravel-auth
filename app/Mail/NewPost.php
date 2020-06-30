<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Post;

class NewPost extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Istanza post
     */
    private $post;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('miosito@testmail.com') // possiamo settare in .env il MAIL_FROM_ADDRESS in modo globale, oppue settarlo qui con il metodo from
                    ->subject('Nuovo post pubblicato!')
                    //->view('email.new-post') //questo metodo si usa se si punta alla semplice view e non si fa markdown
                    ->markdown('email.new-post') //questo metodo si usa se vogliamo inviare nella mail con il formato markdown
                    ->with([
                        'title' => $this->post->title,
                        'slug' => $this->post->slug
                    ]);
    }
}
