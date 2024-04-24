<?php
 ?>
<?php

namespace App\Http\Controllers;


use PDF;
use App\Venta;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VentasController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtiene el usuario autenticado
        $user = auth()->user();
    
        // Verifica si el usuario es administrador
        if ($user->hasRole('test')) {
            // Si es administrador, puede ver todas las ventas
            $ventas = Venta::with('usuario')
                           ->join("productos_vendidos", "productos_vendidos.id_venta", "=", "ventas.id")
                           ->select("ventas.*", DB::raw("sum(productos_vendidos.cantidad * productos_vendidos.precio) as total"))
                           ->groupBy("ventas.id", "ventas.created_at", "ventas.updated_at", "ventas.id_usuario")
                           ->get();
        } else {
            // Si no es administrador, solo puede ver sus propias ventas
            $ventas = Venta::where('id_usuario', $user->id)
                           ->with('usuario')
                           ->join("productos_vendidos", "productos_vendidos.id_venta", "=", "ventas.id")
                           ->select("ventas.*", DB::raw("sum(productos_vendidos.cantidad * productos_vendidos.precio) as total"))
                           ->groupBy("ventas.id", "ventas.created_at", "ventas.updated_at", "ventas.id_usuario")
                           ->get();
        }
    
        return view("ventas.ventas_index", ["ventas" => $ventas]);
    }
    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Venta $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {

        $total = 0;
        foreach ($venta->productos as $producto) {
            $total += $producto->cantidad * $producto->precio;
        }
        return view("ventas.ventas_show", [
            "venta" => $venta,
            "total" => $total,
        ]);
    }

    public function generatePDF($id)
    {
        // Carga la venta junto con el usuario y productos
        $venta = Venta::with(['usuario', 'productos'])
                      ->findOrFail($id);
    
        // Genera el PDF usando la vista 'ventas.pdf_ticket', pasando los datos de la venta
        $pdf = PDF::loadView('ventas.pdf_ticket', ['venta' => $venta]);
    
        // Descarga el PDF con un nombre de archivo basado en el ID de la venta
        return $pdf->download('ticket_venta_' . $venta->id . '.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Venta $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Venta $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Venta $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        $venta->delete();
        return redirect()->route("ventas.index")
            ->with("mensaje", "Venta eliminada");
    }
}
