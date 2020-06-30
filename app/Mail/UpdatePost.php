<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Post;

class UpdatePost extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * post instance
     */
    protected $post;

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
        return $this->from('miosito@testmail.com')
                    ->subject('Post aggiornato!')
                    ->view('email.edit-post') //in questo caso uso la semplice view invece del markdown
                    ->with([
                        'title' => $this->post->title
                    ]);
    }
}
