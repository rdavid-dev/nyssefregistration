<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Mail;
use App\Email;

class AdminController extends Controller {

    public function rand_string($digits) {
        $alphanum = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz" . time();
        $rand = substr(str_shuffle($alphanum), 0, $digits);
        return $rand;
    }

    public function SendMail($data) {
        $template = view('mail.layouts.template')->render();
        $content = view('mail.' . $data['template'], $data['data'])->render();
        $view = str_replace('[[email_message]]', $content, $template);
        $data['content'] = $view;
//        $headers = "MIME-Version: 1.0" . "\r\n";
//        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
//        $headers .= 'From: admin@laravel.com' . "\r\n" .
//                'Reply-To: no-reply@laravel.com' . "\r\n" .
//                'X-Mailer: PHP/' . phpversion();
//        $va = str_replace('[[email_message]]', $content, $template);
//        return mail($data['to'], $data['subject'], $va, $headers);
        Mail::send([], [], function ($message) use ($data) {
            $message->from('admin@90daysplan.com', env('PROJECT_NAME', 'Demo'));
            $message->replyTo('no-reply@90daysplan.com', env('PROJECT_NAME', 'Demo'));
            $message->subject($data['subject']);
            $message->setBody($data['content'], 'text/html');
            $message->to($data['to']);
        });
    }

    public function get_email_data($slug, $replacedata = array()) {
        $email_data = Email::where(['slug' => $slug])->first();
        $email_msg = "";
        $email_array = array();
        $email_msg = $email_data->body;
        $subject = $email_data->subject;
        if (!empty($replacedata)) {
            foreach ($replacedata as $key => $value) {
                $email_msg = str_replace("{{" . $key . "}}", $value, $email_msg);
            }
        }
        return array('body' => $email_msg, 'subject' => $subject);
    }

}
