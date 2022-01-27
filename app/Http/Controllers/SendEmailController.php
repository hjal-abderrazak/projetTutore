<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendEmailController extends Controller
{
    function index()
    {

    }

    function send(Request $request)
    {
     $this->validate($request, [

      'email'  =>  'required|email',
      'message' =>  'required'
     ]);

        $data = array(

            'message'   =>   $request->message
        );

     Mail::to('hjel.abderrazak@gmail.com')->send(new SendMail($data));
     return redirect()->route('home')->with('success', 'Thanks for contacting us!');

    }
}
