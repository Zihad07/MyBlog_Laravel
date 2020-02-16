@extends('layouts.admin')
@section('title','User Comments')

@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header bg-light">
                <strong>{{auth()->user()->name}}'s</strong> Comments
            </div>

            <div class="card-body">

                @include('includes.success')
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Post</th>
                            <th>Content</th>
                            <th>Create at</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(auth()->user()->comments as $comment)
                            <tr>
                                <td>{{$comment->id}}</td>
                                <td class="text-nowrap"><a href="#">{{$comment->post->title}}</a></td>
                                <td>{{$comment->content}}</td>
                                <td>{{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</td>
                                <td>
                                    <form id="deleteComment-{{$comment->id}}" action="{{route('deleteComment',$comment->id)}}" method="post">
                                        @csrf
                                    </form>
                                    <a href="#" onclick="document.getElementById('deleteComment-{{$comment->id}}').submit();" class="btn btn-sm btn-danger">
                                       <i class="icon icon-trash"></i> Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
