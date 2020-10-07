@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="apellidoPaterno" class="col-md-4 col-form-label text-md-right">{{ __('apellido Paterno') }}</label>
                            <div class="col-md-6">
                                <input id="apellidoPaterno" type="text" class="form-control" name="apellidoPaterno"  required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="apellidoMaterno" class="col-md-4 col-form-label text-md-right">{{ __('apellido Materno') }}</label>
                            <div class="col-md-6">
                                <input id="apellidoMaterno" type="text" class="form-control" name="apellidoMaterno"  required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="semestre" class="col-md-4 col-form-label text-md-right">{{ __('semestre') }}</label>
                            <div class="col-md-6">
                                <input id="semestre" type="numeric" class="form-control" name="semestre"  required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="carrera" class="col-md-4 col-form-label text-md-right">{{ __('carrera') }}</label>
                            <div class="col-md-6">
                                <input id="carrera" type="numeric" class="form-control" name="carrera"  required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="correoElectronico" class="col-md-4 col-form-label text-md-right">{{ __('correoElectronico') }}</label>
                            <div class="col-md-6">
                                <input id="correoElectronico" type="text" class="form-control" name="correoElectronico"  required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('email') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email"  required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="especialidad" class="col-md-4 col-form-label text-md-right">{{ __('especialidad') }}</label>
                            <div class="col-md-6">
                                <input id="especialidad" type="text" class="form-control" name="especialidad"  required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sexo" class="col-md-4 col-form-label text-md-right">{{ __('sexo') }}</label>
                            <div class="col-md-6">
                                <input id="sexo" type="text" class="form-control" name="sexo"  required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="noControl" class="col-md-4 col-form-label text-md-right">{{ __('Numero de control') }}</label>
                            <div class="col-md-6">
                                <input id="noControl" type="text" class="form-control @error('Numero de control') es invalido @enderror" name="noControl" required>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
