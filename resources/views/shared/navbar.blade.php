<nav class="flex justify-between items-center bg-blue-400 text-blue-100 text-xl px-4 py-2">
  <a href="/">
      <i class="fab fa-trello"></i> Tello
  </a>
  <div>
    @guest
        <a class="user-button" href="{{ route('login') }}">{{ __('Login') }}</a>
        @if (Route::has('register'))
        <a class="user-button" href="{{ route('register') }}">{{ __('Register') }}</a>
        @endif
    @else
        <span class="mr-2">{{ Auth::user()->email }}</span>
        
        <a class="user-button" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endguest
  </div>
</nav>
