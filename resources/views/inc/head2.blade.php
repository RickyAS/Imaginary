<div style="background-image: url('/storage/albums_image/baloon.jpg')!important
; background-size: 100% !important;  background-repeat: no-repeat !important;
background-position: center !important;">
<nav class="navbar navbar-horizontal navbar-expand-lg navbar-dark " >
        <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="../assets/img/brand/imagi.png" />
                  </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-default">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="../../index.html">
                                <img src="{{asset('assets/img/brand/imagi.png')}}">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <form class="mt-4 mb-3 d-md-none">
                        <div class="input-group input-group-rounded input-group-merge">
                          <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <span class="fa fa-search"></span>
                            </div>
                          </div>
                        </div>
                      </form>
                
                      <ul class="navbar-nav ml-lg-auto">
                        <li class="nav-item">
                        </li>  

                        <!-- Authentication Links -->
                            @guest
                           
                            <li class="nav-item">
                                    <div class="nav-link nav-link-icon">
                                            <button type="button" class="btn  btn-icon btn-3 btn-default" data-toggle="modal" data-target="#modal-login">
                                                <span class="btn-inner--icon"><i class="ni ni-key-25"></i></span>
                                                <span class="btn-inner--text">Login</span>
                                            </button>
                                    </div>
                                    @include('auth.login')
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <div class="nav-link nav-link-icon"">
                                    <button type="button" class="btn  btn-icon btn-3 btn-default" data-toggle="modal" data-target="#modal-register">
                                        <span class="btn-inner--icon"><i class="ni ni-circle-08"></i></span>
                                                <span class="btn-inner--text">Register</span>
                                    </button>
                                  </div>
                                  @include('auth.register')
                            </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                              <a class="nav-link" href="#" id="navbar-primary_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{ Auth::user()->name }}</a>
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-primary_dropdown_1">
                                <a class="dropdown-item" href="/profile">My Profile</a>
                                <a class="dropdown-item" href="/albums">My Collections</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                              </div>
                            </li>
                            @endguest
                          </ul>
                
            </div>
        </div>

    </nav>
<!-- Header -->

  <div class="container-fluid">
    <div class="header-body">
      <!-- Card stats -->
      <div class="row">
          <div class="col-md-6" style="margin:0 auto">
            <h1 class="display-3" style="color:cornsilk;">Images for your daily need!</h1>
          </div>
      </div>
      <div class="row">
          <div class="col-md-6" style="margin:0 auto">
              <div class="form-group">
                <div class="input-group input-group-alternative mb-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                  </div>
                  <input class="form-control form-control-alternative" placeholder="Search for albums" type="text">
                </div>
              </div>
            </div>
        </div>
    </div>
  </div>

</div>