@extends('dominion::templates.admin')

@section('page')
<div class="panel-heading">
    <strong>Dashboard</strong>
</div>
<div class="panel-body">
    <div class="row">
        <div class="col-md-6">
            <h5><strong>Latest Users</strong></h5>
            <table class="table table-condensed table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email Address</th>
                        <th>Status</th>
                        <th>Create Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email_address }}</td>
                        <td>{{ $user->getStatus() }}</td>
                        <td>{{ $user->getCreateDate() }}</td>
                    </tr>
                    @endforeach
                    @if($users->isEmpty())
                    <tr>
                        <td colspan="5">No users.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="panel-footer">

</div>
@stop