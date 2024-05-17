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
      <div class="infors">
    <h1 class="mt-4">Seja bem vindo {{ Auth::user()->NomeProvedor }}</h1>
    @if ($errors->any())
                      <div class="erro">
       
                              @foreach ($errors->all() as $erro)
                                  <p>{{ $erro }}</p>
                              @endforeach
                      </div>
                  @endif
    {{-- <p> infomações:</p>
    <li>Nome: {{ Auth::user()->NomeProvedor }}</li>
    <li>Tipo: {{ Auth::user()->Classe }}</li>
    <li>CNPJ: {{ Auth::user()->CnpjProvedor }}</li>
    <li>Email: {{ Auth::user()->EmailProvedor }}</li>
    <li>Senha: ********</li> --}}


    <h3>Seus Planos</h3>
    <div class="container" style="margin: 0">
        <table>
            <thead>
                <tr>
                    <th>Plano</th>
                    <th>Criador</th>
                    <th>Preço</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
                @foreach($planos as $planos)
                    <tr>
                        <td>{{ $planos->NomePlano}}</td>
                        <td>{{ $planos->DonoPlano}} </td>
                        <td>{{ $planos->PrecoPlano}}R$ </td>
                        <td>{{ $planos->DescPlano }} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
<br>

    <a class="btn btn-success" href="{{Route('dashboard.create')}}">Criar novo Plano</a>




    @if(Auth::user()->Classe == 'Admin')

<h3>Provedores Cadastrados</h3>
        <div class="container" style="margin: 0">
            <table>
                <thead>
                    <tr>
                        <th>Nomes</th>
                        <th>Tipo</th>
                        <th>Email</th>
                        <th>CNPJ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($provedors as $usuario)
                        <tr>
                            <td>{{ $usuario->NomeProvedor }}</td>
                            <td>{{ $usuario->Classe }} </td>
                            <td>{{ $usuario->EmailProvedor }} </td>
                            <td>{{ $usuario->CnpjProvedor }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>




@else
<br>
<h4>Esse usuario não é um administrador</h4>
<p>Para testar, aperte esse botão para ganhar a classe administrador</p>
<a class="btn btn-success" href="{{Route('dashboard.getadmin')}}">admin</a>

@endif

</div>
</body>
<script src="{{asset('js/scripts.js')}}"></script>
</html>
