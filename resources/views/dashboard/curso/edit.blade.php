<div class="modal-header">
    <h4 class="modal-title">Actualizar Registrar Curso</h4>
</div>
<form action="" id="formulario-editar" autocomplete="off">
    @csrf
    @method('PUT')
    <div class="modal-body">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="tipo_curso_id">Tipo de Curso</label>
            <div class="col-sm-8">
                <select name="tipo_curso_id" id="tipo_curso_id" class="form-control">
                    <option value="">[--SELECCIONE--]</option>
                    @foreach ($tipo_cursos as $tipo)
                    <option value="{{ $tipo->id }}" @if($registro->tipo_curso_id == $tipo->id) selected @endif>
                        {{ $tipo->nombre }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="nombre">Nombre</label>
            <div class="col-sm-8">
                <input type="text" name="nombre" id="nombre" value="{{ $registro->nombre }}" class="form-control" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="precio">Precio</label>
            <div class="col-sm-8">
                <input type="number" name="precio" id="precio" value="{{ $registro->precio }}" class="form-control" />
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
                <input type="date" name="fecha_inicio" id="fecha_inicio" value="{{ $registro->fecha_inicio }}" class="form-control" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="fecha_fin">Fecha de Fin</label>
            <div class="col-sm-8">
                <input type="date" name="fecha_fin" id="fecha_fin" value="{{ $registro->fecha_fin }}" class="form-control" />
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
                <input type="checkbox" name="activo" id="activo" value="1" class="form-control" @if($registro->activo == "1") checked @endif />
            </div>
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Cerrar</button>
        <button id="btn-submit" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Actualizar</button>
    </div>
</form>

<script>
    document.getElementById("formulario-editar").addEventListener("submit", function(evento) {
        evento.preventDefault();
        actualizar({{ $registro->id }});
    });
</script>
