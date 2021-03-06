@extends('layouts.app')

@section('title', 'Create category')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create Category</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('category.index') }}">Back</a>
            </div>
        </div>
    </div>

    {!! Form::open(['route' => 'category.store', 'method' => 'post']) !!}

        @include('category.form')

    {!! Form::close() !!}

@endsection