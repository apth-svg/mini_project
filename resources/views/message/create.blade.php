@extends('layouts.master')

@section('css')
    <style>
        .progress { position:relative; width:100%; }
        .bar { background-color: #06e606; width:0%; height:20px; }
        .percent { position:absolute; display:inline-block; left:50%; color: #7F98B2;}
   </style>
@endsection

@section('content')
<div class="page-wrapper">
   
    <div class="page-body">
        <div class="card">
            <div class="card-block"> 
                <h4>Create Message </h4>
                 
                   @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                <form action="{{ route('message.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                     <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Letter No</label>
                    <div class="col-sm-10">
                          <input type="number" name="letter_no" class="form-control">
                    </div>
                </div>
                 <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Date</label>
                    <div class="col-sm-10">
                          <input type="date" name="date" class="form-control">
                    </div>
                </div>
                 <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                          <input type="text" name="title" class="form-control" placeholder="Enter Title">
                    </div>
                </div>
                 <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Detail</label>
                    <div class="col-sm-10">
                        <textarea name="detail" class="form-control" placeholder="Enter Detail"></textarea>
                    </div>
                </div>
                 <div class="form-group row">
                    <label class="col-sm-2 col-form-label">User</label>
                    <div class="col-sm-10">
                        <select name="user_id" class="form-control">
                            <option value="">Select User</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->role }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                 <div class="form-group row">
                    <label class="col-sm-2 col-form-label">File</label>
                    <div class="col-sm-10">
                        <input type="file" name="file_name">
                    </div>
                     <div class="progress">
                        <div class="bar"></div >
                        <div class="percent">0%</div >
                    </div>
                </div>
                <div x-data="{loop:1}">
                    <template x-for="(item,index) in loop" :key="item">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Copy User</label>
                                <div class="col-sm-10">
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <div x-show="index==0">
                                                <button type="button" class="btn btn-round btn-success" x-on:click="loop++">Copy Department</button>
                                            </div>
                                            <div x-show="index!=0">
                                                <button type="button" class="btn btn-round btn-danger" x-on:click="loop--">-</button>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <select name="copy_user" id="" class="form-control">
                                                        <option value="">Select User</option>
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->id }}">{{ $user->role }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </template>
                </div>
                <input type="submit" class="btn btn-primary" value="Send" style="float: right">
                <a href="{{ route('message.index') }}" class="btn btn-warning">Back</a>
                
                </form>
              
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
<script type="text/javascript">
    $(function() {
         $(document).ready(function()
         {
            var bar = $('.bar');
            var percent = $('.percent');

      $('form').ajaxForm({
        beforeSend: function() {
            var percentVal = '0%';
            bar.width(percentVal)
            percent.html(percentVal);
        },
        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.width(percentVal)
            percent.html(percentVal);
        },
        complete: function(xhr) {
            alert('File Uploaded Successfully');
            window.location.href = "/message";
        }
      });
   }); 
 });
</script>

@endsection

