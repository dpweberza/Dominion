@extends('dominion::templates.admin')

@section('page')
<div class="panel-heading">
    <strong>Roles</strong>
</div>
{{ Form::open()}}
<div class="panel-body">
    <div class="page-header">
        <h5>Create New Role</h5>
    </div>
    <div class="form-group">
        <label for="input-name">Name</label>
        <input type="text" name="name" class="form-control" id="input-name">
    </div>

    <h5>Role Modules</h5>
    <table class="table table-condensed table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Permission</th>
            </tr>
        </thead>
        <tbody>
            @foreach($modules as $module)
            <?php $checked = false; ?>
            <tr>
                <td>{{ $module->id }}</td>
                <td>{{ $module->name }}</td>
                <td>
                    <input type="checkbox" name="roleModules[]" value="{{ $module->id }}" @if($checked) {{'checked="checked"'}} @endif />
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="panel-footer">
    <button type="submit" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-ok"></span> Submit</button>
    <a href="{{ action('DavidWeber\Dominion\Controllers\RoleController@getIndex')}}" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
</div>
{{ Form::close()}}
@stop