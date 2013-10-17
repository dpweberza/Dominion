@extends('dominion::templates.admin')

@section('page')
<div class="panel-heading">
    <strong>Modules</strong>
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
                <th>Controller</th>
                <th>Group</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($modules as $module)
                <tr>
                    <td>{{ $module->id }}</td>
                    <td>{{ $module->name }}</td>
                    <td>{{ $module->controller }}</td>
                    <td>{{ $module->group->name }}</td>
                    <td>{{ $module->getStatus() }}</td>
                    <td>
                        {{ Form::open(array('action' => array('DavidWeber\Dominion\Controllers\ModuleController@postDelete', $module->id))) }}
                            <a href="{{action('DavidWeber\Dominion\Controllers\ModuleController@getEdit', array('id' => $module->id))}}" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                            <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Please confirm deletion!')"><span class="glyphicon glyphicon-trash"></span> Delete</button>
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
            @if($modules->isEmpty())
                <tr>
                    <td colspan="6">No modules.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
<div class="panel-footer">
    <a href="{{action('DavidWeber\Dominion\Controllers\ModuleController@getCreate')}}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Create New Module</a>
</div>
@stop