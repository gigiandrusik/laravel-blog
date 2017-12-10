@extends('layouts.app')

@section('title', 'Statistic')

@section('content')

    <ul class="list-group">

        @foreach($info as $user_agent => $count)
            <li class="list-group-item">{{ $user_agent }}: <b>{{ $count }}</b></li>
        @endforeach

    </ul>

    <table class="table table-bordered">
        <tr>
            <th>User Agent</th>

            <th>IP</th>
        </tr>

        @foreach ($statistics as $statistic)

            <tr>
                <td>
                    {{ $statistic->user_agent}}
                </td>
                <td>
                    {{ $statistic->ip}}
                </td>
            </tr>

        @endforeach

    </table>

    {!! $statistics->links() !!}

@endsection