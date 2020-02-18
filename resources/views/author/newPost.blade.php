@extends('layouts.admin')
@section('title','Author New Post')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            New Post
                        </div>
                        <form action="{{route('createPost')}}" method="post">
                            @csrf
                            <div class="card-body">
                                @include('includes.errors')
                                @include('includes.success')
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="normal-input" class="form-control-label">Title</label>
                                            <input name="title" id="normal-input" class="form-control" placeholder="Enter Post title name..." value="{{old('title')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="read-only" class="form-control-label">Content</label>
                                            <textarea name="content" id="content" cols="5" class="form-control" placeholder="Enter Content of post...">{{old('content')}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success btn-sm">Crate Post</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
