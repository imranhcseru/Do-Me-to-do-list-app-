<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Do Me - Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
    </head>

    <body>
        <div class="container" align = "center">
            <div class = "col">
                <div class = "jumbotron" >
                  <form action = "{{url('/checkuser')}}" method = "post">
                      <div class="form-row">
                          <div class="col">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                              <input id="email" type="text" class="form-control" name="email" placeholder="Email">
                          </div>
                          <div class="col">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                              <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                          </div>
                          <div class="col">
                              <button type="button" class="btn btn-outline-secondary">Log In</button>
                          </div>
                      </div>
                    </form>
                <div> 
            </div>
        </div>
            <br><br>

          <div class = "container">
            <div class = "col">
                <div class = "jumbotron">
                <form action = "{{url('/storeuser')}}" method = "post" >
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-8">
                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                      <div class="col-sm-8">
                        <input type="password" class="form-control" id="inputPassword3" >
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-2 col-form-label">Confirm Password</label>
                      <div class="col-sm-8">
                        <input type="password" class="form-control" id="inputPassword3" >
                      </div>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-outline-secondary">Register</button>
                    </div>
                  </form>
              </div>
          </div>
    </body>
</html>
