@extends('layouts.base')

@section('content')

    <br>
    <div class="card">
        <div class="card-body">
            {{-- Inicio del card --}}
            <br>
            <div class="card">
                <div class="card-body">
                    <h4>Detalle de tu compra</h4>
                    Mi producto:
                </div>
            </div>
            <br>
            <div class="card">
                <h5 class="card-header">Completá los datos de tu tarjeta</h5>
                <div class="card-body">

                    <form action="#" method="post" id="formularioPago">
                        <div class="mb-3">
                            <label for="numeroTarjeta" class="form-label">
                                Número de tarjeta</label>
                            <input type="text" class="form-control" id="numeroTarjeta">
                        </div>

                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Vencimiento</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="MM/AA">
                        </div>

                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Nombre del titular</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2">
                        </div>

                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">CVV</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2">
                        </div>
                    

                </div>
            </div>
            <br>
            {{-- Fin del card --}}
            <div class="divPagar">
                <button type="submit" class="btn btn-success botonPagar" id="botonPagar">Pagar</button>
            </div>
        </form>
        </div>
    </div>


@stop
