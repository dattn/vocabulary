@extends('layouts.app')

@section('content')
    <div class="container">
        @include('common.errors')

        <div class="panel panel-default">
            <div class="panel-heading">
                Edit Translation In {{ $group->label }}
            </div>

            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{ route('levels.groups.translations.update', [ $level, $group, $translation ]) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label for="inputFrom" class="col-sm-2 control-label">
                            From
                        </label>
                        <div class="col-sm-10">
                            <input type="text" name="from" class="form-control" id="inputFrom" placeholder="From" value="{{ $translation->from }}" autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputTo" class="col-sm-2 control-label">
                            To
                        </label>
                        <div class="col-sm-10">
                            <input type="text" name="to" class="form-control" id="inputTo" placeholder="To" value="{{ $translation->to }}">
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
