@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1">
            <div class="panel-group">
                <div class="panel panel-info text-center">
                    <div class="panel-heading">Registration</div>
                    <div class="panel-body">
                        <form action="/register" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control">
                                @foreach ($errors->get('name') as $message)
                                    <p class="text-danger">{{$message}}</p>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" name="email" id="email" class="form-control">
                                @foreach ($errors->get('email') as $message)
                                    <p class="text-danger">{{$message}}</p>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="email">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                                @foreach ($errors->get('email') as $message)
                                    <p class="text-danger">{{$message}}</p>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-info" value="Submit">
                            </div>
                        </form>
                    </div>
                    <div class="panel-footer">
                        <a href="/login">Login if you have account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection