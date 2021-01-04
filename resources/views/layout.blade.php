<!DOCTYPE html>
<html lang="en">
<head>
  <title>User Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
 
<div class="container" style="margin-top: 5%">
  <div class="row">
    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1">
      @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
      @elseif (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
      @endif
    </div>
  </div>
  @yield('content')
</div>

</body>
</html>