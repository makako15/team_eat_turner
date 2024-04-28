
@extends("maestra")
@section("titulo", "Realizar venta")
@section("contenido")
    <div class="row">
        <div class="col-12">
            <h1>Nueva venta <i class="fa fa-cart-plus"></i></h1>
            @include("notificacion")
            <div class="row">
                <div class="col-12 col-md-6">
                    <form action="{{route("terminarOCancelarVenta")}}" method="post">
                        @csrf
                        <label></label>
            <p class="usuario">{{ $usuario->name }}</p> 
                        @if(session("productos") !== null)
                            <div class="form-group">
                                <button name="accion" value="terminar" type="submit" class="btn btn-success">Terminar
                                    venta
                                </button>
                                <button name="accion" value="cancelar" type="submit" class="btn btn-danger">Cancelar
                                    venta
                                </button>
                            </div>
                        @endif
                    </form>
                </div>
                <div class="col-12 col-md-6">
                    <form action="{{route("agregarProductoVenta")}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="codigo" for="codigo">Código del producto</label>
                            <input id="codigo" autocomplete="off" required autofocus name="codigo" type="text"
                                   class="form-control"
                                   placeholder="Código del producto">
                        </div>
                    </form>
                </div>
            </div>
            @if(session("productos") !== null)
                <h2>Total: ${{number_format($total, 2)}}</h2>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Código de producto</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Quitar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(session("productos") as $producto)
                            <tr>
                                <td>{{$producto->codigo_barras}}</td>
                                <td>{{$producto->descripcion}}</td>
                                <td>${{number_format($producto->precio_venta, 2)}}</td>
                                <td>{{$producto->cantidad}}</td>
                                <td>
                                    <form action="{{route("quitarProductoDeVenta")}}" method="post">
                                        @method("delete")
                                        @csrf
                                        <input type="hidden" name="indice" value="{{$loop->index}}">
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <h2>Catalogo de Productos
                    <br>
                    <!--Escanea el código de barras o escribe y presiona Enter</h2>-->
            @endif
        </div>
    </div>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/estilos.css">
    <script src="app.js" async></script>
    <title>Team Eat Turner</title>
