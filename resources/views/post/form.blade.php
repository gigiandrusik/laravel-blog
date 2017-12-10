<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">

            <strong>Category:</strong>

            {!! Form::select('category_id', ['' => 'Choose category'] + $categories, null, ['class' => 'form-control']) !!}

        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">

            <strong>Name:</strong>

            {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}

        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">

            <strong>Content:</strong>

            {!! Form::textarea('content', null, ['placeholder' => 'Content', 'class' => 'form-control']) !!}

        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">

            <strong>File:</strong>

            {!! Form::file('file') !!}

        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>

</div>