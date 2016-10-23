@extends('layouts.app')

@section('content')
    <div class="container">
        @include('common.errors')

        <div class="panel panel-default">
            <div class="panel-heading">
                Group In {{ $level->label }}
            </div>

            <div class="panel-body">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>ID</th>
                        <td>{{ $group->id }}</td>
                    </tr>
                    <tr>
                        <th>Label</th>
                        <td>{{ $group->label }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
