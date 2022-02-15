<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;
use Mail;
use MetaTag;
use View;

use App\Seo;
use App\Email;
use App\Notification;
use App\Event;
use App\UserMaster;

class Controller extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    public function __construct(Request $request) {
        if (!$request->ajax()) {
            $route = Route::currentRouteName();
            $seo = Seo::where(['route' => $route])->first();
            if (count($seo) == 0) {
                $seo = new Seo;
                $seo->route = $route;
                $seo->save();
            }
            if ($seo != NULL) {
                MetaTag::set('title', $seo->title);
                MetaTag::set('keyword', $seo->keyword);
                MetaTag::set('description', $seo->description);
//                MetaTag::set('image', asset('images/locked-logo.png'));
            }
			
			$event=Event::where('status', '1')->orderBy('created_at', 'DESC')->first();
			if ($event != NULL) {
				$running_event_id = $event->id;
				View::share ('running_event_id', $running_event_id);
			}
        }
    }

    public function rand_string($digits) {
        $alphanum = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz" . time();
        $rand = substr(str_shuffle($alphanum), 0, $digits);
        return $rand;
    }

    public function rand_number($digits) {
        $alphanum = "123456789" . time();
        $rand = substr(str_shuffle($alphanum), 0, $digits);
        return $rand;
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
            $message->from('admin@nyssefregistration.com', env('PROJECT_NAME', 'Demo'));
            $message->replyTo('no-reply@nyssefregistration.com', env('PROJECT_NAME', 'Demo'));
            $message->subject($data['subject']);
            $message->setBody($data['content'], 'text/html');
            $message->to($data['to']);
        });
    }
	
	static public function get_user_details($user_id){
		$model = UserMaster::where('id', '=', $user_id)->where('status', '<>', '3')->first();
		
		return $model;
	}

}
