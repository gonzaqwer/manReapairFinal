<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePagoRequest;
use App\Mail\EmailConfirmacionPago;
use App\Models\OrdenDeServicio;
use App\Models\Pago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pago');
    }

    public function preview(OrdenDeServicio $orden_de_servicio)
    {
        //VALIDAR QUE LA ORDEN NO ESTA PAGADA Y QUE YA SE ENCUENTRE ARREGLADA Y EL MONTO SEA DISTINTO DE 0.
        return view('pago', ['orden'=>$orden_de_servicio]);
        
    }

    public function pagar(StorePagoRequest $request, OrdenDeServicio $orden_de_servicio){
        //VALIDACIONES

        $exitoPago = rand(1,10);
        if($exitoPago <= 8){
            $request = ['estado'=>'Pagado', 'correo'=>$request->correoElectronico, 'nro_orden_de_servicio'=>$orden_de_servicio->nro];
            Pago::create($request);
            $nroPago = random_int(1000, 1000000);
            // dd($orden_de_servicio->importe_reparacion);
            Mail::to($request['correo'])->send(new EmailConfirmacionPago($nroPago, $orden_de_servicio->importe_reparacion));
            return redirect(route('orden.buscar', [$orden_de_servicio->nro]))->with('status', 'Pago realizado con exito');
        }else{
            $request = ['estado'=>'Rechazado', 'correo'=>'mainRepair@hotmail.com', 'nro_orden_de_servicio'=>$orden_de_servicio->nro];
            Pago::create($request);
            return Redirect::back()
            ->withInput()
            ->withErrors(['status' => 'El pago no se pudo procesar, reintente!']);
        }
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePagoRequest $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function show(Pago $pago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function edit(Pago $pago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pago $pago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pago $pago)
    {
        //
    }
}
