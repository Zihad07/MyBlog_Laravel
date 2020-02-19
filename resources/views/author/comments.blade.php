@extends('layouts.admin')
@section('title','Author Comments')

@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header bg-light">
                <strong>Author ({{auth()->user()->name}}'s)</strong> Comments
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
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $comment)
                            <tr>
                                <td>{{$comment->id}}</td>
                                <td class="text-nowrap"><a href="#">{{$comment->post->title}}</a></td>
                                <td>{{$comment->content}}</td>
                                <td>{{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
