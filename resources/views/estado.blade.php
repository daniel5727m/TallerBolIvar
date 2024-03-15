@extends('layouts.app')

@section('content')
@guest
    <div class="container">
        <div class="row">
            {{ __('Acceso incorrecto') }}
        </div>
    </div>
@else 


    <div class="container">
        <div class="row">
           

              
          <div class="card" style="width: 70rem;">
                <div class="card-body">
                         <h2 ><b> Estado ERP Nuwwe</b></h2>
                        <br><br>
                        
                        
                       
                         <form method="GET" action="{{ url('/verificar') }}" accept-charset="UTF-8" >
                            
                            
                                <input class="btn btn-primary" type="submit" value="Verificar estado de integración">
                           
                        </form> 
                        
                        <br/>
                        <br/>
                         
                          @if (Session::has('flash_message'))
                          <div class="alert alert-success" role="alert">
                          {{Session::get('flash_message')}}
                          </div>
                          @endif

                          @if (Session::has('message_error'))
                              <div class="alert alert-danger" role="alert">
                              {{Session::get('message_error')}}
                              </div>
                          @endif
                          
                          
                  </div>

          </div>
        </div>
    </div>
       
@endguest
@endsection

