<?php

namespace App\Http\Controllers;

use App\Mail\EmailMessage;
use App\Models\User;
use App\Models\VerificationCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function verification_page(){
        return view('verification_page');
    }

    public function verify_code(Request $request){
        
        // dd($request->all());

        $validationCode = VerificationCode::where('user_id', auth()->user()->id)->first();
    
        if ($validationCode && $validationCode->code == $request->code) {
            auth()->user()->update(['email_verified_at' => now()]);
            auth()->user()->refresh();    
            // $validationCode->delete();
    
            return redirect()->route('user.index')->with('success', 'Your email has been successfully verified!');
        } else {
            return redirect()->back()->with('error', 'Invalid verification code.');
        }
    }

    public static function sendCode($id,$data){

        $user = User::find($id);
        Mail::to($user->email)->send(new EmailMessage($data));

    }
}
