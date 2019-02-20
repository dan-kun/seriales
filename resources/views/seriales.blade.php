@extends('layouts.app')

@extends('menu-test')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Estas en gestión de seriales</h1>
                </div>
            </div>
        </div>
    </div>

    <form action="" method="post">
  @csrf
  {{-- <div class="btn-group" role="group" aria-label="...">
      <h2>Comboboxes</h2>
      <div class="btn-group" role="group">
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
              Seleccione una opción
              <span class="caret"></span>
          </button>
          <ul class="dropdown-menu">
              @foreach($proveed as $daniel)
                <li> <a href="proveedor/prueba/{proveedor}">{{$daniel->proveedor}}</a> </li>
              @endforeach
          </ul>
      </div>
  </div> --}}
  <select name="id" id="addLocationIdReq">
    <option value="" disabled selected >prueba:</option>
                @foreach($serial as $daniel)
                <option   value="{{$daniel->id}}" >{{$daniel->tipo_solicitud}}</option>
                @endforeach
            </select>
        </div>

</form>
</div>
@endsection