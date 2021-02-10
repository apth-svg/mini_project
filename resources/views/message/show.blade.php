@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="page-body">
        <div class="card">
            <div class="card-header">
                <p style="float: right;color:black;font-size:1rem"> စာအမှတ်-{{ $attach->message->letter_no }}</p><br><br>
                <p style="float: right;color:black;font-size:1rem;">ရက်စွဲ-{{ $attach->message->date }}</p>
            </div>
            <div class="card-body">
                <p style="color:black;font-size:1rem;">သို.</p>
                <p style="color:black;font-size:1rem;">အကြောင်းအရာ-{{ $attach->message->title }}</p>
                <p style="color:black;font-size:1rem;">ရည်ညွန်းစာ-{{ $attach->message->user->role }}</p>
                <p style="color:black;font-size:1rem;">{{ $attach->message->detail }}
                    <a href="files/uploads/{{ $attach->file_name }}"
                        download="{{ $attach->file_name }}">
                      Download
                    </a>
                </p>
                <p style="color:black;font-size:1rem;">သို.{{ $copy_user->message->user->role }}</p>
                <p style="color:black;font-size:1rem;">သို.{{ $copy_user->user->role }}</p>
            </div>
        </div>
    </div>
</div>

@endsection


