@extends('layouts.app')

@extends('menu-test')

@section('content')
  <div class="container">
    <table id="users" class="table table-striped table-bordered" style="width:100%" >
      
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          {{-- expr --}}
          <tr>
            <td>{{ $user -> id}}</td>
            <td>{{ $user -> name}}</td>
            <td>{{ $user -> email}}</td>
          </tr>
        @endforeach
      </tbody>

    </table>
    

  </div>
    
    <script>
            $(document).ready(function() {
        $('#users').DataTable();
      } );
    </script>
@endsection