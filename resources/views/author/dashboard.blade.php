@extends('layouts.admin')
@section('title','Author Dashboard')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card p-4">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <span class="h4 d-block font-weight-normal mb-2">{{auth()->user()->postsToday->count()}}</span>
                                <span class="font-weight-light">Posts Today</span>
                            </div>

                            <div class="h2 text-muted">
                                <i class="icon icon-paper-clip"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card p-4">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <span class="h4 d-block font-weight-normal mb-2">{{auth()->user()->posts->count()}}</span>
                                <span class="font-weight-light">Post all time</span>
                            </div>

                            <div class="h2 text-muted">
                                <i class="icon icon-paper-plane"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card p-4">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <span class="h4 d-block font-weight-normal mb-2">{{$commentsToday}}</span>
                                <span class="font-weight-light">Comments Today</span>
                            </div>

                            <div class="h2 text-muted">
                                <i class="icon icon-book-open"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card p-4">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <span class="h4 d-block font-weight-normal mb-2">{{$comments->count()}}</span>
                                <span class="font-weight-light">Comments All Time</span>
                            </div>

                            <div class="h2 text-muted">
                                <i class="icon icon-book-open"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row ">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Posts by day
                        </div>

                        <div class="card-body p-0">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
