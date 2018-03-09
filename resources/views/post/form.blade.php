<div class="row">

    <input type="hidden" name="id" value="{{ old('id', $post->id ?? null ) }}">

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">

            <label for="category_id">Category:</label>

            {!! Form::select('category_id', ['' => 'Choose category'] + $categories, null, ['class' => 'form-control']) !!}

            @if ($errors->has('category_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('category_id') }}</strong>
                </span>
            @endif

        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">

            <label for="name">Name:</label>

            {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif

        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">

            <label for="content">Content:</label>

            {!! Form::textarea('content', null, ['placeholder' => 'Content', 'class' => 'form-control']) !!}

            @if ($errors->has('content'))
                <span class="help-block">
                    <strong>{{ $errors->first('content') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group {{ $errors->has('file') ? 'has-error' : '' }}">

            <label for="content">File:</label>

            {!! Form::file('file') !!}

            @if ($errors->has('file'))
                <span class="help-block">
                    <strong>{{ $errors->first('file') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>

</div>