<div class="modal-header">
    <h4 class="modal-title">Actualizar Tipo de Curso</h4>
</div>
<form action="" id="formulario-editar" autocomplete="off">
    @csrf
    @method('PUT')
    <div class="modal-body">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="nombre">Nombre</label>
            <div class="col-sm-8">
                <input type="text" value="{{ $registro->nombre }}" name="nombre" id="nombre" class="form-control" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="descripcion">Descripcion</label>
            <div class="col-sm-8">
                <textarea name="descripcion" id="descripcion" class="form-control">{{ $registro->descripcion }}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="activo">Activo?</label>
            <div class="col-sm-8">
                <input type="checkbox" @if($registro->activo == "1") checked @endif name="activo" id="activo" value="1" class="form-control" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="abreviatura">Abreviatura</label>
            <div class="col-sm-8">
                <input type="text" value="{{ $registro->abreviatura }}" name="abreviatura" id="abreviatura" class="form-control" />
            </div>
        </div>
       
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i
                class="fas fa-window-close"></i> Cerrar
        </button>
        <button id="btn-submit" type="submit" class="btn btn-primary"><i class="fas fa-save"></i>
            Actualizar</button>
    </div>
</form>

<script>
   document.getElementById("formulario-editar").addEventListener("submit", function(evento) {
    evento.preventDefault();
    actualizar({{ $registro->id }});
});

</script>