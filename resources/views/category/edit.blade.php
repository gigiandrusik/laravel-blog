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

    @if (count($errors) > 0)

        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with editing category<br><br>
            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>
        </div>

    @endif

    {!! Form::model($category, ['method' => 'PATCH', 'route' => ['category.update', $category->id]]) !!}

    @include('category.form')

    {!! Form::close() !!}

@endsection