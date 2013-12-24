@extends('dominion::templates.admin')

@section('page')
<div class="panel-heading">
    <strong>Select Groups</strong>
</div>
<div class="panel-body">
    <div class="page-header">
        <h5>Viewing Select Group: {{ $selectGroup->name }}</h5>
    </div>

    <div class="well well-sm">
        <dl class="dl-horizontal">
            <dt>ID</dt>
            <dd>{{ $selectGroup->id }}</dd>
            <dt>Name</dt>
            <dd>{{ $selectGroup->name }}</dd>
        </dl>
    </div>

    <h5>Modules</h5>
    <table class="table table-condensed table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Value</th>
            </tr>
        </thead>
        <tbody>
            @foreach($selectGroup->options as $option)
            <tr>
                <td>{{ $option->id }}</td>
                <td>{{ $option->name }}</td>
                <td>{{ $option->value }}</td>
            </tr>
            @endforeach
            @if($selectGroup->options->isEmpty())
            <tr>
                <td colspan="3">No select options.</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
<div class="panel-footer">
    <a href="{{action('DavidWeber\Dominion\Controllers\SelectGroupController@getIndex')}}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
</div>
@stop