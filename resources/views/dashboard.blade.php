@extends('layouts.app')

@section('title')
    Bienvenido
@endsection

@section('content')
<div class="page-wrapper chiller-theme bg-white toggled">
    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
        <i class="fas fa-bars"></i>
    </a>
    <nav id="sidebar" class="sidebar-wrapper">
        <div class="sidebar-content">
            <div class="sidebar-header">
                <div class="user-info">
                    <span class="user-name">
                        Bienvenido {{auth()->user()->name}}
                    </span>
                    <span class="user-status">
                        <i class="fa fa-circle"></i>
                        <span>Sesión iniciada</span>
                    </span>
                </div>
            </div>
            <div class="sidebar-menu">
                <ul>
                    <li class="header-menu">
                        <span>Opciones</span>
                    </li>
                    {{-- Menú rol administrador --}}
                    <li class="sidebar-dropdown">
                        <a href="#">
                        <i class="fas fa-layer-group"></i>
                        <span>Usuarios</span>
                        </a>
                        <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="#">Crear usuario</a>
                            </li>
                            <li>
                                <a href="#">Modificar usuarios (Editar, eliminar)</a>
                            </li>
                        </ul>
                        </div>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                        <i class="fas fa-layer-group"></i>
                        <span>Categorías</span>
                        </a>
                        <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="{{ route('categorias.create') }}">Crear categoría</a>
                            </li>
                            <li>
                                <a href="{{ route('categorias.index') }}">Modificar categoría (Editar, eliminar)</a>
                            </li>
                        </ul>
                        </div>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                        <i class="fas fa-layer-group"></i>
                        <span>Tags</span>
                        </a>
                        <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="{{ route('tags.create') }}">Crear tags</a>
                            </li>
                            <li>
                                <a href="{{ route('tags.index') }}">Modificar tags (Editar, eliminar)</a>
                            </li>
                        </ul>
                        </div>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                        <i class="fas fa-book-medical"></i>
                        <span>Gestor de Artículos</span>
                        </a>
                        <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="{{ route('articulos.create') }}">Agregar artículo</a>
                            </li>
                            <li>
                                <a href="{{ route('articulos.index') }}">Consultar artículo (Editar, eliminar)</a>
                            </li>
                        </ul>
                        </div>
                    </li>
                    <li class="sidebar-dropdown">
                        <a href="#">
                        <i class="fas fa-book-medical"></i>
                        <span>Gestor de programas</span>
                        </a>
                        <div class="sidebar-submenu">
                        <ul>
                            <li>
                                <a href="{{ route('programas.create') }}">Agregar programa</a>
                            </li>
                            <li>
                                <a href="{{ route('programas.index') }}">Consultar programa (Editar, eliminar)</a>
                            </li>
                        </ul>
                        </div>
                    </li>
                    
                    {{-- // Menú rol administrador --}}
                </ul>
            </div>
        </div>
        <div class="sidebar-footer">
            @auth
                <form action="{{route('logout')}}" method="POST">
                    {{ csrf_field() }}
                    <button class="btn btn">
                        <i class="fa fa-power-off" style="color:red;"></i>
                        <span style="color:red;">Cerrar sesión</span>
                    </button>
                </form>
            @endauth
        </div>
    </nav>
    <main class="page-content">
        @yield('ventana')
    </main>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $(".sidebar-dropdown > a").click(function() {
            $(".sidebar-submenu").slideUp(200);
            if ($(this).parent().hasClass("active")) {
                $(".sidebar-dropdown").removeClass("active");
                $(this).parent().removeClass("active");
            } else {
                $(".sidebar-dropdown").removeClass("active");
                $(this).next(".sidebar-submenu").slideDown(200);
                $(this).parent().addClass("active");
            }
            $("#close-sidebar").click(function() {
                $(".page-wrapper").removeClass("toggled");
            });
            $("#show-sidebar").click(function() {
                $(".page-wrapper").addClass("toggled");
            });
        });
    });
</script>
@endsection

