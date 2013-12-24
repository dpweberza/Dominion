@extends('dominion::templates.admin')

@section('page')
<div class="panel-heading">
    <strong>Select Groups</strong>
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
                <th>Options</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($selectGroups as $selectGroup)
            <tr>
                <td>{{ $selectGroup->id }}</td>
                <td>{{ $selectGroup->name }}</td>
                <td>{{ count($selectGroup->options) }}</td>
                <td>
                    {{ Form::open(array('action' => array('DavidWeber\Dominion\Controllers\SelectGroupController@postDelete', $selectGroup->id))) }}
                    <a href="{{action('DavidWeber\Dominion\Controllers\SelectGroupController@getView', array('id' => $selectGroup->id))}}" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-eye-open"></span> View</a>
                    <button type="submit" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash" onclick="return confirm('Please confirm deletion!')"></span> Delete</button>
                    {{ Form::close() }}
                </td>
            </tr>
            @endforeach
            @if($selectGroups->isEmpty())
            <tr>
                <td colspan="5">No select groups.</td>
            </tr>
            @endif
        </tbody>
    </table>
    {{ $selectGroups->links() }}
</div>
<div class="panel-footer">
    <a href="{{action('DavidWeber\Dominion\Controllers\SelectGroupController@getCreate')}}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Create New Select Group</a>
</div>
@stop