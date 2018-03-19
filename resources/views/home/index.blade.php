@extends('layouts.app')

@section('title', 'Blog')

@php /**@var \App\Models\Db\Category[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Pagination\Paginator $categories*/ @endphp

@section('content')

    @foreach($categories as $category)

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">{{ $category->name }}</h3>
            </div>
            <div class="panel-body">

                {{ $category->description }}

                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ $category->name }} comments</h3>
                    </div>
                    <div class="panel-body">

                        @include('partials.comments', ['comments' => $category->comments])

                        {!! Form::open(['route' => ['add.category.comment', $category], 'method' => 'post', 'class' => 'ajax-form']) !!}

                        @include('partials.form-fields')

                        {!! Form::hidden('category_id', $category->id) !!}

                        @include('partials.submit')

                        {!! Form::close() !!}

                    </div>
                </div>

                @if(count($posts = $category->posts))

                    @foreach($posts as $post)

                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title">{{ $post->name }}</h3>
                            </div>
                            <div class="panel-body">

                                <image src="{{ asset("storage/images/{$post->file}") }}" class="img-thumbnail" width="200px" height="200px" />

                                {{ $post->content }}

                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">{{ $post->name }} comments</h3>
                                    </div>
                                    <div class="panel-body">

                                        @include('partials.comments', ['comments' => $post->comments])

                                        {!! Form::open(['route' => ['add.post.comment', $post], 'method' => 'post', 'class' => 'ajax-form']) !!}

                                        @include('partials.form-fields')

                                        {!! Form::hidden('post_id', $post->id) !!}

                                        @include('partials.submit')

                                        {!! Form::close() !!}

                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach

                @endif

            </div>
        </div>

    @endforeach

    {!! $categories->links() !!}

@endsection

