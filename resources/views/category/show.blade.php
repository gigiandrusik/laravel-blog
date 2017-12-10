@extends('layouts.app')

@section('title', "Show Category $category->name")

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('category.index') }}">Back</a>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $category->name}}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
               <p style="word-wrap: break-word">
                   {{ $category->description}}
               </p>
            </div>
        </div>

    </div>

    @if (count($posts = $category->posts))

        <h3>Posts</h3>

        <table class="table table-bordered">
            <tr>
                <th>Name</th>

                <th>Content</th>

                <th>File</th>
            </tr>

            @foreach ($posts as $post)

                <tr>
                    <td>
                        {{ $post->name}}
                    </td>

                    <td>
                        {{ \Illuminate\Support\Str::limit($post->content) }}
                    </td>

                    <td>
                        <image src="{{ asset('uploads/images') . '/' . $post->file  }}" class="img-thumbnail" width="200px" height="200px" />
                    </td>
                </tr>

            @endforeach

        </table>


    @endif

@endsection