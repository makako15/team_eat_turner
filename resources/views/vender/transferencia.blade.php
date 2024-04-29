@extends("maestra")
@section("titulo", "Realizar venta")
@section("contenido")

<h1>Transferencia</h1>
 <!-- Botón "Terminar venta" -->
 @if(session("productos") !== null)
        <form action="{{ route('terminarOCancelarVenta') }}" method="post">
            @csrf
            <button id="pagarEnCafeteria" name="accion" value="terminar" type="submit" class="btn btn-primary">Terminar venta</button>
            <a id="volver" class="btn btn-info" href="{{route('vender.index')}}">
                <i class="fa fa-arrow-left"></i>&nbsp;Volver
            </a>
        </form>
        @endif
       
    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Número de cuenta</th>
                <th>Nota</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tec Lerdo</td>
                <td>1234 1234 1234 1234</td>
                <td>Mostrar en cafeteria tu ticket y tu comprobante de transferencia</td>
        </tbody>
    
@endsection
