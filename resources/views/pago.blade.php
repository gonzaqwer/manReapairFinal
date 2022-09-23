@extends('layouts.base')

@section('content')

    @if ($orden->ultimoPago->estado == 'Pagado')
        <div class="row p-4">
            <h2>Su orden de servicio ya fue pagada, muchas gracias por elegir MANREPAIR.</h2>
        </div>
    @else
        <br>
        <div class="card">
            <div class="card-body">
                {{-- Inicio del card --}}
                <br>
                <div class="card">
                    <div class="card-body">
                        <h4>Detalle de tu compra</h4>
                        Número de orden: {{ $orden->nro }}
                        <br>
                        Celular: {{ $orden->celular->nombre_marca }} {{ $orden->celular->nombre_modelo }}
                        <br>
                        Importe: ${{ $orden->importe_reparacion }}
                    </div>
                </div>
                <br>
                <div class="card">
                    <h5 class="card-header">Completá los datos de tu tarjeta</h5>
                    <div class="card-body">
                        <form action="{{ route('pago.store', ['orden_de_servicio' => $orden->nro]) }}" method="POST"
                            id="formularioPago">
                            @csrf
                            <div class="mb-3">
                                <label for="numeroTarjeta" class="form-label">Número de tarjeta</label>
                                <input type="text"
                                    class="form-control  {{ $errors->has('numeroTarjeta') ? 'border-danger' : '' }}"
                                    id="numeroTarjeta" name="numeroTarjeta" value="{{ old('numeroTarjeta') }}">
                                @error('numeroTarjeta')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nombreTitular" class="form-label">Nombre y apellido</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('nombreTitular') ? 'border-danger' : '' }}"
                                    id="formGroupExampleInput2" name="nombreTitular" value="{{ old('nombreTitular') }}">
                                @error('nombreTitular')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <label for="vencimiento" class="form-label">Fecha de expiración</label>
                                <div class="col">
                                    <input type="text" class="form-control {{ $errors->has('mes') ? 'border-danger' : '' }}" name="mes" id="mes"
                                        placeholder="MM" value="{{ old('mes') }}">
                                    @error('mes')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control {{ $errors->has('año') ? 'border-danger' : '' }}" name="año" id="año"
                                        placeholder="AA" value="{{ old('año') }}">
                                    @error('año')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>


                            <div class="mb-3">
                                <label for="cvv" class="form-label">Código de seguidad</label>
                                <input type="text" class="form-control {{ $errors->has('cvv') ? 'border-danger' : '' }}"
                                    name="cvv"id="formGroupExampleInput2" name="cvv" value="{{ old('cvv') }}">
                                @if ($errors->has('cvv'))
                                    <span class="text-danger">{{ $errors->first('cvv') }}</span>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="dni" class="form-label">DNI del titular de la tarjeta</label>
                                <input type="text" class="form-control {{ $errors->has('dni') ? 'border-danger' : '' }}"
                                    name="dni"id="formGroupExampleInput2" name="dni" value="{{ old('dni') }}">
                                @if ($errors->has('dni'))
                                    <span class="text-danger">{{ $errors->first('dni') }}</span>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label for="correoElectronico" class="form-label">Correo electrónico</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('correoElectronico') ? 'border-danger' : '' }}"
                                    name="correoElectronico"id="formGroupExampleInput2" name="correoElectronico"
                                    value="{{ old('correoElectronico') }}">
                                @if ($errors->has('correoElectronico'))
                                    <span class="text-danger">{{ $errors->first('correoElectronico') }}</span>
                                @endif
                            </div>
                    </div>
                </div>
                <br>
                @if ($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif

                {{-- Fin del card --}}
                <div class="divPagar">
                    <button type="submit" class="btn btn-success botonPagar" id="botonPagar">Pagar</button>
                </div>
                </form>
            </div>
        </div>

    @endif


@stop
