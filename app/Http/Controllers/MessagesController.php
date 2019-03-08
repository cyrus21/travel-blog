<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all message data
        $messages = Message::all();
        // return view
        return view ('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view
        return view ('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        // validate request data
        // $validated = request()->validate([
        //     'message_name' => 'required',
        //     'message_email' => ['required','email','regex:/(.*)@(gmail|yahoo)\.com/i'],
        //     'message_title' => 'required',
        //     'message_details' => 'required'
        // ]);
        // create method
        Message::create(
            request()->validate([
                'message_name' => 'required',
                'message_email' => ['required','email','regex:/(.*)@(gmail|yahoo)\.com/i'],
                'message_title' => 'required',
                'message_details' => 'required'
            ])
        );

        // redirect after success
        return redirect('/message');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
        return view ('messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        return view ('messages.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Message $message)
    {
        // validate request data
        // $validated = request()->validate([
        //     'message_name' => 'required',
        //     'message_email' => ['required','email','regex:/(.*)@(gmail|yahoo)\.com/i'],
        //     'message_title' => 'required',
        //     'message_details' => 'required'
        // ]);
        //  update data
        $message->update(
            request()->validate([
                'message_name' => 'required',
                'message_email' => ['required','email','regex:/(.*)@(gmail|yahoo)\.com/i'],
                'message_title' => 'required',
                'message_details' => 'required'
            ])
        );

        return redirect('/message');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
        $message->delete();

        return redirect('/message');
    }
}
