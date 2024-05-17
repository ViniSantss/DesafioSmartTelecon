<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    
    <div class="sidenav" style=" background-repeat: no-repeat; background-size: cover;background-image: url('{{asset('assets/engenheiro.png')}}')">
             <div class="login-main-text">
                <h2>Smart Telecon<br> Cadrasto</h2>
                <p>Insira seus dados para continuar.</p>
             </div>
          </div>
          <div class="main">
             <div class="col-md-6 col-sm-12">
                <div class="login-form">
                   <form method="POST" action="{{route('cadastro')}}">
                     @csrf
                      <div class="form-group">
                         <label>User Name</label>
                         <input type="text" class="form-control" placeholder="User Name" name="name">
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="Email" name="email">
                     </div>
                     <div class="form-group">
                        <label>Cnpj</label>
                        <input type="text" class="form-control" placeholder="000.000.000-00" name="cnpj">
                     </div>
                     <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password">
                     </div>
                      <button type="submit" class="btn btn-black">Registro</button>
                      <a href="{{ Route('login')}}" class="btn btn-secondary">Login</a>
                      @if ($errors->any())
                      <div class="erro">
       
                              @foreach ($errors->all() as $erro)
                                  <p>{{ $erro }}</p>
                              @endforeach
                      </div>
                  @endif
                   </form>
                </div>
             </div>
          </div>


</body>
</html>