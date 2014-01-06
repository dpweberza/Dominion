@extends('dominion::templates.admin')

@section('page')
<div class="panel-heading">
    <strong>Users</strong>
</div>
{{ Form::open()}}
<div class="panel-body">
    <div class="page-header">
        <h5>Editing User: {{ $user->email }}</h5>
    </div>
    <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" class="form-control" value="{{ Input::old('username', $user->username) }}">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="text" name="password" class="form-control" value="{{ Input::old('password') }}">
    </div>
    <div class="form-group">
        <label>First Name</label>
        <input type="text" name="first_name" class="form-control" value="{{ Input::old('first_name', $user->first_name) }}">
    </div>
    <div class="form-group">
        <label>Last Name</label>
        <input type="text" name="last_name" class="form-control" value="{{ Input::old('last_name', $user->last_name) }}">
    </div>
    <div class="form-group">
        <label>Email Address</label>
        <input type="text" name="email_address" class="form-control" value="{{ Input::old('email_address', $user->email_address) }}">
    </div>
    <div class="form-group">
        <label>Role</label>
        {{ Form::select('role_id', array('0' => 'Please Select') + $roles , Input::old('role_id', $user->role_id), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        <label>Status</label>
        {{ Form::select('status_id', array('0' => 'Please Select') + $statuses, Input::old('status_id', $user->status_id), array('class' => 'form-control')) }}
    </div>
</div>
<div class="panel-footer">
    <button type="submit" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-ok"></span> Submit</button>
    <a href="{{ action('DavidWeber\Dominion\Controllers\UserController@getIndex')}}" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
</div>
{{ Form::close()}}
@stop