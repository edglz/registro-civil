<x-default-layout>
    <link href="https://releases.transloadit.com/uppy/v3.3.1/uppy.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/@mdi/font@6.9.96/css/materialdesignicons.min.css">
    <script src="https://rawgit.com/RobinHerbots/Inputmask/5.x/dist/jquery.inputmask.js"></script>
    <style>
        .float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 40px;
            right: 40px;
            background-color: rgb(105, 145, 255);
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            box-shadow: 2px 2px 3px #999;
        }

        .my-float {
            margin-top: 22px;
        }
    </style>
    <div class="row">
        <div class="col-lg-12 px-4 py-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Lista de actas de {{ $name }} vigentes</h4>
                    <p class="card-text">Lista de las actas de {{ $name }} que se han registrado con todo el
                        historial de rectificaciones</p>
                </div>
                <div class="table-responsive mx-4">
                    <div class="table-responsive">
                        <table
                            class="table table-striped-columns
                    table-hover
                    table-borderless
                    table-primary
                    align-middle">
                            @if ($type == 'acta_matrimonio')
                                <thead>
                                    <caption>Actas de matrimonio</caption>
                                    <tr>
                                        <th>Nro.</th>
                                        <th>Nombre Hombre</th>
                                        <th>Nombre Mujer</th>
                                        <th>Fecha</th>
                                        <th>Archivos</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @foreach ($data as $k => $d)
                                        <tr>
                                            <td>{{ $d->nro }}</td>
                                            <td>{{ $d->nombre_hombre }} {{ $d->apellidop_hombre }}
                                                {{ $d->apellidom_hombre }}</td>
                                            <td>{{ $d->nombre_mujer }} {{ $d->apellidop_mujer }}
                                                {{ $d->apellidom_mujer }}</td>
                                            <td>{{ $d->fecha_registro }}</td>
                                            <td>
                                                @if ($d->archivo == '0' || $d->archivo == null)
                                                    -
                                                @else
                                                    <a name="" id="" class="btn btn-primary"
                                                        href="/storage/{{ $d->archivo }}" target="_blank"
                                                        role="button">Descargar</a>
                                                @endif
                                            </td>
                                            <td>
                                                <button type="button" onclick="DeleteRow({{ $d->id }})"
                                                    class="btn btn-danger"><i class="mdi mdi-trash-can"></i></button>
                                                <button onclick="ShowModal({{ $d->id }})" type="button"
                                                    class="btn btn-primary"><i class="mdi mdi-pen"></i></button>
                                                <button onclick="modal_archivo({{ $d->id }})" type="button"
                                                    class="btn btn-primary">Subir archivo</button>


                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            @endif
                            @if ($type == 'acta_nacimiento')
                                <thead>
                                    <caption>Actas de Nacimiento</caption>
                                    <tr>
                                        <th>Nro.</th>
                                        <th>Nombre</th>
                                        <th>Nombre Padre</th>
                                        <th>Nombre Madre</th>
                                        <th>Fecha</th>
                                        <th>Archivo</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @foreach ($data as $k => $d)
                                        <tr>
                                            <td>{{ $d->nro }}</td>
                                            <td>{{ $d->nombre }} {{ $d->apellidop }} {{ $d->apellidom }}</td>
                                            <td>{{ $d->nombre_padre }} {{ $d->apellidop_padre }}
                                                {{ $d->apellidom_padre }}</td>
                                            <td>{{ $d->nombre_madre }} {{ $d->apellidop_madre }}
                                                {{ $d->apellidom_madre }}</td>
                                            <td>{{ $d->fecha_registro }}</td>
                                            <td>
                                                @if ($d->archivo == '0' || $d->archivo == null)
                                                    -
                                                @else
                                                    <a name="" id="" class="btn btn-primary"
                                                        href="/storage/{{ $d->archivo }}" target="_blank"
                                                        role="button">Descargar</a>
                                                @endif
                                            </td>
                                            <td>
                                                <button type="button" onclick="DeleteRow({{ $d->id }})"
                                                    class="btn btn-danger">Eliminar</button>
                                                <button onclick="ShowModal({{ $d->id }})" type="button"
                                                    class="btn btn-primary">Editar</button>
                                                <button onclick="modal_archivo({{ $d->id }})" type="button"
                                                    class="btn btn-primary">Subir archivo</button>

                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            @endif
                            @if ($type == 'acta_defuncion')
                                <thead>
                                    <caption>Actas de Defunción</caption>
                                    <tr>
                                        <th>Nro.</th>
                                        <th>Nombre</th>
                                        <th>Fecha</th>
                                        <th>Archivo</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @foreach ($data as $k => $d)
                                        <tr>
                                            <td>{{ $d->nro }}</td>
                                            <td>{{ $d->nombre }} {{ $d->apellido_paterno }}
                                                {{ $d->apellido_materno }}</td>

                                            <td>{{ $d->fecha }}</td>
                                            <td>
                                                @if ($d->archivo == '0' || $d->archivo == null)
                                                    -
                                                @else
                                                    <a name="" id="" class="btn btn-primary"
                                                        href="/storage/{{ $d->archivo }}" target="_blank"
                                                        role="button">Descargar</a>
                                                @endif
                                            </td>
                                            <td>
                                                <button type="button" onclick="DeleteRow({{ $d->id }})"
                                                    class="btn btn-danger">Eliminar</button>
                                                <button onclick="ShowModal({{ $d->id }})" type="button"
                                                    class="btn btn-primary">Editar</button>
                                                <button onclick="modal_archivo({{ $d->id }})" type="button"
                                                    class="btn btn-primary">Subir archivo</button>


                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            @endif
                            @if ($type == 'rectificaciones')
                                <thead>
                                    <caption>Rectificaciones</caption>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nota</th>
                                        <th>¿Donde?</th>
                                        <th>ID Trámite</th>
                                        <th>Fecha</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @foreach ($data as $k => $d)
                                        <tr>
                                            <td>{{ $d->id }}</td>
                                            <td>{{ $d->nota }}</td>
                                            <td>{{ $d->form }}</td>
                                            <td>{{ $d->id_dato }}</td>
                                            <td>{{ $d->fecha }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($type != 'rectificaciones')
        <a href="javascript:ShowModal();" class="float">
            <i class="fa fa-plus my-float text-white"></i>
        </a>
    @endif
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="modal_acta_matrimonio" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="acta_title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="frm_crud">
                        <input type="hidden" id="id" name="id">
                        <input type="hidden" id="type" value="{{ $type }}" name="type">

                        @if ($type == 'acta_nacimiento')
                            <div align="center">
                                <h1>AGREGAR NUEVA ACTA DE NACIMIENTO</h1>
                            </div></br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Nro de Acta de Nacimiento</label>
                                        <input type="text" class="form-control" name="nro" id="nro"
                                            aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label for="">Fecha de Registro</label>
                                        <input type="date" class="form-control" name="fecha_registro"
                                            id="fecha_registro" aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Direccion</label>
                                        <input type="text" class="form-control" name="direccion" id="direccion"
                                            aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>

                                <h2 class="h2 text-center my-4 text-uppercase">Datos del neotaro</h2>
                                <div class="col-lg-6">
                                    <div class="form-group">

                                        <label for="">Apellidos Paterno</label>
                                        <input type="text" class="form-control" name="apellidop" id="apellidop"
                                            aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Apellidos Materno</label>
                                        <input type="text" class="form-control" name="apellidom" id="apellidom"
                                            aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Nombre(s) Completos</label>
                                        <input type="text" class="form-control" name="nombre" id="nombre"
                                            aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>

                                <h2 class="h2 text-center my-4 text-uppercase">DATOS DEL PADRE</h2>

                                <div class="col-lg-6">
                                    <div class="form-group">

                                        <label for="">Apellidos Paterno</label>
                                        <input type="text" class="form-control" name="apellidop_padre"
                                            id="apellidop_padre" aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Apellidos Materno</label>
                                        <input type="text" class="form-control" name="apellidom_padre"
                                            id="apellidom_padre" aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Nombre(s) Completos</label>
                                        <input type="text" class="form-control" name="nombre_padre"
                                            id="nombre_padre" aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>



                                <h2 class="h2 text-center my-4 text-uppercase">DATOS DE LA MADRE</h2>

                                <div class="col-lg-6">
                                    <div class="form-group">

                                        <label for="">Apellidos Paterno</label>
                                        <input type="text" class="form-control" name="apellidop_madre"
                                            id="apellidop_madre" aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Apellidos Materno</label>
                                        <input type="text" class="form-control" name="apellidom_madre"
                                            id="apellidom_madre" aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Nombre(s) Completos</label>
                                        <input type="text" class="form-control" name="nombre_madre"
                                            id="nombre_madre" aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>

                            </div>
                            @endif @if ($type == 'acta_matrimonio')
                                <div align="center">
                                    <h1>AGREGAR NUEVA ACTA DE MATRIMONIO</h1>
                                </div></br>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Nro de Acta Matrimonio</label>
                                            <input type="text" class="form-control" name="nro" id="nro"
                                                aria-describedby="helpId" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="">Fecha de Registro</label>
                                            <input type="date" class="form-control" name="fecha_registro"
                                                id="fecha_registro" aria-describedby="helpId" placeholder="">
                                        </div>
                                    </div>

                                    <h2 class="h2 my-4" align="center">DATOS DE LA COMPROMETIDA</h2>

                                    <div class="col-lg-6">
                                        <div class="form-group">

                                            <label for="">Apellidos Paterno</label>
                                            <input type="text" class="form-control" name="apellidop_mujer"
                                                id="apellidop_mujer" aria-describedby="helpId" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Apellidos Materno</label>
                                            <input type="text" class="form-control" name="apellidom_mujer"
                                                id="apellidom_mujer" aria-describedby="helpId" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Nombre(s) Completos</label>
                                            <input type="text" class="form-control" name="nombre_mujer"
                                                id="nombre_mujer" aria-describedby="helpId" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Direccion</label>
                                            <input type="text" class="form-control" name="dir_mujer"
                                                id="dir_mujer" aria-describedby="helpId" placeholder="">
                                        </div>
                                    </div>
                                    <h2 class="h2 my-4" align="center">DATOS DEL COMPROMETIDO</h2>

                                    <div class="col-lg-6">
                                        <div class="form-group">

                                            <label for="">Apellidos Paterno</label>
                                            <input type="text" class="form-control" name="apellidop_hombre"
                                                id="apellidop_hombre" aria-describedby="helpId" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Apellidos Materno</label>
                                            <input type="text" class="form-control" name="apellidom_hombre"
                                                id="apellidom_hombre" aria-describedby="helpId" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Nombre(s) Completos</label>
                                            <input type="text" class="form-control" name="nombre_hombre"
                                                id="nombre_hombre" aria-describedby="helpId" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Direccion</label>
                                            <input type="text" class="form-control" name="dir_hombre"
                                                id="dir_hombre" aria-describedby="helpId" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if ($type == 'acta_defuncion')
                                <div align="center">
                                    <h1>AGREGAR NUEVA ACTA DE DEFUNCIÓN</h1>
                                </div></br>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Nro de Acta de Defunción</label>
                                            <input type="text" class="form-control" name="nro" id="nro"
                                                aria-describedby="helpId" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <label for="">Fecha de Registro</label>
                                            <input type="date" class="form-control" name="fecha" id="fecha"
                                                aria-describedby="helpId" placeholder="">
                                        </div>
                                    </div>

                                    <h2 class="h2 my-4" align="center">DATOS DEL DIFUNTO</h2>

                                    <div class="col-lg-6">
                                        <div class="form-group">

                                            <label for="">Apellidos Paterno</label>
                                            <input type="text" class="form-control" name="apellido_paterno"
                                                id="apellido_paterno" aria-describedby="helpId" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Apellidos Materno</label>
                                            <input type="text" class="form-control" name="apellido_materno"
                                                id="apellido_materno" aria-describedby="helpId" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Nombre(s) Completos</label>
                                            <input type="text" class="form-control" name="nombre" id="nombre"
                                                aria-describedby="helpId" placeholder="">
                                        </div>
                                    </div>
                            @endif
                            <div class="com-cont" style="display: none;">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">Comentario de actualización (Rectificación)</label>
                                        <textarea type="text" name="rect" class="form-control" id="rect" placeholder=""></textarea>
                                    </div>
                                </div>
                            </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade back-gg" id="modal_archivo" tabindex="-1" data-bs-backdrop="static"
        data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <input type="hidden" id="id_reg">
                    <h5 class="modal-title" id="modalTitleId">Subir archivo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="grid">
                        <div class="column-full">
                            <div class="UppyBaucher"></div>
                            <div class="UppyBaucherProgress"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
    <script defer>
        function uuidv4() {
            return ([1e7] + -1e3 + -4e3 + -8e3 + -1e11).replace(/[018]/g, c =>
                (c ^ crypto.getRandomValues(new Uint8Array(1))[0] & 15 >> c / 4).toString(16)
            );
        }

        $(function() {
            $("#uuid").val(uuidv4)
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

        });
        const modal_archivo = (id) => {
            $("#id_reg").val(id)
            $("#modal_archivo").modal("show")
        }
        const ShowModal = (id = '') => {
            $("#id").val(id)
            id == '' ? $(".com-cont").fadeOut('fast') : $(".com-cont").fadeIn('fast')
            id != '' ? $.ajax({
                type: "POST",
                url: "/showDetail",
                data: {
                    id: id,
                    type: '{{ $type }}'
                },
                dataType: "json",
                success: function(response) {
                    @if ($type == 'acta_nacimiento')
                        $("#nombre_completo").val(response.nombre_completo)
                        $("#nombre_padre").val(response.nombre_padre)
                        $("#nombre_madre").val(response.nombre_madre)
                        $("#uuid").val(response.nro)
                    @endif
                    @if ($type == 'acta_defuncion')
                        $("#nombre_completo").val(response.nombre_completo)
                        $("#uuid").val(response.nro)
                    @endif
                    @if ($type == 'acta_matrimonio')
                        $("#nombre_mujer").val(response.nombre_mujer)
                        $("#nombre_hombre").val(response.nombre_hombre)
                        $("#uuid").val(response.nro)
                    @endif
                }
            }) : ''

            $("#modal_acta_matrimonio").modal('show')
        }
        $(document).ready(function() {
            $("#modal_acta_matrimonio").on('hidden.bs.modal', function() {
                @if ($type == 'acta_nacimiento')
                    $("#nombre_completo").val('')
                    $("#nombre_padre").val('')
                    $("#nombre_madre").val('')
                    $("#uuid").val('')
                @endif
                @if ($type == 'acta_defuncion')
                    $("#nombre_completo").val('')
                    $("#uuid").val('')
                @endif
                @if ($type == 'acta_matrimonio')
                    $("#nombre_mujer").val('')
                    $("#nombre_hombre").val('')
                    $("#uuid").val('')
                @endif
            })
        });
        const DeleteRow = (id) => {
            const data = {
                type: '{{ $type }}',
                id: id
            }
            $.ajax({
                type: "POST",
                url: "/deleteRow",
                data: data,
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            title: 'Correcto',
                            html: response.message,
                            icon: 'success'
                        }).then(() => {
                            window.location.reload();
                        })
                    }
                }
            });
        }
        $(function() {
            $("#frm_crud").on("submit", (e) => {
                e.preventDefault();
                console.log('a')
                const serial = $("#frm_crud")[0]
                var data = new FormData(serial);
                $.ajax({
                    type: "POST",
                    url: "/crud",
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: 'Correcto',
                                html: response.message,
                                icon: 'success'
                            }).then(() => {
                                window.location.reload();
                            })
                        }
                    }
                });
            })
        });
    </script>
    <script type="module">
        import {
        Uppy,
        XHRUpload,
        FileInput,
        StatusBar
        } from "https://releases.transloadit.com/uppy/v3.1.1/uppy.min.mjs"

        const uppyOne = new Uppy({
            debug: false,
            autoProceed: true,
            limit: 1,
            restrictions: {
            maxFileSize: 21000000,
            maxNumberOfFiles: 1,
         },
        })
        uppyOne

        .use(FileInput, {
        target: '.UppyBaucher',
        pretty: false
        })
        .use(XHRUpload, {
        method: 'POST',
        fieldName: 'file',
        endpoint: '/uploadFile',
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        })
        .use(StatusBar, {
        target: '.UppyBaucherProgress',
        hideUploadButton: true,
        hideAfterFinish: false,
        hideRetryButton: false,
        hidePauseResumeButton: true,
        hideCancelButton: true,
        })

        uppyOne.on('complete', (result) => {
            console.log(result)
            const resx = result.successful[0].response.body.message;
            $.ajax({
                type: "POST",
                url: "/updateField",
                data: {
                    url: resx,
                    id: $("#id_reg").val(),
                    type: '{{ $type }}'
                },
                dataType: "json",
                success: function (response) {
                    if(response.success){
                        Swal.fire({
                            title : 'Actualizado',
                            html : response.message,
                            icon: 'success'
                        }).then(()=>{
                            window.location.reload();
                        })
                    }
            }
            });
        })



        </script>
    <script>
        $('input[type=text]').bind('keyup blur', function() {
            var node = $(this);
            console.log(node)
            node.val(node.val().replace(/[^a-z]/g, ''));
        });
    </script>
</x-default-layout>
