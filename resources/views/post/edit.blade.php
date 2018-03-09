@extends('layouts.app')

@section('title', "Edit Post $post->name")

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Post {{ $post->name }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('post.index') }}">Back</a>
            </div>
        </div>
    </div>

    {!! Form::model($post, ['method' => 'PATCH', 'route' => ['post.update', $post], 'enctype' => 'multipart/form-data']) !!}

    @include('post.form', [$post])

    {!! Form::close() !!}

@endsection