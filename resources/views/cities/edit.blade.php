@extends('layouts.app')
@inject('model','App\Citiy')
@section('page_title')
    Update Cities
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Cities</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                            title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                {!! Form::model($model,[
                  'action' => ['CitiesController@update',$model->id],
                'method' => 'put'
                ]) !!}
                @include('flash::message')
                @include('partials.validation_errors')
                @include('cities.form')
                <label for="name">Governorate ID</label>
                {!! Form::text('governorate_id',$model->governorate_id,[
                    'class' => 'form-control'
                ]) !!}
                {!! Form::close() !!}
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
