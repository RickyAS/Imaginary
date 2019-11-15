<nav class="navbar navbar-horizontal navbar-expand-lg navbar-dark bg-default">
        <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{asset('assets/img/brand/imagi.png')}}" />
                  </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-default">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="../../index.html">
                                <img src="../../assets/img/brand/blue.png">
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
                      <ul class="navbar-nav ml-lg-auto">
                        <!-- Authentication Links -->
                            @guest
                           
                            <li class="nav-item">
                                    <div class="nav-link nav-link-icon"">
                                            <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal-login">Login</button>
                                    </div>
                                   @include('auth.login')
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                              <div class="nav-link nav-link-icon"">
                                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal-register">Register</button>
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