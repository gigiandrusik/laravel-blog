@extends('layouts.app')

@section('title', 'Categories')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Categories</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('category.create') }}">Create</a>
            </div>

        </div>
    </div>

    @if ($message = Session::get('success'))

        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>

    @endif

    @if ($message = Session::get('error'))

        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>

    @endif

    <table class="table table-bordered">
        <tr>
            <th>Name</th>

            <th>Description</th>

            <th width="280px">Action</th>
        </tr>

        @foreach ($categories as $category)

            <tr>
                <td>{{ $category->name}}</td>

                <td>{{ \Illuminate\Support\Str::limit($category->description) }}</td>

                <td>

                    <a class="btn btn-info" href="{{ route('category.show', $category->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('category.edit', $category->id) }}">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['category.destroy', $category->id], 'style'=>'display:inline', 'class' => 'delete']) !!}

                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                    {!! Form::close() !!}

                </td>

            </tr>

        @endforeach

    </table>

    {!! $categories->links() !!}

@endsection