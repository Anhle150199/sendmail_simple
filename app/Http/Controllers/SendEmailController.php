<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendEmailRequest;
use App\Mail\NotifyEmail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    public function index()
    {
        return view('form');
    }
    public function sendMail(SendEmailRequest $request)
    {
        try {
            $mailable = new NotifyEmail($request->subject, $request->content);
            Mail::to($request->email)->send($mailable);
            return new JsonResponse(['success'], 200);
        } catch (\Throwable $th) {
            return new JsonResponse(['error', $th], 406);
        }
    }
}
