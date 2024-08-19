@extends('layouts.base')

@section('titulo')
    Tipos de cursos
@endsection

@section('contenido')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tipos de cursos</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- /.col-md-6 -->
                    <div class="col-lg-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h5 class="m-0">Búsqueda de tipos de cursos</h5>
                            </div>
                            <div class="card-body">
                                <form class="form-inline" id="formulario-busqueda">
                                    <label class="my-1 mr-2" for="busqueda">Nombre</label>
                                    <input type="text" class="form-control my-1 mr-sm-2" id="busqueda" name="busqueda"
                                        placeholder="">
                                    <button type="submit" class="btn btn-primary my-1">Buscar</button>
                                    <button onclick="modalCrear()" type="button"
                                        class="btn btn-success my-1 mx-1">Nuevo</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <div class="row">
                    <div class="col-12" id="listado">

                        <!-- /.card -->

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection


@section('modales')
    <div class="modal fade" id="modal-agregar" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-agregar-contenido">
               
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-editar" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-editar-contenido">
                
            </div>
        </div>
    </div>
@endsection


@section('javascript')
    <script>
        document.getElementById('formulario-busqueda').addEventListener('submit', function(evento) {
            evento.preventDefault();
            search();
        });

        function search() {
            const busqueda = document.getElementById('busqueda').value;
            const ruta = route('tipo_curso.search');
            const params = {
                params: {
                    "busqueda": busqueda
                }
            };
            axios.get(ruta, params)
                .then(function(response) {
                    const tabla_html = response.data;
                    $('#listado').html(tabla_html)
                })
                .catch(function(error) {
                    console.error("Error")
                });
        }





        // $(function() {
        //     $('#example2').DataTable({
        //         "paging": true,
        //         "lengthChange": false,
        //         "searching": false,
        //         "ordering": true,
        //         "info": true,
        //         "autoWidth": false,
        //         "responsive": true,
        //         "columnDefs": [{
        //             targets: 4,
        //             orderable: false,
        //             searchable: false
        //         }]
        //     });
        // });

        document.getElementById('formulario-crear').addEventListener('submit', function(evento) {
            evento.preventDefault();
            guardar();
        });

        document.getElementById('formulario-editar').addEventListener('submit', function(evento) {
            evento.preventDefault();
            actualizar();
        });

        function modalCrear() {
            const ruta = route("tipo_curso.create");

            axios.get(ruta)
            .then(function(response)
            {  //100 200 300
                const contenido_html = response.data;
                $("#modal-agregar-contenido").html(contenido_html);
                $('#modal-agregar').modal('show');
            })
            .catch(function(error) {
                // 400 500
                    if(error.response){
                        const message =error.response.data.message;
                        toastr.error(message)
                    } else {
                        toastr.error(error)
                    }
                });
           
        }

        function guardar() {

            const ruta = route('tipo_curso.store');
            const formulario = document.getElementById("formulario-crear")
            const data = new FormData(formulario);
            limpiarErrores("formulario-crear");
            axios.post(ruta, data)
            .then(function(response){
                const message = response.data.message;
                toastr.success(message);
                $('#modal-agregar').modal('hide');
                search();
            })
            .catch(function(error){
                if(error.response){
                    //entidad improcesable
                    toastr.error(error.response.data.message)
                    if(error.response.status === 422){
                        mostrarErrores("formulario-crear", error.response.data.errors);
                    }
                }else{
                    toastr.error(error)
                }
            });

            
            
        }

        function modalEditar(id) {
            const ruta = route("tipo_curso.edit",[id]);
            axios.get(ruta)
            .then(function(response){
                const codigo_html = response.data;
                $('#modal-editar-contenido').html(codigo_html)
                $('#modal-editar').modal('show')
            })
            .catch(function(){
                if(error.response){
                    const message = error.response.data.message;
                    toastr.error(message)
                }else{
                    toastr.error(error)
                }
            });
           

        }

        function actualizar(id) {
            const ruta = route("tipo_curso.update", id)
            const formulario = document.getElementById("formulario-editar")
            const data =  new FormData(formulario)
            limpiarErrores("formulario-editar")
            axios.post(ruta, data)
            .then(function(response){
                const message = response.data.message;
                toastr.success(message);
                $('#modal-editar').modal('hide');
                search();
            })
            .catch(function(error){
                if(error.response){
                    //entidad improcesable
                    toastr.error(error.response.data.message)
                    if(error.response.status === 422){
                        mostrarErrores("formulario-editar", error.response.data.errors);
                    }
                }else{
                    toastr.error(error)
                }
            })


           
        }

        function confirmarEliminar(id) {
            Swal.fire({
                title: '¿Está seguro?',
                text: "Este cambio no se puede deshacer!",
                icon: 'error',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '<i class="far fa-trash-alt"></i> Si, eliminar!',
                cancelButtonText: '<i class="far fa-window-close"></i> Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                   //toastr.success('Eliminado correctamente')
                   const ruta = route('tipo_curso.destroy', [id]);
                   const data = new FormData();
                   data.append("_token", '{{ csrf_token() }}')
                   data.append("_method", 'DELETE')

                   axios.post(ruta, data)
                   .then(function(response){
                    const message = response.data.message;
                    toastr.success(message);
                    search();
                   })
                   .catch(function(error){
                    if(error.response){
                    toastr.error(error.response.data.message)
                }else{
                    toastr.error(error)
                }
                   })
                   //axios.delete(ruta);
                }
            })
        }
    </script>
@endsection
