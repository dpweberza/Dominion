@extends('dominion::templates.admin')

@section('page')
<div class="panel-heading">
    <strong>Module Groups</strong>
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
                <th>Icon</th>
                <th>Modules</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($moduleGroups as $moduleGroup)
                <tr>
                    <td>{{ $moduleGroup->id }}</td>
                    <td>{{ $moduleGroup->name }}</td>
                    <td><span class="{{ $moduleGroup->icon_class }}"></span></td>
                    <td>{{ count($moduleGroup->modules) }}</td>
                    <td>
                        {{ Form::open(array('action' => array('DavidWeber\Dominion\Controllers\ModuleGroupController@postDelete', $moduleGroup->id))) }}
                            <a href="{{action('DavidWeber\Dominion\Controllers\ModuleGroupController@getView', array('id' => $moduleGroup->id))}}" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-eye-open"></span> View</a>
                            <button type="submit" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</button>
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
            @if($moduleGroups->isEmpty())
                <tr>
                    <td colspan="5">No module groups.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
<div class="panel-footer">
    <a href="{{action('DavidWeber\Dominion\Controllers\ModuleGroupController@getCreate')}}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Create New Module Group</a>
</div>
@stop