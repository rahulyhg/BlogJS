<ul class="list-group">
    <li class="list-group-item {{ ($item == 0) ? 'active' : '' }}">
        @if($item != 0)
            <a href="{{ url('/admin/posts') }}">
                @endif
                Nuevo Post
                @if($item != 0)
            </a>
        @endif
    </li>
    <li class="list-group-item {{ ($item == 1) ? 'active' : ''  }}">
        @if($item != 1)
            <a href="{{ url('/admin/administrar-posts') }}">
                @endif
                Posts
                @if($item != 1)
            </a>
        @endif
    </li>
    <li class="list-group-item {{ ($item == 2) ? 'active' : ''  }}">
        @if($item != 2)
            <a href="{{ url('/admin/categorias') }}">
                @endif
                Categorias
                @if($item != 2)
            </a>
        @endif
    </li>
    <li class="list-group-item {{ ($item == 3) ? 'active' : ''  }}">
        @if($item != 3)
            <a href="{{ url('/admin/subcategorias') }}">
                @endif
                Subcategorias
                @if($item != 3)
            </a>
        @endif
    </li>
    <li class="list-group-item {{ ($item == 4) ? 'active' : ''  }}">
        @if($item != 4)
            <a href="{{ url('/admin/estadisticas') }}">
                @endif
                Estadisticas
                @if($item != 4)
            </a>
        @endif
    </li>
    <li class="list-group-item {{ ($item == 5) ? 'active' : ''  }}">
        @if($item != 5)
            <a href="{{ url('/admin/newsletter') }}">
                @endif
                Newsletter
                @if($item != 5)
            </a>
        @endif
    </li>
    <li class="list-group-item {{ ($item == 6) ? 'active' : ''  }}">
        @if($item != 6)
            <a href="{{ url('/admin/configuracion') }}">
                @endif
                Mi Configuración
                @if($item != 6)
            </a>
        @endif
    </li>
    <li class="list-group-item">
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Cerrar Sesión
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </li>
</ul>