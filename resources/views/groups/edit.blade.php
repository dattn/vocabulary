@extends('layouts.app')

@section('content')
    <div class="container">
        @include('common.errors')

        <div class="panel panel-default">
            <div class="panel-heading">
                Edit Group In {{ $level->label }}
            </div>

            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{ route('levels.groups.update', [ $level, $group ]) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label for="inputLabel" class="col-sm-2 control-label">
                            Label
                        </label>
                        <div class="col-sm-10">
                            <input type="text" name="label" class="form-control" id="inputLabel" placeholder="Label" value="{{ $group->label }}" autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-warning">
                                Edit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
