@extends('dominion::templates.admin')

@section('page')
<div class="panel-heading">
    <strong>Roles</strong>
</div>
{{ Form::open()}}
<div class="panel-body">
    <div class="page-header">
        <h5>Create New Module</h5>
    </div>
    <div class="form-group">
        <label for="input-name">Name</label>
        <input type="text" name="name" class="form-control" id="input-name" value="{{ Input::old('name') }}">
    </div>
    <div class="form-group">
        <label for="input-name">Controller</label>
        <input type="text" name="controller" class="form-control" id="input-controller" value="{{ Input::old('controller') }}">
    </div>
    <div class="form-group">
        <label for="input-name">Group</label>
        {{ Form::select('module_group_id', array('0' => 'Please Select') + $moduleGroups , Input::old('module_group_id'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        <label>Status</label>
        {{ Form::select('status_id', array('0' => 'Please Select') + $statuses, Input::old('status_id', 1), array('class' => 'form-control')) }}
    </div>
</div>
<div class="panel-footer">
    <button type="submit" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-ok"></span> Submit</button>
    <a href="{{ action('DavidWeber\Dominion\Controllers\ModuleController@getIndex')}}" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
</div>
{{ Form::close()}}
@stop