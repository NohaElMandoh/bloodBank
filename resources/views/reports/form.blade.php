<div class="form-group">
    <label for="name">msg</label>
    {!! Form::text('msg',$model->name,[
        'class' => 'form-control'
    ]) !!}
    <label for="name">client_id</label>
    {!! Form::text('client_id',$model->name,[
        'class' => 'form-control'
    ]) !!}

</div>
<div class="form-group">
    <button class="btn btn-primary" type="submit">Submit</button>
</div>
