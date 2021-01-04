@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1">
            <div class="panel-group">
                <div class="panel panel-info text-center">
                    <div class="panel-heading">Forgot Password ?</div>
                    <div class="panel-body">
                        <form action="/forgot" method="post">
                            <x-alert />
                            @csrf
                            <div class="form-group">
                                <label for="email">Registered Email address</label>
                                <input type="email" name="email" id="email" class="form-control">
                                @foreach ($errors->get('email') as $message)
                                    <p class="text-danger">{{$message}}</p>
                                @endforeach
                            </div>
                            
                            <div class="form-group">
                                <input type="submit" class="btn btn-info" value="Get Email">
                            </div>
                        </form>
                    </div>
                    <div class="panel-footer">
                        <a href="/register">Register if you are new</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection