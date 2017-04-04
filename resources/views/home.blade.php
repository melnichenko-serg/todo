@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <form action="task" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <textarea name="text" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Add">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
