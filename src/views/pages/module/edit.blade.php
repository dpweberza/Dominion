@extends('dominion::templates.admin')

@section('page')
<div class="panel-heading">
    <strong>Modules</strong>
</div>
{{ Form::open()}}
<div class="panel-body">
    <div class="page-header">
        <h5>Editing Module: {{ $module->name }}</h5>
    </div>
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ Input::old('name', $module->name) }}">
    </div>
    <div class="form-group">
        <label>Controller</label>
        <input type="text" name="controller" class="form-control" value="{{ Input::old('controller', $module->controller) }}">
    </div>
    <div class="form-group">
        <label>Group</label>
        {{ Form::select('module_group_id', array('0' => 'Please Select') + $moduleGroups , Input::old('module_group_id', $module->module_group_id), array('class' => 'form-control')) }}
    </div>
</div>
<div class="panel-footer">
    <button type="submit" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-ok"></span> Submit</button>
    <a href="{{ action('DavidWeber\Dominion\Controllers\ModuleController@getIndex')}}" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
</div>
{{ Form::close()}}
@stop