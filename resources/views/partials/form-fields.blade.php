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