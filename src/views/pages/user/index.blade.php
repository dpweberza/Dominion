@extends('dominion::templates.admin')

@section('page')
<div class="panel-heading">
    <strong>Users</strong>
</div>
<div class="panel-body">
    <div class="page-header">
        <h5>Listing</h5>
    </div>
    <table class="table table-condensed table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Email Address</th>
                <th>Status</th>
                <th>Create Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->getStatus() }}</td>
                    <td>{{ $user->getCreateDate() }}</td>
                    <td>
                        {{ Form::open(array('action' => array('DavidWeber\Dominion\Controllers\UserController@postDelete', $user->id))) }}
                            <a href="{{action('DavidWeber\Dominion\Controllers\UserController@getEdit', array('id' => $user->id))}}" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                            <button type="submit" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</button>
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
            @if($users->isEmpty())
                <tr>
                    <td colspan="5">No users.</td>
                </tr>
            @endif
        </tbody>
    </table>
    {{ $users->links() }}
</div>
<div class="panel-footer">
    <a href="{{ action('DavidWeber\Dominion\Controllers\UserController@getCreate') }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Create New User</a>
</div>
@stop