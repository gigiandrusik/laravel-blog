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

    @if (count($errors) > 0)

        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with editing post<br><br>
            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>
        </div>

    @endif

    {!! Form::model($post, ['method' => 'PATCH', 'route' => ['post.update', $post->id], 'enctype' => 'multipart/form-data']) !!}

    @include('post.form')

    {!! Form::close() !!}

@endsection