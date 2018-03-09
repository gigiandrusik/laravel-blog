@extends('layouts.app')

@section('title', 'Create post')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create Post</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('post.index') }}">Back</a>
            </div>
        </div>
    </div>

    {!! Form::open(['route' => 'post.store', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}

        @include('post.form')

    {!! Form::close() !!}

@endsection