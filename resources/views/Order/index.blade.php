@extends('layouts.baseTemplate')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
@endsection

@section('contenido')
<div class = "black-rounded-div">
    <h1> Ordenes </h1>

    <table id="ordenes" class="table table-striped mt-4">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Solicitante</th>
            <th scope="col">Mascota</th>

            <th scope="col">Accions</th>
        </tr>
    </thead>
        <tbody>
            @foreach($ordenes as $orden)
            <tr>
                <td> {{ $orden-> id}} </td>
                <td> {{ $orden -> client -> name}} </td>
                <td>
                @foreach($pets as $pet)
                    @if($pet->id_order == $orden->id)
                        {{ $pet->name }},{{ $pet -> category -> name}}
                    @endif
                @endforeach
            </td>
                <td>
                <form action= "{{route ('orders.destroy',$orden->id)}}" method="POST">
                        
                    @csrf
                    @method('DELETE')
                <button type="submit" class="btn btn-danger">Borrar</button>
                </form>          
                </td>  
                
            </tr>
            @endforeach
        
    
        </tbody>
    </table>

    @section('js')
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
        
        <script>
            
            $('#ordenes').DataTable({
                "lengthMenu": [
                    [5,10, 25, 50, -1],
                    [5,10, 25, 50, "All"]
                ]
            });
            
            
        </script>
    @endsection

</div>
@endsection