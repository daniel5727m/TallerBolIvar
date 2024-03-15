
<div class=" row">
                        <div >
                            <label for="name" >{{ __(' Nombre') }}</label>

                            
                                <input id="name" type="text" placeholder="*" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ isset($usuario->name) ? $usuario->name : ''}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class=" row">
                        <div >
                            <label for="cedula" >{{ __('Cédula') }}</label>
 
                           
                                <input id="cedula" type="number"  placeholder="*" class="form-control @error('cedula') is-invalid @enderror" name="cedula" value="{{ isset($usuario->cedula) ? $usuario->cedula : ''}}" required autocomplete="cedula" autofocus>
 
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class=" row">
                        <div >
                            <label for="telefono" >{{ __(' Telefono') }}</label>
 
                            
                                <input id="telefono" type="number"  placeholder="*"  class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ isset($usuario->telefono) ? $usuario->telefono : ''}}" required autocomplete="telefono" autofocus>
 
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div  >
                              <label for="email" >{{ __('Correo') }}</label>
                                 <input id="email" type="email" placeholder="*"  class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ isset($usuario->email) ? $usuario->email : ''}}" required autocomplete="email" autofocus>
                                  @error('email')
                                       <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                      @enderror
                 
                            </div>
                        </div>
                        <div class="row">
                            <div  >
                              <label for="email" >{{ __('Perfil') }}</label>
                                 <select name="id_perfil" class="form-control" id="id_perfil" placeholder="*" required autofocus>
                                    <option value="" >Seleccionar</option>
                                    @foreach ($perfiles as $item)
                                        <option value="{{ $item->id }}" {{ (isset($usuario->id_perfil) && $usuario->id_perfil == $item->id) ? 'selected' : ''}} >{{ $item->nombre_perfil }}</option>
                                    
                                    @endforeach
                                 </select>
                                 @error('id_perfil')
                                       <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                      @enderror
                 
                            </div>
                        </div>
                        

                       

</br><br>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Create' }}">
</div>
