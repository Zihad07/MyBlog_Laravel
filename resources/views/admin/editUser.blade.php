@extends('layouts.admin')

@section('title')
    Editing | {{$user->name}}
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            Editing User
                        </div>
                        <form action="{{route('adminEditUserPost',$user->id)}}" method="post">
                            @csrf
                            <div class="card-body">
                                @include('includes.errors')
                                @include('includes.success')
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="normal-input" class="form-control-label">Name</label>
                                            <input name="name" id="normal-input" class="form-control"  value="{{$user->name}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="normal-input" class="form-control-label">Email</label>
                                            <input name="email" id="email" class="form-control"  value="{{$user->email}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">

                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="author_id"   name="author" {{$user->author==true ? 'checked':''}} value="1">
                                            <label class="form-check-label" for="author_id">Author</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="admin_id"   name="admin" {{$user->admin==true ? 'checked':''}} value="1">
                                            <label class="form-check-label" for="admin_id">Admin</label>
                                        </div>
                                    </div>
                                </div>



                                <button type="submit" class="btn btn-success btn-sm">Update User</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
