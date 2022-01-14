<!doctype html>
<html lang="en">
  <head>
    <title>- admin login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
       
    <div class="global-container">
        <div class="row">
            <div class="col-md-6 col-12">
                <img src="{{asset('images/team.svg')}}" height="500" width="500">
            </div>
            <div class="col-md-6 col-12">
                <div class="">
                    <div class="card login-form" style="width: 25rem;">
                    <div class="card-body">
                        <h3 class="card-title text-center"></h3>
                        <p class="card-title text-center lead text-success">Espace Administrateur</p>
                        <div class="card-text">
                            <!--
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">Incorrect username or password.</div> -->
                            <form method="POST" action="{{route('admin.login.submit')}}">
                                @csrf
                                <!-- to error: add class "has-danger" -->
                                <div class="form-group">
                                    
                                     <div class="form-group has-search">
                                        <span class="fa fa-user form-control-feedback"></span>
                                        <input type="email" class="form-control input @error('email') is-invalid @enderror" placeholder="Adresse e-mail" name="email" value="{{ old('email') }}" required>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    
                                      <div class="form-group has-search">
                                        <span class="fa fa-lock form-control-feedback"></span>
                                        <input type="password" class="form-control input @error('password') is-invalid @enderror" placeholder="mot de passe" name="password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-success btn-block">se connecter</button> 
                              
                                
                               
                            </form>
                            <hr>
                             <div class="container">
                                 <div class="row justify-content-center">
                                 <img src="{{asset('images/pami.jpg')}}" height="150" width="150">
                                 </div>
                             </div>
                        </div>
                    </div>
                </div>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>