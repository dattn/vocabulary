@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                Translations In {{ $group->label }}
                <a class="btn btn-xs btn-default pull-right" href="{{ route('levels.groups.index', [ $level ]) }}">
                    Back To Groups
                </a>
            </div>

            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <th>From</th>
                        <th>To</th>
                        <th colspan="3">
                            <a class="btn btn-success btn-xs" href="{{ route('levels.groups.translations.create', [ $level, $group ]) }}">
                                Create
                            </a>
                        </th>
                    </thead>

                    @if (count($translations) > 0)
                        <tbody>
                            @foreach ($translations as $translation)
                                <tr>
                                    <td class="table-text">
                                        <div>{{ $translation->from }}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{ $translation->to }}</div>
                                    </td>
                                    <td>
                                        <a class="btn btn-warning btn-xs" href="{{ route('levels.groups.translations.edit', [ $level, $group, $translation ]) }}">
                                            Edit
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('levels.groups.translations.destroy', [ $level, $group, $translation ]) }}" method="POST">
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
