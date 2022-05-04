<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeTeacherMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($teacher)
    {
        $this->teacher = $teacher;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // dd($this->user->name);
        $user = $this->teacher->name;
        $email = $this->teacher->email;
        $pass= Crypt::decrypt($this->teacher->password);
        // dd($pass);
        return $this->subject('CICS Account Credentials')->view('emails.teacherMail',compact('user', 'pass','email'));
    }
}
