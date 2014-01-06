@extends('dominion::templates.admin')

@section('page')
<div class="panel-heading">
    <strong>Log Viewer</strong>
</div>
<div class="panel-body">
    <div class="page-header">
        <h5>Viewing Log: {{ $date }} - {{ $sapi }}</h5>
    </div>
    <table class="table table-condensed table-striped table-bordered">
        <thead>
            <tr>
                <th>Level</th>
                <th>Message</th>
            </tr>
        </thead>
        <tbody>
            @foreach($entries as $entry)
            <tr>
                <td><span class="label {{ $entry['class'] }}">{{ $entry['level'] }}</span></td>
                <td><span class="log-message">{{ $entry['header'] }}</span></td>
            </tr>
            @endforeach
            @if(empty($entries))
            <tr>
                <td colspan="2">No log entries.</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
<div class="panel-footer">
    <a href="{{ action('DavidWeber\Dominion\Controllers\LogController@getIndex') }}" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
</div>
@stop