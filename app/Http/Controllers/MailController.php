<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendemail(){
        $details=[
            'title'=>'Mail from Eshopper',
            'body'=>'Thank you for your order.'
        ];
        Mail::to("payalkushwah19@gmail.com")->send(new OrderMail($details));
        return "Email Sent";
    }
}
