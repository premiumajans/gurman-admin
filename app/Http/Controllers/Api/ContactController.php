<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Exception;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        try {
            $receiver = settings('mail_receiver');
            $contact = new Contact();
            $contact->name = $request->name;
            $contact->phone = $request->phone;
            $contact->email = $request->email;
            $contact->file = upload('files', $request->file);
            $contact->read_status = 0;
            $contact->message = $request->message;
            $contact->save();
//          $data = [
//              'name' => $contact->name,
//              'phone' => $contact->phone,
//              'email' => $contact->email,
//              'file' => $contact->file,
//              'msg' => $contact->message
//          ];
//          Mail::send('backend.mail.send', $data, function ($message) use ($receiver) {
//              $message->to($receiver);
//              $message->subject(__('backend.you-have-new-message'));
//          });
            return response()->json(['message' => 'success'], 200);
        } catch (Exception $e) {
            return response()->json(['message' => 'error'], 500);
        }
    }
}
