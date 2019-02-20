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

  <script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" type="text/javascript" charset="utf-8"></script>
    
    <script>
            $(document).ready(function() {
        $('#users').DataTable();
      } );
    </script>
@endsection