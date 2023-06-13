<ul class="nav justify-content-start bg-success d-flex flex-nowrap"  style="overflow-x: auto; white-space: nowrap;">
  <li class="nav-item">
     <a class="nav-link text-light" aria-current="page" href="{{ url('dashboard')}}">Admin das</a>
  </li>
  <li class="nav-item">
     <a class="nav-link text-light" aria-current="page" href="{{ url('categories')}}">Kategorije</a>
  </li>
  <li class="nav-item">
     <a class="nav-link text-light" href="{{ url('add-category')}}">Dodaj kategoriju</a>
  </li>
  <li class="nav-item">
     <a class="nav-link text-light" href="{{url('products')}}">Proizvodi</a>
  </li>
  <li class="nav-item">
     <a class="nav-link text-light" href="{{url('add-products')}}">Dodaj proizvod</a>
  </li>
  <li class="nav-item ">
    <a class="nav-link text-light" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
        </form>
      </li>
</ul>
