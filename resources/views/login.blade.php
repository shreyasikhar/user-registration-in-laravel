@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1">
            <div class="panel-group">
                <div class="panel panel-info text-center">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
                        <form action="/login" method="post">
                            <x-alert />
                            @csrf
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" name="email" id="email" class="form-control">
                                @foreach ($errors->get('email') as $message)
                                    <p class="text-danger">{{$message}}</p>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                                @foreach ($errors->get('password') as $message)
                                    <p class="text-danger">{{$message}}</p>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="result">Are you human? If yes, do the addition</label><br/>
                                <input type="text" name="num1" id="num1" value="{{rand(11,100)}}" style="width: 30%; text-align:center; pointer-events: none;" tabindex="-1"> +
                                <input type="text" name="num2" id="num2" value="{{rand(11,100)}}" style="width: 30%; text-align:center; pointer-events: none;" tabindex="-1"> =
                                <input type="text" name="result" id="result" placeholder="Enter result" style="width: 30%; text-align:center;">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-info" value="Login">
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