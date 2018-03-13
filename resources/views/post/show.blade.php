@extends('layouts.app')

@section('title', "Show Post $post->name")

@php /**@var \App\Models\Db\Post $post*/ @endphp

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('post.index') }}">Back</a>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category:</strong>
                {{ $post->category->name }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $post->name }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Content:</strong>
                {{ $post->content }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>File:</strong>

                <image src="{{ asset('storage/images/' . $post->file) }}" class="img-thumbnail" width="200px" height="200px" />
            </div>
        </div>

    </div>

    @if (count($comments = $post->comments))

        <h3>Comments</h3>

        <table class="table table-bordered">
            <tr>
                <th>Author</th>

                <th>Content</th>

                <th>Created</th>
            </tr>

            @foreach ($comments as $comment)

                <tr>
                    <td>
                        {{ $comment->author }}
                    </td>

                    <td>
                        {{ $comment->content }}
                    </td>

                    <td>
                        {{ $comment->created_at }}
                    </td>
                </tr>

            @endforeach

        </table>

    @endif

@endsection