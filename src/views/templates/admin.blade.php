@extends('dominion::templates.base')

@section('navigation')
<ul class="nav navbar-nav">
    <li><a href="{{action('DavidWeber\Dominion\Controllers\AdminController@getIndex')}}"><span class="glyphicon glyphicon-home"></span> Dashboard</a></li>
    @foreach($userModuleGroups as $moduleGroup)
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="{{$moduleGroup->icon_class}}"></span> {{$moduleGroup->name}} <b class="caret"></b></a>
        <ul class="dropdown-menu">
            @foreach($userModules as $module)
                @if($module->module_group_id == $moduleGroup->id)
                <li class="{{starts_with(Route::getCurrentRoute()->getAction(), $module->controller) ? 'active' : ''}}"><a href="{{action($module->controller . '@getIndex')}}">{{ $module->name}}</a></li>
                @endif
            @endforeach
        </ul>
    </li>
    @endforeach
</ul>
<ul class="nav navbar-nav pull-right">
    <li><a href="{{action('DavidWeber\Dominion\Controllers\AdminController@getLogout')}}"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
</ul>
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        @foreach (Notification::getNotifications() as $notification)
        <div class="alert alert-dismissable alert-{{ $notification->type }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p><strong>{{ $notification->title}}</strong></p>
            {{ $notification->text}}
        </div>
        @endforeach
        <div class="panel panel-default">
            @yield('page')
        </div>
    </div>
</div>
@stop