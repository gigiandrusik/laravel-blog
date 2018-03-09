<div class="row">

    <input type="hidden" name="id" value="{{ old('id', $category->id ?? null ) }}">

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">

            <label for="name">Name:</label>

            {!! Form::text('name', null, array('placeholder' => 'Name', 'class' => 'form-control')) !!}

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif

        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">

            <label for="name">Description:</label>

            {!! Form::textarea('description', null, array('placeholder' => 'Description', 'class' => 'form-control')) !!}

            @if ($errors->has('description'))
                <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>

</div>