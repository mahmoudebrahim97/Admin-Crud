<?php

namespace App\Http\Controllers;

use App\Mail\UserMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function mail($id)
    {
        $user = User::where("id", $id)->first();
        return view('users.mail', compact('user'));
    }
    public function send_mail(Request $request)
    {
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];
        Mail::to($details['email'])->send(new UserMail($details));
        return redirect()->back()->with('sent successfully', 'The Mail Sent Successfully');
    }
    public function mail_to_all_users()
    {
        $users = User::where('role_name', '!=', '["admin"]')->get();
        return view('users.all_users_mail', compact('users'));
    }
    public function send_mail_all_users(Request $request)
    {
        $users = User::where('role_name', '!=', '["admin"]')->get();
        foreach($users as $user){
            $details = [
                'message' => $request->message,
            ];
            Mail::to($user)->send(new UserMail($details));
        }
        return redirect()->back()->with('sent successfully', 'The Mail Sent Successfully');
    }

}
