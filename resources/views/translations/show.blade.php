@extends('layouts.app')

@section('content')
    <div class="container">
        @include('common.errors')

        <div class="panel panel-default">
            <div class="panel-heading">
                Translations In {{ $group->label }}
            </div>

            <div class="panel-body">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th>ID</th>
                        <td>{{ $translation->id }}</td>
                    </tr>
                    <tr>
                        <th>From</th>
                        <td>{{ $translation->from }}</td>
                    </tr>
                    <tr>
                        <th>To</th>
                        <td>{{ $translation->to }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
