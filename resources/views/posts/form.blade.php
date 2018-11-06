<div class="form-group">
  <label for="name">Title</label>
  {!! Form::text('title',$model->name,[
      'class' => 'form-control'
  ]) !!}
    <label for="name">text</label>
    {!! Form::text('text',$model->name,[
        'class' => 'form-control'
    ]) !!}
    <label for="name">user ID</label>
    {!! Form::text('client_id',$model->name,[
        'class' => 'form-control'
    ]) !!}
    <label for="name">category ID</label>
    {!! Form::text('category_id',$model->name,[
        'class' => 'form-control'
    ]) !!}
    <label for="name">image</label>
    {!! Form::text('img',$model->name,[
        'class' => 'form-control'
    ]) !!}
    <label for="name">Publish Date</label>
    {!! Form::text('publish_date',$model->name,[
        'class' => 'form-control'
    ]) !!}


</div>
<div class="form-group">
    <button class="btn btn-primary" type="submit">Submit</button>
</div>
