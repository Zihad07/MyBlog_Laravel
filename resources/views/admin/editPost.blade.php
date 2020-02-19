@extends('layouts.admin')

@section('title')
    Editing | {{$post->title}}
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-light">
                           Admin Editing Post
                        </div>
                        <form action="{{route('adminPostEdit',$post->id)}}" method="post">
                            @csrf
                            <div class="card-body">
                                @include('includes.errors')
                                @include('includes.success')
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="normal-input" class="form-control-label">Title</label>
                                            <input name="title" id="normal-input" class="form-control" placeholder="Enter Post title name..." value="{{$post->title}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="read-only" class="form-control-label">Content</label>
                                            <textarea name="content" id="content" rows="3" cols="5" class="form-control" placeholder="Enter Content of post...">{{$post->content}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success btn-sm">Update Post</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
