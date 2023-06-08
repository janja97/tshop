<div class="bg-success p-2 adminnav">
    <nav class="nav flex-column">
        <a class="nav-link" aria-current="page" href="{{ url('dashboard')}}">Admin das</a>
        <a class="nav-link" aria-current="page" href="{{ url('categories')}}">Kategorije</a>
        <a class="nav-link" href="{{ url('add-category')}}">Dodaj kategoriju</a>
        <a class="nav-link" href="{{url('products')}}">Proizvodi</a>
        <a class="nav-link" href="{{url('add-products')}}">Dodaj proizvod</a>
        <li class="nav-item dropdown row mt-5">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
    </nav>

</div>
