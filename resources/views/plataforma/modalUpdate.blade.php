<!-- inicio modal-->
<div class="modal fade" id="modal-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar configuración de plataforma</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('plataforma.modificar', $item->id) }}" accept-charset="UTF-8" enctype="multipart/form-data">
          
                @csrf
                <br><br><br><br>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">No:</label>
                    <input type="text" class="form-control" name="id" readonly value="{{ $item->id }}">
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Descripcion:</label>
                    <textarea class="form-control" id="descripcion" readonly style="overflow:auto;resize:none">{{ $item->descripcion }}</textarea>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Valor:</label>
                    <input type="file" class="form-control" accept=".png" name="valorF" id="valorIF" style="display:none">
                    <textarea class="form-control" id="valorT"  name="valor" rows="6" required>{{ $item->valor }}</textarea>
                </div>

            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </br></br>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin modal-->  