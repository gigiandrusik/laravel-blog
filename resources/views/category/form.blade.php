<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">

            <strong>Name:</strong>

            {!! Form::text('name', null, array('placeholder' => 'Name', 'class' => 'form-control')) !!}

        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">

            <strong>Description:</strong>

            {!! Form::textarea('description', null, array('placeholder' => 'Description', 'class' => 'form-control')) !!}

        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>

</div>