@extends('layouts.app')

@section('title', "Edit Category $category->name")

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Category {{ $category->name }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('category.index') }}">Back</a>
            </div>
        </div>
    </div>

    {!! Form::model($category, ['method' => 'PATCH', 'route' => ['category.update', $category]]) !!}

    @include('category.form', [$category])

    {!! Form::close() !!}

@endsection