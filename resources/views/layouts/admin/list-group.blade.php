<ul class="list-group">
    <li class="list-group-item {{ ($item == 1) ? 'active' : ''  }}">
        @if($item != 1)
            <a href="#">
                @endif
                Posts
                @if($item != 1)
            </a>
        @endif
    </li>
    <li class="list-group-item {{ ($item == 2) ? 'active' : ''  }}">
        @if($item != 2)
            <a href="#">
                @endif
                Categorias
                @if($item != 2)
            </a>
        @endif
    </li>
    <li class="list-group-item {{ ($item == 3) ? 'active' : ''  }}">
        @if($item != 3)
            <a href="#">
                @endif
                Subcategorias
                @if($item != 3)
            </a>
        @endif
    </li>
    <li class="list-group-item {{ ($item == 4) ? 'active' : ''  }}">
        @if($item != 4)
            <a href="#">
                @endif
                Estadisticas
                @if($item != 4)
            </a>
        @endif
    </li>
    <li class="list-group-item {{ ($item == 5) ? 'active' : ''  }}">
        @if($item != 5)
            <a href="#">
                @endif
                Newsletter
                @if($item != 5)
            </a>
        @endif
    </li>
    <li class="list-group-item {{ ($item == 6) ? 'active' : ''  }}">
        @if($item != 6)
            <a href="#">
                @endif
                Configuración
                @if($item != 6)
            </a>
        @endif
    </li>
</ul>