@extends('dominion::templates.admin')

@section('page')
<div class="panel-heading">
    <strong>Select Groups</strong>
</div>
{{ Form::open()}}
<input type="hidden" name="select_group_id" value="{{ $selectGroup->id }}">
<div class="panel-body">
    <div class="page-header">
        <h5>Create New Select Option</h5>
    </div>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" value="{{ Input::old('name') }}">
    </div>
    <div class="form-group">
        <label for="value">Name</label>
        <input type="text" name="value" class="form-control"  value="{{ Input::old('value') }}">
    </div>
</div>
<div class="panel-footer">
    <button type="submit" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-ok"></span> Submit</button>
    <a href="{{ action('DavidWeber\Dominion\Controllers\SelectGroupController@getIndex')}}" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
</div>
{{ Form::close()}}
@stop