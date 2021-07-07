<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Mail;
class MailController extends Controller
{
    public function sendEmail(){
            $details = [
                'title' => 'Mail from zombiesite.com',
                'body' => 'Your personal info was successfully updated.'
            ];
            \Mail::to('victoria.s@solid-sl.com')->send(new Mail($details));
            dd("Email is Sent.");
        }
}
