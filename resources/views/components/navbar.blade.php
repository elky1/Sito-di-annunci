
            <nav class=" navbar navbar-expand-lg  navbarcustom text-white ">
                <div class="container-fluid ">
                    <a class="navbar-brand titnavbar" href="{{route('homepage')}}">
                    <img  class="prestologo"src="/media/logobianco6.png" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span><i class="far fa-angle-double-down fa-2x testonavbar"></i></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown ">
                                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{__('ui.navbar_allCategoriesDropdown')}}
                                </a>
                                <ul class="dropdown-menu mx-md-5 text-white" aria-labelledby="navbarDropdown">
                                    @foreach ($categories as $category)
                                    <li><a class="dropdown-item text-dark" href="{{route('public.advs.category', ['category'=>$category->id])}}">{{$category->category_name}}</a></li>

                                    @endforeach
                                </ul>
                              </li>

                              
                            <div class="flags">
                                
                                <li class="nav-item">
                                    @include('components.locale', ['lang'=>'it' , 'nation'=>'it'])
                                </li>
    
                                <li class="nav-item ">
                                    @include('components.locale', ['lang'=>'en' , 'nation'=>'gb'])

                                </li>
                                
                                <li class="nav-item">
                                    @include('components.locale', ['lang'=>'es' , 'nation'=>'es'])
                                    
                                </li>

                            </div>
                            
                            
                            
                        </ul>
                            <form class="d-flex position-end"  action={{route('search')}} method="GET">
                                <input class="form-control me-2 " name='q' type="search" placeholder="{{__('ui.navbar_searchPlaceHolder')}}" aria-label="Search">
                                <button class="btn btn-light " type="submit">{{__('ui.navbar_searchButton')}}</button>
                            </form>
                            


                        <ul class="navbar-nav mx-end mb-2 mb-lg-0">

                            @auth
                                <li class="nav-item mx-md-5">
                                    <a class="nav-link active text-white" href="{{route('adv.create')}}">{{__('ui.navbar_insertAdv')}}</a>
                                </li>
                                <div>
                                    <li class="nav-item dropdown me-5 ">
                                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{__('ui.navbar_welcomeUserAuth')}} {{Auth::user()->name}}</a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            

                                            @if(Auth::user() && Auth::user()->is_revisor)
                                            <li><a href="{{route('revisor.index')}}" class="dropdown-item">
                                                {{__('ui.navbar_revisorPanel')}}
                                                    <span class="badge rounded-pill bg-danger">
                                                        {{App\Models\Adv::ToBeRevisionedCount()}}
                                                    </span>
                                                </a>
                                            </li>
                                            @endif

                                            <li><a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('form-logout').submit();">{{__('ui.navbar_welcomeUserAuthLogout')}}</a></li>
                                            <form action="{{route('logout')}}" method="POST" style="display: none;" id="form-logout">@csrf</form>
                                        </ul>
                                    </li>
                                </div>


                                @else
                                    <div class="me-3  ">
                                        <li class="nav-item dropdown ">
                                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{__('ui.navbar_welcomeUser')}}</a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <li><a class="dropdown-item" href="{{route('login')}}">{{__('ui.navbar_welcomeUserAuthLogin')}}</a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item" href="{{route('register')}}">{{__('ui.navbar_welcomeUserAuthRegister')}}</a></li>
                                            </ul>
                                        </li>
                                    </div>

                            @endauth

                        </ul>


                      </div>
                  </div>

              </nav>

















