@extends('layouts.app')

@section('content')
    <div class="container">
        @include('common.errors')

        <div class="panel panel-default">
            <div class="panel-heading">
                Create New Translation In {{ $group->label }}
            </div>

            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{ route('levels.groups.translations.store', [ $level, $group ]) }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="inputFrom" class="col-sm-2 control-label">
                            From
                        </label>
                        <div class="col-sm-10">
                            <input type="text" name="from" class="form-control" id="inputFrom" placeholder="From" autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputTo" class="col-sm-2 control-label">
                            To
                        </label>
                        <div class="col-sm-10">
                            <input type="text" name="to" class="form-control" id="inputTo" placeholder="To">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success">
                                Create
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
