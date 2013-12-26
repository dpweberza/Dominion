@extends('dominion::templates.admin')

@section('page')
<div class="panel-heading">
    <strong>Module Groups</strong>
</div>
{{ Form::open()}}
<div class="panel-body">
    <div class="page-header">
        <h5>Editing Module Group: {{ $moduleGroup->name }}</h5>>
    </div>
    <div class="form-group">
        <label for="input-name">Name</label>
        <input type="text" name="name" value="{{ Input::old('name', $moduleGroup->name) }}" class="form-control">
    </div>
    <div class="form-group">
        <label for="input-name">Icon Class</label>
        <input type="text" name="icon_class" value="{{ Input::old('icon_class', $moduleGroup->icon_class) }}" class="form-control">
    </div>
</div>
<div class="panel-footer">
    <button type="submit" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-ok"></span> Submit</button>
    <a href="{{ action('DavidWeber\Dominion\Controllers\ModuleGroupController@getIndex')}}" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
</div>
{{ Form::close()}}
@stop