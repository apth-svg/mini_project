@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="page-body">
        <div class="card">
            <div class="card-header">
                <h5>Message Details</h5>
                <div style="float: right">
                    <a class="btn btn-primary btn-round" href="{{ route('message.create') }}">Create</a>
                </div>
            </div>
            <div class="card-block">
                 @if (session('message'))
                      <div class="alert alert-success">
                       {{ session('message') }}
                      </div>
                  @endif
                <div class="table-responsive dt-responsive">
                    <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No</th>
                                <th>Date</th>
                                <th>Title</th>
                                <th>Detail</th>
                                <th>User</th>
                                <th>Copy_User</th>
                                <th>Download</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attach_file as $attach)
                                <tr>
                                    <td>{{ $attach->id }}</td>
                                    <td>{{ $attach->message->letter_no }}</td>
                                    <td>{{ $attach->message->date }}</td>
                                    <td>{{ $attach->message->title }}</td>
                                    <td><p>{!! substr($attach->message->detail,0,40)  !!}</p></td>
                                    <td>{{  $attach->message->user->role }}</td>
                                    <td>{{ $attach->message->user->role}}</td>
                                    <td>
                                        <a href="files/uploads/{{ $attach->file_name }}"
                                            download="{{ $attach->file_name }}">
                                            <button class="btn btn-success">Download</button>
                                        </a>
                                       
                                    </td>
                                    <td>
                                    <a class="btn btn-primary btn-round" href="{{ route('message.edit',$attach->id) }}">Show</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


