@extends('layouts.app')

@section('content')
    <div class="container">
        @include('common.errors')

        <div class="panel panel-default">
            <div class="panel-heading">
                Level
            </div>

            <div class="panel-body">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>ID</th>
                        <td>{{ $level->id }}</td>
                    </tr>
                    <tr>
                        <th>Label</th>
                        <td>{{ $level->label }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
