@extends('dominion::templates.admin')

@section('page')
<div class="panel-heading">
    <strong>Roles</strong>
</div>
<div class="panel-body">
    <div class="page-header">
        <h5>Listing</h5>
    </div>
    <table class="table table-condensed table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->status_id }}</td>
                    <td>
                        {{ Form::open(array('action' => array('DavidWeber\Dominion\Controllers\RoleController@postDelete', $role->id))) }}
                            <a href="{{action('DavidWeber\Dominion\Controllers\RoleController@getEdit', array('id' => $role->id))}}" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                            <button type="submit" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</button>
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
            @if($roles->isEmpty())
                <tr>
                    <td colspan="4">No roles.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
<div class="panel-footer">
    <a href="{{ action('DavidWeber\Dominion\Controllers\RoleController@getCreate') }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Create New Role</a>
</div>
@stop