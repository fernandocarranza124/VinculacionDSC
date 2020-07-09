  @extends('layouts.app')      
  @section('content')
  <br>
  <section class="section is-hero">
    <div class="container">
      <div class="columns is-vcentered">  
        <div class="column is-6 is-5-fullhd is-offset-1-fullhd"> 
          <div class="section-header"> 
            <h1 class="title is-spaced"> 
              Inicia tus residencias
              <span class="is-hidden-touch">
                <br>
              </span> 
              profesionales
            </h1> 
            <h2 class="subtitle is-3">
             Conoce las vacantes que se encuentran disponibles para ti.
            </h2> 
            <div class="field is-grouped"> 
              <div class="control"> 
                <a class="button is-info is-medium" href="#platform"> 
                📚 Vacantes
                </a> 
              </div> 
              <div class="control"> 
                <a class="button is-light is-medium" href="/library">
                  Mas informacion
                </a> 
              </div> 
              </div> 
                <hr class="spacer is-1-5"> 
                  <a class="has-tint has-text-weight-semibold" href="http://www.parents-choice.org/product.cfm?product_id=35555" target="_blank">
                    <i class="icon icon-award">
                    </i>
                    <span>
                      Contacta la oficina de vinculacion
                    </span>
                  </a> 
                </div> 
              </div> 
              <div class="column is-6"> 
                <div class="section-media"> 
                  <img role="presentation" src="{{ asset('img/desk.png') }}" >
                   <p> 
                    <small>
                      <a href="/library/karlotta-the-knight">
                        <u>
                          
                        </u>
                      </a> 
                      
                    </small> 
                  </p> 
                </div> 
              </div> 
            </div> 
          </div> 
        </section>
  @endsection
