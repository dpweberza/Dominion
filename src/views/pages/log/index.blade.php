@extends('dominion::templates.admin')

@section('page')
<div class="panel-heading">
    <strong>Log Viewer</strong> <span class="pull-right">{{ App::environment() }}</span>
</div>
<div class="panel-body">
    <div class="page-header">
        <h5>Listing</h5>
    </div>
    <table class="table table-condensed table-striped table-bordered">
        <thead>
            <tr>
                <th>Date</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach($logs as $sapi => $log)
                @foreach($log['logs'] as $date)
                <tr>
                    <td><a href="{{ action('DavidWeber\Dominion\Controllers\LogController@getView', array('sapi' => $sapi,'date' => $date)) }}">{{ $date }}</a></td>
                    <td>{{ $log['sapi'] }}</td>
                </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
<div class="panel-footer">
</div>
@stop