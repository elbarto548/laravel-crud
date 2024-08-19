<div class="modal-header">
    <h4 class="modal-title">Registrar Curso</h4>
</div>
<form action="" id="formulario-crear" autocomplete="off">
    @csrf
    <div class="modal-body">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="tipo_curso_id">Tipo de Curso</label>
            <div class="col-sm-8">
                <select type="text" name="tipo_curso_id" id="tipo_curso_id" class="form-control" >
                    <option value="">[--SELECCIONE--]</option>
                    @foreach ($tipo_cursos as $tipo)
                    <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                    @endforeach
            </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="nombre">Nombre</label>
            <div class="col-sm-8">
                <input type="text" name="nombre" id="nombre" class="form-control" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="precio">Precio</label>
            <div class="col-sm-8">
                <input type="number" name="precio" id="precio" class="form-control" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="imagen">Imagen</label>
            <div class="col-sm-8">
                <input type="file" name="imagen" id="imagen" class="form-control" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="fecha_inicio">Fecha de Inicio</label>
            <div class="col-sm-8">
                <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="fecha_fin">Fecha de Fin</label>
            <div class="col-sm-8">
                <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="descripcion">Descripcion</label>
            <div class="col-sm-8">
                <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="activo">Activo?</label>
            <div class="col-sm-8">
                <input type="checkbox" name="activo" id="activo" value="1" class="form-control" />
            </div>
        </div>
       
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i
                class="fas fa-window-close"></i> Cerrar
        </button>
        <button id="btn-submit" type="submit" class="btn btn-primary"><i class="fas fa-save"></i>
            Registrar</button>
    </div>
</form>

<script>
   document.getElementById("formulario-crear").addEventListener("submit", function(evento) {
    evento.preventDefault();
    guardar();
});

</script>