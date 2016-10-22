@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                Levels
            </div>

            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <th>Label</th>
                        <th>
                            <a class="btn btn-success btn-xs" href="{{ URL::route('levels.create') }}">
                                Create
                            </a>
                        </th>
                    </thead>

                    @if (count($levels) > 0)
                        <tbody>
                            @foreach ($levels as $level)
                                <tr>
                                    <!-- Level label -->
                                    <td class="table-text">
                                        <div>{{ $level->label }}</div>
                                    </td>

                                    <td>
                                        <a class="btn btn-warning btn-xs" href="{{ URL::route('levels.edit', [ $level->id ]) }}">
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-xs" href="{{ URL::route('levels.destroy', [ $level->id ]) }}">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection
