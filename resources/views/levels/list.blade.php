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
                        <th width="100%">Label</th>
                        <th colspan="2">
                            <a class="btn btn-success btn-xs" href="{{ route('levels.create') }}">
                                Create
                            </a>
                        </th>
                    </thead>

                    @if (count($levels) > 0)
                        <tbody>
                            @foreach ($levels as $level)
                                <tr>
                                    <td class="table-text">
                                        <div>{{ $level->label }}</div>
                                    </td>
                                    <td>
                                        <a class="btn btn-warning btn-xs" href="{{ route('levels.edit', [ $level ]) }}">
                                            Edit
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('levels.destroy', [ $level ]) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" class="btn btn-danger btn-xs">
                                                Delete
                                            </button>
                                        </form>
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
