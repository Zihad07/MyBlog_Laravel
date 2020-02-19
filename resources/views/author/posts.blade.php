@extends('layouts.admin')
@section('title','Author Posts')

@section('content')
    <div class="content">
        <div class="card">
            <div class="card-header bg-light">
                <strong>{{auth()->user()->name}}'s</strong> Posts
            </div>

            <div class="card-body">

                @include('includes.success')
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Create at</th>
                            <th>Update at</th>
                            <th>Comments</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(auth()->user()->posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td class="text-nowrap"><a href="#">{{$post->title}}</a></td>
                                <td>{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</td>
                                <td>{{\Carbon\Carbon::parse($post->updated_at)->diffForHumans()}}</td>
                                <td>{{$post->comments->count()}}</td>
                                <td>
                                    <a href="{{route('postEdit',$post->id)}}" class="btn btn-primary btn-sm"><i class="icon icon-pencil"></i> Edit</a>

                                    <form class="d-inline" id="deletePost-{{$post->id}}" action="{{route('deletePost',$post->id)}}" method="post">@csrf</form>

                                    <a href="#" class="btn btn-danger btn-sm" onclick="document.getElementById('deletePost-{{$post->id}}').submit()">
                                        <i class="icon icon-trash"></i> Remove
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