</head>
<body>
    <header>
        
    </header>
    <section class="contenedor">
         <!--Catalogo de productos--> 
        <div class="contenedor-items">
            <div class="item">
                <span class="titulo-item">Chips Fuego</span>
                <img src="/img/chips-moradas.png" class="img-item">
                <span class="precio-item">Codigo 1</span>
                <span class="precio-item">$15.00</span>
                <!---<button class="boton-item">Agregar al Carrito</button>-->
            </div>
            <div class="item">
                <span class="titulo-item">Agua ciel 1L</span>
                <img src="/img/agua-ciel.png" alt="" class="img-item">
                <span class="precio-item"></span>
                <span class="precio-item">Codigo 2</span>
                <span class="precio-item">$25.00</span>
                <!---<button class="boton-item">Agregar al Carrito</button>-->
            </div>
            <div class="item">
                <span class="titulo-item">Coca-Cola 600ml</span>
                <img src="/img/coca-cola.png" alt="" class="img-item">
                <span class="precio-item">Codigo 3</span>
                <span class="precio-item">$35.00</span>
                <!---<button class="boton-item">Agregar al Carrito</button>-->
            </div>
            <div class="item">
                <span class="titulo-item">Chicle Orbit</span>
                <img src="/img/chicle orbit.png" alt="" class="img-item">
                <span class="precio-item">Codigo 4</span>
                <span class="precio-item">$3.00</span>
                <!---<button class="boton-item">Agregar al Carrito</button>-->
            </div>
            <div class="item">
                <span class="titulo-item">Chilaquiles Verdes</span>
                <img src="/img/chilaquiiles.png" alt="" class="img-item">
                <span class="precio-item">Codigo 5</span>
                <span class="precio-item">$32.00</span>
                <!---<button class="boton-item">Agregar al Carrito</button>-->
            </div>
            <div class="item">
                <span class="titulo-item">Choco Roles</span>
                <img src="/img/chocoroles.png" alt="" class="img-item">
                <span class="precio-item">Codigo 6</span>
                <span class="precio-item">$18.00</span>
                <!---<button class="boton-item">Agregar al Carrito</button>-->
            </div>
            <div class="item">
                <span class="titulo-item">Fanta de Fresa 600ml</span>
                <img src="/img/fanta-fresa.png" alt="" class="img-item">
                <span class="precio-item">Codigo 7</span>
                <span class="precio-item">$18.00</span>
                <!---<button class="boton-item">Agregar al Carrito</button>-->
            </div>
            <div class="item">
                <span class="titulo-item">Galletas Emperador Senzo</span>
                <img src="/img/galletas-emperador-senzo.png" alt="" class="img-item">
                <span class="precio-item">Codigo 8</span>
                <span class="precio-item">$20.00</span>
                <!---<button class="boton-item">Agregar al Carrito</button>-->
            </div>
            <div class="item">
                <span class="titulo-item">Malteada de Chocolate</span>
                <img src="/img/malteada.png" alt="" class="img-item">
                <span class="precio-item">Codigo 9</span>
                <span class="precio-item">$20.00</span>
                <!---<button class="boton-item">Agregar al Carrito</button>-->
            </div>
            <div class="item">
                <span class="titulo-item">Hamburguesa</span>
                <img src="/img/hamburguesa.png" alt="" class="img-item">
                <span class="precio-item">Codigo 10</span>
                <span class="precio-item">$30.00</span>
                <!---<button class="boton-item">Agregar al Carrito</button>-->
            </div>
            <div class="item">
                <span class="titulo-item">Hielitos</span>
                <img src="/img/Hielitos.png" alt="" class="img-item">
                <span class="precio-item">Codigo 11</span>
                <span class="precio-item">$18.00</span>
                <!---<button class="boton-item">Agregar al Carrito</button>-->
            </div>
            <div class="item">
                <span class="titulo-item">Jugo Pulpy 545ml</span>
                <img src="/img/Jugo-pulpit.png" alt="" class="img-item">
                <span class="precio-item">Codigo 12</span>
                <span class="precio-item">$18.00</span>
                <!---<button class="boton-item">Agregar al Carrito</button>-->
            </div>
            <div class="item">
                <span class="titulo-item">Jugo Del Valle 545ml</span>
                <img src="/img/jugo-vidrio-durazno.png" alt="" class="img-item">
                <span class="precio-item">Codigo 13</span>
                <span class="precio-item">$18.00</span>
                <!---<button class="boton-item">Agregar al Carrito</button>-->
            </div>
            <div class="item">
                <span class="titulo-item">Paleta Trabalenguas</span>
                <img src="/img/paleta.png" alt="" class="img-item">
                <span class="precio-item">Codigo 14</span>
                <span class="precio-item">$5.00</span>
                <!---<button class="boton-item">Agregar al Carrito</button>-->
            </div>
            <div class="item">
                <span class="titulo-item">Quesadillas</span>
                <img src="/img/quesadillas.png" alt="" class="img-item">
                <span class="precio-item">Codigo 15</span>
                <span class="precio-item">$18.00</span>
                <!---<button class="boton-item">Agregar al Carrito</button>-->
            </div>
            <div class="item">
                <span class="titulo-item">Sandwich Calientes</span>
                <img src="/img/sandwich-calientes.png" alt="" class="img-item">
                <span class="precio-item">Codigo 16</span>
                <span class="precio-item">$12.00</span>
                <!---<button class="boton-item">Agregar al Carrito</button>-->
            </div>
            <div class="item">
                <span class="titulo-item">Takis Fuego</span>
                <img src="/img/takis.png" alt="" class="img-item">
                <span class="precio-item">Codigo 17</span>
                <span class="precio-item">$18.00</span>
                <!--<button class="boton-item">Agregar al Carrito</button>-->
            </div>
            <div class="item">
                <span class="titulo-item">Frappe</span>
                <img src="/img/frape.png" alt="" class="img-item">
                <span class="precio-item">Codigo 18</span>
                <span class="precio-item">$40.00</span>
                <!--<button class="boton-item">Agregar al Carrito</button>-->
            </div>
            <div class="item">
                <span class="titulo-item">Maruchan</span>
                <img src="/img/maruchan.png" alt="" class="img-item">
                <span class="precio-item">Codigo 19</span>
                <span class="precio-item">$22.00</span>
                <!--<button class="boton-item">Agregar al Carrito</button>-->
            </div>
            <div class="item">
                <span class="titulo-item">Vuala</span>
                <img src="/img/vuala.png" alt="" class="img-item">
                <span class="precio-item">Codigo 20</span>
                <span class="precio-item">$18.00</span>
                <!--<button class="boton-item">Agregar al Carrito</button>-->
            </div>
        </div>
    </section>
    <script src="/js/aplicacion.js"></script>
</body>
</html>
@endsection