{{--

<div class="container-fluid">
    <div class="row align-items-center justify-content-center">
        <div class="col-12 d-flex justify-content-center align-items-center text-center bg-danger nav-color">
            <h1>Presto.it</h1>


                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                 Tutte le categorie
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @foreach ($categories as $category)
                  <li><a class="dropdown-item" href="{{route('public.advs.category', ['category'=>$category->id])}}">{{$category->category_name}}</a></li>
                  @endforeach
                </ul>


            @auth

                    <a class="nav-link active" href="{{route('adv.create')}}">Inserisci un annuncio</a>

                <div class="me-3 position-absolute end-0">

                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Benvenuto {{Auth::user()->name}}</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <li><a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('form-logout').submit();">Logout</a></li>
                            <form action="{{route('logout')}}" method="POST" style="display: none;" id="form-logout">@csrf</form>
                        </ul>

                </div>

                @if(Auth::user() && Auth::user()->is_revisor)
                    <li class="nav-item">
                        <a href="{{route('revisor.index')}}" class="nav-link">
                            Revisor home
                            <span class="badge rounded-pill bg-danger">
                                {{App\Models\Adv::ToBeRevisionedCount()}}
                            </span>
                        </a>
                    </li>
                @endif

                @else

                    <div class="me-3 position-absolute end-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Benvenuto Utente</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{route('login')}}">Accedi</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{route('register')}}">Registrati</a></li>
                            </ul>
                        </li>
                    </div>

            @endauth
        </div>
    </div>
</div> --}}

{{--
  <nav class="navbar container-fluid">
    <div class="row">
      <div class="col-12 navbar-content">
            <a class="navbar-brand" href="{{route('homepage')}}"><img class="logopresto"src="/media/prestlogoo.png" alt=""></a>
                <ul class="nav-list">
                    <li class="nav-item"><a href="{{route('homepage')}}">Home</a></li>
                    <li class="nav-item"><a href="">contatti</a></li>
                    <li class="nav-item"><a href="">chi siamo</a></li>
                    <li class="nav-item"><a href="">recensioni</a></li>
                    <li class="nav-item dropdown">   questo li, con le classi nav-item e dropdown è fondamentale per il funzionamento del dropdown
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Tutti gli annunci
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach ($categories as $category)
                            <li><a class="dropdown-item text-dark" href="{{route('public.advs.category', ['category'=>$category->id])}}">{{$category->category_name}}</a></li>
                            @endforeach
                        </ul>
                    </li>



                    @auth
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('adv.create')}}">Inserisci un annuncio</a>
                    </li>

                        @if(Auth::user() && Auth::user()->is_revisor)
                        <li class="nav-item">
                            <a href="{{route('revisor.index')}}" class="nav-link">
                                Revisor home
                                <span class="badge rounded-pill bg-danger">
                                    {{App\Models\Adv::ToBeRevisionedCount()}}
                                </span>
                            </a>
                        </li>

                        <li class="nav-item dropdown  position-absolute end-0">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Benvenuto {{Auth::user()->name}}</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item text-dark" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('form-logout').submit();">Logout</a></li>
                            <form action="{{route('logout')}}" method="POST" style="display: none;" id="form-logout">@csrf</form>
                            </ul>
                        </li>
                        @endif

                        @else

                            <div class="me-3 position-absolute end-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Benvenuto Utente</a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item text-dark" href="{{route('login')}}">Accedi</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item text-dark" href="{{route('register')}}">Registrati</a></li>
                                    </ul>
                                </li>
                            </div>

                        @endauth
                </ul>

       </div>
    </div>

  </nav> --}}
  {{-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Presto.it</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('homepage')}}">Home</a>
          </li>


          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Tutte le categorie annunci presenti
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                @foreach ($categories as $category)
                <li><a class="dropdown-item text-dark" href="{{route('public.advs.category', ['category'=>$category->id])}}">{{$category->category_name}}</a></li>

                @endforeach













            </ul>
          </li>

        </ul>


        <form class="d-flex" class="d-flex" action={{route('search')}} method="GET">
            <input class="form-control me-2 " name='q' type="search" placeholder="Cerca articolo" aria-label="Search">
            <button class="btn btn-outline-primary" type="submit">Cerca</button>
        </form>
      </div>
    </div>
  </nav> --}}