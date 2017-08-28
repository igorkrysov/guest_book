<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $messages = Message::all();

        return view('messages', ['messages' => $messages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create_message');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'message' => 'required',
          'dst' => 'required',
          'mail' => 'required|email',
          'captcha' => 'required|captcha'
        ]);

        $message = new Message();
        $message->dst = $request->input('dst');
        $message->mail = $request->input('mail');
        $message->message = $request->input('message');
        $message->origin_name = $request->input('origin_name');
        $message->file_name = $request->input('file_name');

        $message->save();

        return response()->json(['message' => 'Message is send']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function get_captcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }

    public function load_file(Request $request)
    {
        if ($request->hasFile('attach')) {
            $filename = time().".".$request->file('attach')->getClientOriginalExtension();
            $request->file('attach')->storeAs('public/', $filename);

            return response()->json(['file_name' => $filename, 'oring_name' => $request->file('attach')->getClientOriginalName()]);
        }
        
        return response()->json(['file_name' => 'error', 'oring_name' => 'sadfasdf']);
    }
}
