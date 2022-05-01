<?php

namespace App\Mail;

use App\Models\Lesson;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MyMailTest extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    /**
     * Build the message.
     *
     * @return $this
     */
    public function __construct($grade)
    {
        $this->grade = $grade;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $lesson = Lesson::with('student')->where('teacher_id', '=', Auth::user()->id)->get();
        foreach ( $lesson as $lessons)
        {
            $less = $lessons->subject;
            $desc = $lessons->description;
            $usersName = $lessons->student->name;
        }
        return $this->subject('Mail from CICS')
                    ->view('emails.myTestMail', compact('less','usersName','desc'));
    }
}
