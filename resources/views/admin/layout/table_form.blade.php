@extends('admin.layout.master')

@section('content')

    <div class="admin-usuarios">
        <div class="desktop-dos-columnas">
            <div class="columna-uno">
                <div id="table-container">
                    @yield('table')
                </div>
            </div>

            <div class="columna-dos">
                <div id="form-container">
                    @yield('form')
                </div>
            </div>
        </div>
    </div>

@endsection