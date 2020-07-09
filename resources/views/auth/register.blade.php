@extends('layouts.app')

@section('content')
<br>
<br>
<div class="container">
  <div class="container is-mobile columns">
    <div class="column is-five-fifths" style="padding-left: 24px;">
      <div class="box">
        <h1 class="title is-1 center">Registrate</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        <div class="field">
          <label class="label">Numero de control: </label>
          <div class="control has-icons-left has-icons-right">
            <input class="input " type="text" placeholder="Ingresa tu numero de control" id="no_control" name="no_control">
            <span class="icon is-small is-left">
              <i class="fas fa-address-card"></i>
            </span>
          </div>
        </div>

        <div class="field">
          <label class="label">Nombre(s): </label>
          <div class="control has-icons-left has-icons-right">
            <input class="input " type="text" placeholder="Ingresa tu(s) nombre(s)" id="name" type="text" name="nombre">
            <span class="icon is-small is-left">
              <i class="fas fa-user"></i>
            </span>
          </div>
        </div>
        <div class="columns">
            <div class="field is-grouped column">
                <label class="label">Apellido paterno: </label><br>
                <input class="input " type="text" placeholder="Ingresa tu apellido paterno" id="apellido_paterno" name="apellido_paterno">
            </div>
            <div class="field is-grouped column">
                <label class="label" for="apellido_materno">Apellido materno: </label>
                <input class="input" id="apellido_materno" type="text" placeholder="Ingresa tu apellido materno" name="apellido_materno">
            </div>
        </div>
        <div class="field">
            <label class="label">Correo electronico: </label>
            <div class="control has-icons-left has-icons-right">
              <input class="input " type="text" placeholder="Ingresa tu correo" id="email" name="email">
              <span class="icon is-small is-left">
                <i class="fas fa-user-graduate"></i>
              </span>
            </div>
            <p class="help is-primary is-right">
                Ingresa tu correo institucional
            </p>
        </div>
        <div class="field">
            <label class="label">Contraseña: </label>
            <div class="control has-icons-left has-icons-right">
              <input class="input " type="password" placeholder="Ingresa una contraseña que contenga al menos 8 caracteres" id="password" name="password">
              <span class="icon is-small is-left">
                <i class="fas fa-user-lock"></i>
              </span>
            </div>
          </div>
        

        <div class="field level-right">
          <div class="control">
            <button type="submit" class="button is-info is-focused">
                {{ __('Enviar') }}
            </button>
          </div>
        </div>
    </form>
      </div>
    </div>
  </div>  
</div>

@endsection
