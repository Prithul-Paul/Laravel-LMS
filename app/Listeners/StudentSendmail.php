<?php

namespace App\Listeners;

use App\Events\StudentCreate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;
class StudentSendmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(StudentCreate $event): void
    {
        $student_detail = $event->student_details;
        $data = ['name'=>$student_detail->name];
        $user['to'] = $student_detail->email;
        Mail::send('mail/user_mail_body', $data, function($messages) use ($user){
            $messages->to($user['to']);
            $messages->subject('User Created');
        });
    }
}
