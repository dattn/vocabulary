@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                Levels
                <a class="btn btn-success btn-xs pull-right" href="{{ URL::route('levels.create') }}">
                    Create
                </a>
            </div>

            <div class="panel-body">
                @if (count($levels) > 0)
                    <table class="table table-striped task-table">

                        <thead>
                            <th>Level</th>
                            <th>&nbsp;</th>
                        </thead>

                        <tbody>
                            @foreach ($levels as $level)
                                <tr>
                                    <!-- Level label -->
                                    <td class="table-text">
                                        <div>{{ $level->label }}</div>
                                    </td>

                                    <td>
                                        <!-- TODO: Delete Button -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
