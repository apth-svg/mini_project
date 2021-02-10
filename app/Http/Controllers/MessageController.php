<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use App\Models\CopyUser;
use App\Models\AttachFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $message = Message::all();
        $attach_file = AttachFile::all();
        $copy_user = CopyUser::all();
        return view('message.detail')->with([
            'message' => $message,
            'attach_file' => $attach_file,
            'copy_user' => $copy_user,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('message.create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'letter_no' => 'required',
            'date' => 'required',
            'title' => 'required',
            'detail' => 'required',
            'user_id' => 'required',
            'copy_user' => 'required',
            'file_name' => 'required',
        ]);
        $arr = $request->all();

        $mess = Message::select('id')->get();
        $count = count($mess);

        if (++$count) {
            CopyUser::create([
                'user_id' => $request->copy_user,
                'message_id' =>  $count
            ]);

            if ($request->has('file_name')) {
                $file = $request->file('file_name');
                $filename = time() . '.' . $request->file('file_name')->extension();
                $filepath = public_path() . '/files/uploads/';
                $file->move($filepath, $filename);
            }
            AttachFile::create([
                'message_id' => $count,
                'file_name' => $filename
            ]);
        }

        Message::create([
            'letter_no' => $request->letter_no,
            'date' => $request->date,
            'title' => $request->title,
            'detail' => $request->detail,
            'user_id' => $request->user_id,
        ]);

        return redirect('/message')->with('message', 'Message Data Successfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message = Message::findOrFail($id);
        $attach = AttachFile::findOrFail($id);
        $copy_user = CopyUser::findOrFail($id);
        return view('message.show')->with([
            'message' => $message,
            'attach' => $attach,
            'copy_user' => $copy_user,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
