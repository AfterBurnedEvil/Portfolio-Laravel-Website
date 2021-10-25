<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
class MessageController extends Controller
{
    public function viewall()
    {
        $messages = Message::all();

        return view('messages.viewallmessages',compact('messages'));
    }

    public function delete($id)
    {
        $messz = Message::find($id);
        $messz->delete();
        return redirect()->route('message_viewall');
    }

    public function sendmessage(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);
        Message::create($request->all());
  
        return redirect()->route('home')->with('message','Your message was successfully received.');
    }
}
