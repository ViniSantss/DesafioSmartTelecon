<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet" />

</head>
<body>

    <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Smart Telecon</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{Route('inicio')}}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{Route('dashboard.home')}}">Dashboard</a>
              </li>
            </ul>
              <ul class="nav justify-content-end">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="{{route('logout.destroy')}}">Loggout</a><p>{{ Auth::user()->NomeProvedor }}</p>
                </li>
                      <a class="navbar-brand" href="#">
                        <img src="{{ asset('profile.png')}}" alt="Bootstrap" width="30" height="30">
                      </a>
              </ul>
          </div>
        </div>
      </nav>
      <div class="infors col-4">
        <form method="POST" action="{{route('dashboard.createDone')}}">
            @csrf
             <div class="form-group">
                <label>Nome do plano:</label>
                <input type="text" class="form-control" placeholder="Nome" name="name">
             </div>
             <div class="form-group">
               <label>Preço:</label>
               <input type="number" class="form-control" placeholder="Preço" name="price">
            </div>
            <div class="form-group">
               <label>Breve resumo:</label>
               <input type="text" class="form-control" placeholder="Descrição" name="desc">
            </div>
             <button type="submit" class="btn btn-success">Registro</button>
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

</div>
</body>
<script src="{{asset('js/scripts.js')}}"></script>
</html>
