@extends('dominion::templates.admin')

@section('page')
<div class="panel-heading">
    <strong>Module Groups</strong>
</div>
<div class="panel-body">
    <div class="page-header">
        <h5>Viewing Module Group: {{ $moduleGroup->name }}</h5>
    </div>
    
    <div class="well well-sm">
        <dl class="dl-horizontal">
            <dt>ID</dt>
            <dd>{{ $moduleGroup->id }}</dd>
            <dt>Name</dt>
            <dd>{{ $moduleGroup->name }}</dd>
            <dt>Icon</dt>
            <dd><span class="{{ $moduleGroup->icon_class }}"></span></dd>
        </dl>
    </div>
    
    <h5>Modules</h5>
    <table class="table table-condensed table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Controller</th>
            </tr>
        </thead>
        <tbody>
            @foreach($moduleGroup->modules as $module)
                <tr>
                    <td>{{ $module->id }}</td>
                    <td>{{ $module->name }}</td>
                    <td>{{ $module->controller }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="panel-footer">
    <a href="{{action('DavidWeber\Dominion\Controllers\ModuleGroupController@getIndex')}}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
</div>
@stop