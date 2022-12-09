<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="{{ url('/') }}">
      {{ config('app.name', 'Finding Schools') }}
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a href="/"
            class="nav-link
            @if (@$page == 'home') {{ 'active' }} @endif
          ">Home</a>
        </li>
        <li class="nav-item">
          <a href="/schools"
            class="nav-link 
            @if (@$page == 'school') {{ 'active' }} @endif
          ">Schools</a>
        </li>
        @auth
          @if (auth()->user()->level == 'student')
            <li class="nav-item">
              <a class="nav-link  @if (@$page == 'submission') {{ 'active' }} @endif"
                href="/user/submission">Submission</a>
            </li>
          @endif
          @if (auth()->user()->level == 'owner')
            <li class="nav-item">
              <a class="nav-link  @if (@$page == 'registrators') {{ 'active' }} @endif"
                href="/user/registrators">Registrators</a>
            </li>
          @endif
        @endauth
      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav">
        <!-- Authentication Links -->
        @guest
          @if (Route::has('login'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('LOGIN') }}</a>
            </li>
          @endif

          @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link link-success fw-bold" href="{{ route('register') }}">{{ __('REGISTER') }}</a>
            </li>
          @endif
        @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle fw-bold link" href="#" role="button"
              data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

              <a class="dropdown-item" href="/user">Profile</a>
              @if (auth()->user()->level == 'user' || auth()->user()->level == 'owner')
                <a class="dropdown-item" href="/user/school">School</a>
              @endif

              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </div>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
