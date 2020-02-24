<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Stark industries</title>

    <!-- Css Style -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
  </head>
  <body class="background">
    <!-- Menu-->
    <section>
          <nav class="navbar navbar-expand-lg navbar-light navColor">
              <div class="container">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse  justify-content-end" id="navbarNavAltMarkup">

                  <ul class="navbar-nav">

                      <!-- Authentication Links -->
                      @guest
                          <li class="nav-item">
                              <a class="nav-link navItemColor" href="{{ route('login') }}">{{ __('Login') }}</a>
                          </li>
                          <li class="nav-item">
                              @if (Route::has('register'))
                                  <a class="nav-link navItemColor" href="{{ route('register') }}">{{ __('Cadastro') }}</a>
                              @endif
                          </li>
                      @else
                          <li class="nav-item dropdown">
                              <a id="navbarDropdown" class="nav-link dropdown-toggle navItemColor" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  {{ Auth::user()->name }} <span class="caret"></span>
                              </a>

                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                      {{ __('Sair') }}
                                  </a> 

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
                              </div>
                          </li>
                      @endguest
                    </ul>
                  </div> 
                </div>
            </div>
          </nav>
        </section>
      <!-- End Menu-->
      <!--------- Cadastrar Visitantes --------->
      <section>
        <div class="container">
          <div class="createVisitors">
            <h3 class="marginHeaderCreateVisitors"> Cadastro dos Visitantes </h3>
            @if($errors->any())
              <div class="alert alert-danger" role="alert" style="margin-left: -25%;">
                {{$errors->first()}}
              </div>
            @endif
            <form action ="{{ url('/create_user' ) }}" method = "post" enctype="multipart/form-data">
                        
                {{csrf_field()}}
                    <div class="form-group row">
                        <label for="tema"  class="col-sm-2 col-form-label"> Nome </label>
                            <div class="col-sm-4">
                                <input type="text" name = "name_user" id = "name_user" class = "form-control formSize" required>
                            </div>
                    </div>

                    <div class="form-group row">
                        <label for="tema"  class="col-sm-2 col-form-label"> CPF </label>
                            <div class="col-sm-4">
                                <input type="text" name = "cpf" id = "cpf"  class = "form-control formSize" required>
                            </div>
                    </div>

                    <div class="form-group row">
                            <label for="Room"  class="col-sm-2 col-form-label letraForm"> Sala </label>
                            <div class="col-sm-4">
                              <select class="form-control formSize" name = "room">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                              </select>
                            </div>
                      </div>

                    <div class="form-group row">
                        <label for="tema"  class="col-sm-2 col-form-label"> E-mail </label>
                            <div class="col-sm-4">
                                <input type="text" name = "email"  class = "form-control formSize">
                            </div>
                    </div>

                    <div class = "form-group">
                          <div class = "row">  
                            <div class="col-sm-2 marginButtonEdit">
                              <button type="submit" id="proximo" name="proximo" class="btn btn-success btn-lg marginBottomCreateVisitors buttonColor">Enviar</button>
                            </div>
                          </div>
                    </div>
              </form>
            </div>  
          </div>
        </section>
        <!--------- Listas --------->
        <section>
          <div class="container">
            <div class="accordion" id="accordionExample" style="margin-bottom: 20%;  box-shadow: 4px 6px 19px -5px rgba(0,0,0,0.75);">
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h2 class="mb-0">
                    <button class="btn btn-link bottomAccordion" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Visitantes na torre
                    </button>
                  </h2>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                  <div class="card-body">
                  <div class="row">
                  
                  <div class="table-responsive tableScroll boddyTableManagement">
                    
                    <table class="table" style="background: #f3f3f3">
                        <thead>
                          <tr>
                            <th scope="col" class="text-center">Nome</th>
                            <th scope="col" >CPF</th>
                            <th scope="col">Email</th>
                            <th scope="col">Sala</th>
                          </tr>
                        </thead>
                        <tbody >
                          @foreach($user as $user)                   
                          <tr>
                            <td>{{ $user->name_user }}</a></td>
                            <td>{{ $user->cpf }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->room }}</td>
                            <td>  <a href="{{  url('/exit', $user->id ) }}" class="btn  btn-lg btn-success buttonColor">Sair</a> </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingTwo">
                  <h2 class="mb-0">
                    <button class="btn btn-link collapsed bottomAccordion2" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Historico
                    </button>
                  </h2>
                </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                    <div class="row">
                    
                    <div class="table-responsive tableScroll boddyTableManagement">
                      
                      <table class="table " style="background: #f3f3f3">
                          <thead>
                            <tr>
                              <th scope="col" class="text-center">Nome</th>
                              <th scope="col" >Fluxo</th>
                              <th scope="col" >Sala</th>
                              <th scope="col">Data / Hora</th>
                            </tr>
                          </thead>
                          <tbody >
                            @foreach($userFlux as $userFlux)                   
                            <tr>
                              <td>{{ $userFlux->name }}</a></td>
                              <td>{{ $userFlux->data_flux }}</td>
                              <td>{{ $userFlux->roomRecords }}</td>
                              <td>{{ $userFlux->data }}</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!--------- Listas  --------->

      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>