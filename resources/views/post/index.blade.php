@extends('layouts.app')

@section('title', 'Posts')

@php /**@var \App\Models\Db\Post[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Pagination\Paginator $posts*/ @endphp

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Posts</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('post.create') }}">Create</a>
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
            <th>Category</th>

            <th>Name</th>

            <th>Content</th>

            <th>File</th>

            <th width="280px">Action</th>
        </tr>

        @foreach ($posts as $post)

            <tr>
                <td>
                    {{ $post->category->name }}
                </td>

                <td>
                    {{ $post->name}}
                </td>

                <td>
                    {{ \Illuminate\Support\Str::limit($post->content) }}
                </td>

                <td>
                    <image src="{{ asset('storage/images/' . $post->file)  }}" class="img-thumbnail" width="200px" height="200px" />
                </td>

                <td>

                    <a class="btn btn-info" href="{{ route('post.show', [$post]) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('post.edit', [$post]) }}">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['post.destroy', $post], 'style'=>'display:inline', 'class' => 'delete']) !!}

                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                    {!! Form::close() !!}

                </td>

            </tr>

        @endforeach

    </table>

    {!! $posts->links() !!}

@endsection