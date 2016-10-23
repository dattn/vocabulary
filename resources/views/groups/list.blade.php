@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                Groups In {{ $level->label }} 
            </div>

            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <th width="100%">Label</th>
                        <th colspan="2">
                            <a class="btn btn-success btn-xs" href="{{ route('levels.groups.create', [ $level ]) }}">
                                Create
                            </a>
                        </th>
                    </thead>

                    @if (count($groups) > 0)
                        <tbody>
                            @foreach ($groups as $group)
                                <tr>
                                    <td class="table-text">
                                        <div>{{ $group->label }}</div>
                                    </td>
                                    <td>
                                        <a class="btn btn-warning btn-xs" href="{{ route('levels.groups.edit', [ $level, $group ]) }}">
                                            Edit
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('levels.groups.destroy', [ $level, $group ]) }}" method="POST">
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
