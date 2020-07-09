@extends('layouts.app')

@section('content')
<br>
<br>
<div class="container">
  <div class="container is-mobile columns">
    <div class="column is-five-fifths" style="padding-left: 24px;">
      <div class="box">
        <h1 class="title is-1 center">Acceso</h1>
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="field">
              <label class="label">Numero de control</label>
              <div class="control has-icons-left has-icons-right">
                <input class="input " type="text" placeholder="Ingresa tu numero de control" name="no_control" id="no_control">
                  <span class="icon is-small is-left">
                  <i class="fas fa-user"></i>
                  </span>
              </div>
            </div>

            <div class="field">
              <label class="label">Contraseña</label>
              <div class="control has-icons-left has-icons-right">
                <input class="input " type="password" placeholder="Ingresa tu contraseña" name="password" id="password">
                  <span class="icon is-small is-left">
                    <i class="fas fa-lock"></i>
                  </span>
              </div>
            </div>

            <div class="field level-right">
              <div class="control">
                <button type="submit" class="button is-info is-focused">Enviar</button>
              </div>
            </div>
          </form>
      </div>
    </div>
  </div>  
</div>

@endsection
