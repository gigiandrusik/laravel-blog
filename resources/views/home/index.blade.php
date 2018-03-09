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

                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ $category->name }} comments</h3>
                    </div>
                    <div class="panel-body">

                        <ul class="list-group">

                            @foreach($category->comments as $comment)
                                <li class="list-group-item">{{ $comment->author }} at {{ $comment->created_at }}: {{ $comment->content }} </li>
                            @endforeach

                        </ul>

                        {!! Form::open(['route' => ['add.category.comment', $category], 'method' => 'post', 'class' => 'ajax-form']) !!}

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">

                                <strong>Author:</strong>

                                {!! Form::text('author', null, ['placeholder' => 'Name Surname', 'class' => 'form-control', 'required' => 'required', 'pattern' => '^[A-ZА-ЯЁ][a-zа-яё]+\s[A-ZА-ЯЁ][a-zа-яё]+$']) !!}

                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">

                                <strong>Content:</strong>

                                {!! Form::textarea('content', null, ['placeholder' => 'Content', 'class' => 'form-control', 'required' => 'required']) !!}

                            </div>
                        </div>

                        {!! Form::hidden('category_id', $category->id) !!}

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <button type="submit" class="btn btn-primary">Add Comment</button>
                        </div>
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

                                <image src="{{ asset('storage/images/' . $post->file)  }}" class="img-thumbnail" width="200px" height="200px" />

                                {{ $post->content }}

                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">{{ $post->name }} comments</h3>
                                    </div>
                                    <div class="panel-body">

                                        <ul class="list-group">

                                            @foreach($post->comments as $comment)
                                                <li class="list-group-item">{{ $comment->author }} at {{ $comment->created_at }}: {{ $comment->content }} </li>
                                            @endforeach

                                        </ul>

                                        {!! Form::open(['route' => ['add.post.comment', $post], 'method' => 'post', 'class' => 'ajax-form']) !!}

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">

                                                <strong>Author:</strong>

                                                {!! Form::text('author', null, ['placeholder' => 'Name Surname', 'class' => 'form-control', 'required' => 'required', 'pattern' => '^[A-ZА-ЯЁ][a-zа-яё]+\s[A-ZА-ЯЁ][a-zа-яё]+$']) !!}

                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">

                                                <strong>Content:</strong>

                                                {!! Form::textarea('content', null, ['placeholder' => 'Content', 'class' => 'form-control', 'required' => 'required']) !!}

                                            </div>
                                        </div>

                                        {!! Form::hidden('post_id', $post->id) !!}

                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <button type="submit" class="btn btn-primary">Add Comment</button>
                                        </div>
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

