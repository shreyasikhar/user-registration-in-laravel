@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1">
            <div class="panel-group">
                <div class="panel panel-info text-center">
                    <div class="panel-heading">Reset Your Password</div>
                    <div class="panel-body">
                        <form action="/reset/{{$token}}" method="post">
                            <x-alert />
                            @csrf
                            <div class="form-group">
                                <label for="password">Enter your new Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                                @foreach ($errors->get('password') as $message)
                                    <p class="text-danger">{{$message}}</p>
                                @endforeach
                            </div>

                            <input type="hidden" name="reset_token" id="token" value={{$token}}>
                            
                            <div class="form-group">
                                <input type="submit" class="btn btn-info" value="Reset">
                            </div>
                        </form>
                    </div>
                    <div class="panel-footer">
                        <a href="/login">Login if you remember password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection