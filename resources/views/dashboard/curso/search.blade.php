<div class="card">
    <div class="card-header">
        <h3 class="card-title">Resultado de búsqueda</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Tipo de curso</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>Fecha inicio</th>
                    <th>Fecha fin</th>
                    <th>Descripcion</th>
                    <th>Activo</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listado as $item)
                    <tr>
                        <td>{{ $item->nombre_tipo_curso }}</td>
                        <td>{{ $item->nombre }}</td>
                        <td>{{ $item->precio }}</td>
                        <td>
                            <img width="150px" src="{{ asset(str_replace("public", "storage",$item->imagen,)) }}">
                        </td>
                        <td>{{ $item->fecha_inicio }}</td>
                        <td>{{ $item->fecha_fin }}</td>
                        <td>{{ $item->descripcion }}</td>
                        <td>{{ ($item->activo == 1)? "SI" : "NO"}}</td>
                        <td>
                            <button onclick="modalEditar({{ $item->id }})" class="btn btn-warning">Editar</button>
                            <button onclick="confirmarEliminar({{ $item->id }})" class="btn btn-danger">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Tipo de curso</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>Fecha inicio</th>
                    <th>Fecha fin</th>
                    <th>Descripcion</th>
                    <th>Activo</th>
                    <th>Opciones</th>
                </tr>
            </tfoot>
        </table>
    </div>
    </div>
    <!-- /.card-body -->
</div>
