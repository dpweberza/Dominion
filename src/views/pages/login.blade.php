@extends('dominion::templates.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Admin Login</strong></div>
                {{ Form::open()}}
                <div class="panel-body">
                    @foreach (Notification::getNotifications() as $notification)
                    <div class="alert alert-block alert-{{ $notification->type }}">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h3>{{ $notification->title}}</h3>
                        {{ $notification->text}}
                    </div>
                    @endforeach
                    <div class="form-group">
                        <label>Username</label>
                        <input type="username" name="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                </div>
                <div class="panel-footer">
                    <button type="submit" class="btn btn-block btn-primary"><i class="icon-check"></i> Login</button>
                </div>
                {{ Form::close()}}
            </div>
        </div>
    </div>
</div>
@stop