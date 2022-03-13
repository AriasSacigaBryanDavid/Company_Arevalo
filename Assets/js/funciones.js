let tblUsuarios , tblCargos, tblAlmacenes, tblProveedores,tblCategorias,tblMarcas,tblUnidades,tblProductos,tblDocumentos,tblClientes, tblIdentidades,
t_h_e, t_h_v, t_h_s, tblCajas, tblArqueos, tblKardex, tblProductosVendidos, tblClientesVendidos, tblAlmacenesVendidos, tblUsuariosVendidos,tblProductosSalidos,
tblAlmacenesSalidos,tblUsuariosSalidos,tblProductosRendimientos, tblProductosEntrados,tblProveedoresEntrados,tblAlmacenesEntrados,tblUsuariosEntrados;

/** Inicio de Usuario */
document.addEventListener("DOMContentLoaded", function(){
    $('#proveedor').select2();
    $('#cliente').select2();
    tblUsuarios = $('#tblUsuarios').DataTable( {
        ajax: {
            url: base_url + "Usuarios/listar",
            dataSrc: ''
        },
        columns: [
            {'data' : 'id'},
            {'data' : 'usuario'},
            {'data' : 'nombre'},
            {'data' : 'cargo'},
            {'data' : 'almacen'},
            {'data' : 'estado'},
            {'data' : 'acciones'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-8'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>"
    } );
    /** Fin de la tabla usuarios*/
    /** Inicio de cargos */
    tblCargos = $('#tblCargos').DataTable( {
        ajax: {
            url: base_url + "Cargos/listar" ,
            dataSrc: ''
        },
        columns: [
            {'data' : 'id'},
            {'data' : 'nombre'},
            {'data' : 'estado'},
            {'data' : 'acciones'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-8'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>"
    });
     /** Fin de la tabla cargos*/
     /** Inicio de almacenes */
    tblAlmacenes = $('#tblAlmacenes').DataTable( {
        ajax: {
            url: base_url + "Almacenes/listar" ,
            dataSrc: ''
        },
        columns: [
            {'data' : 'id'},
            {'data' : 'nombre'},
            {'data' : 'direccion'},
            {'data' : 'encargado'},
            {'data' : 'telefono'},
            {'data' : 'correo'},
            {'data' : 'estado'},
            {'data' : 'acciones'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [{
                    //Botón para Excel
                    extend: 'excelHtml5',
                    footer: true,
                    title: 'Archivo',
                    filename: 'Export_File',
     
                    //Aquí es donde generas el botón personalizado
                    text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
                },
                //Botón para PDF
                {
                    extend: 'pdfHtml5',
                    download: 'open',
                    footer: true,
                    title: 'Reporte de Almacenes',
                    filename: 'Reporte de Almacenes',
                    text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para copiar
                {
                    extend: 'copyHtml5',
                    footer: true,
                    title: 'Reporte de Almacenes',
                    filename: 'Reporte de Almacenes',
                    text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para print
                {
                    extend: 'print',
                    footer: true,
                    filename: 'Export_File_print',
                    text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
                },
                //Botón para ocultar
                {
                    extend: 'colvis',
                    text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
                    postfixButtons: ['colvisRestore']
                }
            ]
    });
    /** Fin de almacenes */
    /** Inicio de proveedores */
    tblProveedores = $('#tblProveedores').DataTable( {
        ajax: {
            url: base_url + "Proveedores/listar" ,
            dataSrc: ''
        },
        columns: [
            {'data' : 'id'},
            {'data' : 'nombre'},
            {'data' : 'identidad'},
            {'data' : 'n_identidad'},
            {'data' : 'telefono'},
            {'data' : 'correo'},
            {'data' : 'direccion'},
            {'data' : 'estado'},
            {'data' : 'acciones'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [{
                    //Botón para Excel
                    extend: 'excelHtml5',
                    footer: true,
                    title: 'Archivo',
                    filename: 'Export_File',
     
                    //Aquí es donde generas el botón personalizado
                    text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
                },
                //Botón para PDF
                {
                    extend: 'pdfHtml5',
                    download: 'open',
                    footer: true,
                    title: 'Reporte de Proveedores',
                    filename: 'Reporte de Proveedores',
                    text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para copiar
                {
                    extend: 'copyHtml5',
                    footer: true,
                    title: 'Reporte de Proveedores',
                    filename: 'Reporte de Proveedores',
                    text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para print
                {
                    extend: 'print',
                    footer: true,
                    filename: 'Export_File_print',
                    text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
                },
                //Botón para ocultar
                {
                    extend: 'colvis',
                    text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
                    postfixButtons: ['colvisRestore']
                }
            ]
        
    });
     /** Fin de la tabla proveedores*/ 
     /** Inicio de categorias */
    tblCategorias = $('#tblCategorias').DataTable( {
        ajax: {
            url: base_url + "Categorias/listar" ,
            dataSrc: ''
        },
        columns: [
            {'data' : 'id'},
            {'data' : 'nombre'},
            {'data' : 'estado'},
            {'data' : 'acciones'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-8'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>"
    });
    /** Fin de categorias */
     /** Inicio de Marcas */
     tblMarcas = $('#tblMarcas').DataTable( {
        ajax: {
            url: base_url + "Marcas/listar" ,
            dataSrc: ''
        },
        columns: [
            {'data' : 'id'},
            {'data' : 'nombre'},
            {'data' : 'estado'},
            {'data' : 'acciones'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-8'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>"
    });
    /** Fin de Marcas*/
     /** Inicio de unidades */
     tblUnidades = $('#tblUnidades').DataTable( {
        ajax: {
            url: base_url + "Unidades/listar" ,
            dataSrc: ''
        },
        columns: [
            {'data' : 'id'},
            {'data' : 'nombre'},
            {'data' : 'estado'},
            {'data' : 'acciones'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-8'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>"
    });
    /** Fin de unidades*/
    /** Inicio de Productos */
    tblProductos = $('#tblProductos').DataTable( {
        ajax: {
            url: base_url + "Productos/listar",
            dataSrc: ''
        },
        columns: [
            {'data' : 'id'},
            {'data' : 'codigo'},
            {'data' : 'nombre'},
            {'data' : 'descripcion'},
            {'data' : 'marca'},
            {'data' : 'categoria'},
            {'data' : 'unidad'},
            {'data' : 'precio_compra'},
            {'data' : 'precio_venta'},
            {'data' : 'estado'},
            {'data' : 'acciones'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [{
                    //Botón para Excel
                    extend: 'excelHtml5',
                    footer: true,
                    title: 'Archivo',
                    filename: 'Export_File',
     
                    //Aquí es donde generas el botón personalizado
                    text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
                },
                //Botón para PDF
                {
                    extend: 'pdfHtml5',
                    download: 'open',
                    footer: true,
                    title: 'Reporte de Productos',
                    filename: 'Reporte de Productos',
                    text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para copiar
                {
                    extend: 'copyHtml5',
                    footer: true,
                    title: 'Reporte de Productos',
                    filename: 'Reporte de Productos',
                    text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para print
                {
                    extend: 'print',
                    footer: true,
                    filename: 'Export_File_print',
                    text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
                },
                //Botón para ocultar
                {
                    extend: 'colvis',
                    text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
                    postfixButtons: ['colvisRestore']
                }
            ]
    } );
    /** Fin de la tabla productos*/
     /** Inicio de documentos */
     tblDocumentos = $('#tblDocumentos').DataTable( {
        ajax: {
            url: base_url + "Documentos/listar" ,
            dataSrc: ''
        },
        columns: [
            {'data' : 'id'},
            {'data' : 'nombre'},
            {'data' : 'estado'},
            {'data' : 'acciones'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-8'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>"
    });
    /** Fin de documentos*/
   /** Inicio de identidades */
   tblIdentidades = $('#tblIdentidades').DataTable( {
    ajax: {
        url: base_url + "Identidades/listar" ,
        dataSrc: ''
    },
    columns: [
        {'data' : 'id'},
        {'data' : 'nombre'},
        {'data' : 'estado'},
        {'data' : 'acciones'}
    ],
    language: {
        "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
    },
    dom: "<'row'<'col-sm-4'l><'col-sm-8'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>"
    });
 /** Fin de la tabla identidades*/
    
    /** Inicio de clientes */
    tblClientes = $('#tblClientes').DataTable( {
        ajax: {
            url: base_url + "Clientes/listar" ,
            dataSrc: ''
        },
        columns: [
            {'data' : 'id'},
            {'data' : 'nombre'},
            {'data' : 'identidad'},
            {'data' : 'n_identidad'},
            {'data' : 'telefono'},
            {'data' : 'correo'},
            {'data' : 'direccion'},
            {'data' : 'estado'},
            {'data' : 'acciones'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [{
                    //Botón para Excel
                    extend: 'excelHtml5',
                    footer: true,
                    title: 'Archivo',
                    filename: 'Export_File',
     
                    //Aquí es donde generas el botón personalizado
                    text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
                },
                //Botón para PDF
                {
                    extend: 'pdfHtml5',
                    download: 'open',
                    footer: true,
                    title: 'Reporte de Clientes',
                    filename: 'Reporte de Clientes',
                    text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para copiar
                {
                    extend: 'copyHtml5',
                    footer: true,
                    title: 'Reporte de Clientes',
                    filename: 'Reporte de Clientes',
                    text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para print
                {
                    extend: 'print',
                    footer: true,
                    filename: 'Export_File_print',
                    text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
                },
                //Botón para ocultar
                {
                    extend: 'colvis',
                    text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
                    postfixButtons: ['colvisRestore']
                }
            ]
    });
     /** Fin de la tabla clientes*/ 
      /** Inicio de cajas */
      tblCajas = $('#tblCajas').DataTable( {
        ajax: {
            url: base_url + "Cajas/listar" ,
            dataSrc: ''
        },
        columns: [
            {'data' : 'id'},
            {'data' : 'nombre'},
            {'data' : 'estado'},
            {'data' : 'acciones'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-8'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>"
    });
     /** Fin de la tabla cajas*/
     /** Inicio de arqueos */
     tblArqueos = $('#tblArqueos').DataTable( {
        ajax: {
            url: base_url + "Cajas/listar_arqueo" ,
            dataSrc: ''
        },
        columns: [
            {'data' : 'id'},
            {'data' : 'usuario'},
            {'data' : 'caja'},
            {'data' : 'monto_inicial'},
            {'data' : 'monto_final'},
            {'data' : 'fecha_apertura'},
            {'data' : 'fecha_cierre'},
            {'data' : 'total_ventas'},
            {'data' : 'monto_total'},
            {'data' : 'estado'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [{
                    //Botón para Excel
                    extend: 'excelHtml5',
                    footer: true,
                    title: 'Archivo',
                    filename: 'Export_File',
     
                    //Aquí es donde generas el botón personalizado
                    text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
                },
                //Botón para PDF
                {
                    extend: 'pdfHtml5',
                    download: 'open',
                    footer: true,
                    title: 'Reporte de Almacenes',
                    filename: 'Reporte de Almacenes',
                    text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para copiar
                {
                    extend: 'copyHtml5',
                    footer: true,
                    title: 'Reporte de Almacenes',
                    filename: 'Reporte de Almacenes',
                    text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para print
                {
                    extend: 'print',
                    footer: true,
                    filename: 'Export_File_print',
                    text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
                },
                //Botón para ocultar
                {
                    extend: 'colvis',
                    text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
                    postfixButtons: ['colvisRestore']
                }
            ]
    });
    /** Fin de la tabla arqueos*/ 
     /** Inicio de historial de entradas */
    t_h_e = $('#t_historial_e').DataTable( {
        ajax: {
            url: base_url + "Entradas/listar_historial",
            dataSrc: ''
        },
        columns: [
            {'data' : 'id'},
            {'data' : 'documento'},
            {'data' : 'n_documento'},
            {'data' : 'proveedor'},
            {'data' : 'usuario'},
            {'data' : 'almacen'},
            {'data' : 'total'},
            {'data' : 'fecha'},
            {'data' : 'estado'},
            {'data' : 'acciones'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [{
                    //Botón para Excel
                    extend: 'excelHtml5',
                    footer: true,
                    title: 'Archivo',
                    filename: 'Export_File',
     
                    //Aquí es donde generas el botón personalizado
                    text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
                },
                //Botón para PDF
                {
                    extend: 'pdfHtml5',
                    download: 'open',
                    footer: true,
                    title: 'Reporte de Clientes',
                    filename: 'Reporte de Clientes',
                    text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para copiar
                {
                    extend: 'copyHtml5',
                    footer: true,
                    title: 'Reporte de Clientes',
                    filename: 'Reporte de Clientes',
                    text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para print
                {
                    extend: 'print',
                    footer: true,
                    filename: 'Export_File_print',
                    text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
                },
                //Botón para ocultar
                {
                    extend: 'colvis',
                    text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
                    postfixButtons: ['colvisRestore']
                }
            ]
    });
    /** Fin de historial de entradas */
    /** Inicio de historial de salidas */
    t_h_s = $('#t_historial_s').DataTable( {
        ajax: {
            url: base_url + "Salidas/listar_historial" ,
            dataSrc: ''
        },
        columns: [
            {'data' : 'id'},
            {'data' : 'documento'},
            {'data' : 'n_documento'},
            {'data' : 'motivo'},
            {'data' : 'usuario'},
            {'data' : 'almacen'},
            {'data' : 'total'},
            {'data' : 'fecha'},
            {'data' : 'estado'},
            {'data' : 'acciones'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [{
                    //Botón para Excel
                    extend: 'excelHtml5',
                    footer: true,
                    title: 'Archivo',
                    filename: 'Export_File',
     
                    //Aquí es donde generas el botón personalizado
                    text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
                },
                //Botón para PDF
                {
                    extend: 'pdfHtml5',
                    download: 'open',
                    footer: true,
                    title: 'Reporte de Clientes',
                    filename: 'Reporte de Clientes',
                    text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para copiar
                {
                    extend: 'copyHtml5',
                    footer: true,
                    title: 'Reporte de Clientes',
                    filename: 'Reporte de Clientes',
                    text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para print
                {
                    extend: 'print',
                    footer: true,
                    filename: 'Export_File_print',
                    text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
                },
                //Botón para ocultar
                {
                    extend: 'colvis',
                    text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
                    postfixButtons: ['colvisRestore']
                }
            ]
    });
    /** Fin de historial de salidas */
     /** Inicio de historial de ventas */
    t_h_v = $('#t_historial_v').DataTable( {
        ajax: {
            url: base_url + "Ventas/listar_historial" ,
            dataSrc: ''
        },
        columns: [
            {'data' : 'id'},
            {'data' : 'documento'},
            {'data' : 'n_documento'},
            {'data' : 'cliente'},
            {'data' : 'usuario'},
            {'data' : 'almacen'},
            {'data' : 'total'},
            {'data' : 'fecha'},
            {'data' : 'estado'},
            {'data' : 'acciones'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [{
                    //Botón para Excel
                    extend: 'excelHtml5',
                    footer: true,
                    title: 'Archivo',
                    filename: 'Export_File',
     
                    //Aquí es donde generas el botón personalizado
                    text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
                },
                //Botón para PDF
                {
                    extend: 'pdfHtml5',
                    download: 'open',
                    footer: true,
                    title: 'Reporte de Clientes',
                    filename: 'Reporte de Clientes',
                    text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para copiar
                {
                    extend: 'copyHtml5',
                    footer: true,
                    title: 'Reporte de Clientes',
                    filename: 'Reporte de Clientes',
                    text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para print
                {
                    extend: 'print',
                    footer: true,
                    filename: 'Export_File_print',
                    text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
                },
                //Botón para ocultar
                {
                    extend: 'colvis',
                    text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
                    postfixButtons: ['colvisRestore']
                }
            ]
    });
    /** Fin de historial de ventas */
    /** Inicio de kardex */
    tblKardex = $('#tblKardex').DataTable( {
        ajax: {
            url: base_url + "Reportes/listar" ,
            dataSrc: ''
        },
        columns: [
            {'data' : 'id'},
            {'data' : 'nombre'},
            {'data' : 'precio_compra'},
            {'data' : 'precio_venta'},
            {'data' : 'cantidad'},
            {'data' : 'peso_total'},
            {'data' : 'total_entrada'},
            {'data' : 'total_venta'},
            {'data' : 'total_salida'},
            {'data' : 'ganancia'},
            {'data' : 'estado'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [{
                    //Botón para Excel
                    extend: 'excelHtml5',
                    footer: true,
                    title: 'Archivo',
                    filename: 'Export_File',
     
                    //Aquí es donde generas el botón personalizado
                    text: '<span class="badge badge-success"><i class="fas fa-file-excel"></i></span>'
                },
                //Botón para PDF
                {
                    extend: 'pdfHtml5',
                    download: 'open',
                    footer: true,
                    title: 'Reporte de Clientes',
                    filename: 'Reporte de Clientes',
                    text: '<span class="badge  badge-danger"><i class="fas fa-file-pdf"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para copiar
                {
                    extend: 'copyHtml5',
                    footer: true,
                    title: 'Reporte de Clientes',
                    filename: 'Reporte de Clientes',
                    text: '<span class="badge  badge-primary"><i class="fas fa-copy"></i></span>',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                //Botón para print
                {
                    extend: 'print',
                    footer: true,
                    filename: 'Export_File_print',
                    text: '<span class="badge badge-light"><i class="fas fa-print"></i></span>'
                },
                //Botón para ocultar
                {
                    extend: 'colvis',
                    text: '<span class="badge  badge-info"><i class="fas fa-columns"></i></span>',
                    postfixButtons: ['colvisRestore']
                }
            ]
    });
     /** Fin de la tabla kardex*/ 
     /** Inicio de Total de productos vendidos */
     tblProductosVendidos = $('#tblproductovendido').DataTable( {
        ajax: {
            url: base_url + "Reportes/listarProductoVendido" ,
            dataSrc: ''
        },
        columns: [
            {'data' : 'nombre'},
            {'data' : 'total'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-8'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>"
    });
     /** Fin de Total de productos vendidos*/
     /** Inicio de Total de clientes vendidos */
     tblClientesVendidos = $('#tblclientesvendido').DataTable( {
        ajax: {
            url: base_url + "Reportes/listarClienteVendido",
            dataSrc: ''
        },
        columns: [
            {'data' : 'nombre'},
            {'data' : 'total'},
            {'data' : 'montototal'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-8'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>"
    });
     /** Fin de Total de clientes vendidos*/
     /** Inicio de Total de almacenes vendidos */
     tblAlmacenesVendidos = $('#tblalmacenesvendido').DataTable( {
        ajax: {
            url: base_url + "Reportes/listarAlmacenVendido",
            dataSrc: ''
        },
        columns: [
            {'data' : 'nombre'},
            {'data' : 'total'},
            {'data' : 'montototal'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-8'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>"
    });
     /** Fin de Total de almacenes vendidos*/
     /** Inicio de Total de usuarios vendidos */
     tblUsuariosVendidos = $('#tblusuariosvendido').DataTable( {
        ajax: {
            url: base_url + "Reportes/listarUsuarioVendido",
            dataSrc: ''
        },
        columns: [
            {'data' : 'nombre'},
            {'data' : 'total'},
            {'data' : 'montototal'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-8'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>"
    });
     /** Fin de Total de usuarios vendidos*/
    /** Inicio de Total de productos salidos */
      tblProductosSalidos = $('#tblproductosalido').DataTable( {
        ajax: {
            url: base_url + "Reportes/listarProductoSalido" ,
            dataSrc: ''
        },
        columns: [
            {'data' : 'nombre'},
            {'data' : 'total'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-8'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>"
    });
    /** Fin de Total de productos salidos*/
    /** Inicio de Total de almacenes salidos */
    tblAlmacenesSalidos = $('#tblalmacenessalido').DataTable( {
        ajax: {
            url: base_url + "Reportes/listarAlmacenSalido" ,
            dataSrc: ''
        },
        columns: [
            {'data' : 'nombre'},
            {'data' : 'total'},
            {'data' : 'montototal'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-8'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>"
    });
    /** Fin de Total de almacenes salidos*/
    /** Inicio de Total de usuarios salidos */
    tblUsuariosSalidos = $('#tblusuariossalido').DataTable( {
        ajax: {
            url: base_url + "Reportes/listarUsuarioSalido",
            dataSrc: ''
        },
        columns: [
            {'data' : 'nombre'},
            {'data' : 'total'},
            {'data' : 'montototal'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-8'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>"
    });
     /** Fin de Total de usuarios salidos*/
      /** Inicio de Promedio de rendimiento de productos */
    tblProductosRendimientos = $('#tblproductorendimiento').DataTable( {
        ajax: {
            url: base_url + "Reportes/listarProductoRendimiento",
            dataSrc: ''
        },
        columns: [
            {'data' : 'nombre'},
            {'data' : 'rendimiento'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-8'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>"
    });
     /** Fin de Promedio de rendimiento de productos*/
     /** Inicio de Total de productos entradas */
     tblProductosEntrados = $('#tblproductoentrado').DataTable( {
        ajax: {
            url: base_url + "Reportes/listarProductoEntrado" ,
            dataSrc: ''
        },
        columns: [
            {'data' : 'nombre'},
            {'data' : 'total'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-8'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>"
    });
    /** Fin de Total de productos entradas*/
     /** Inicio de Total de proveedores entradas */
     tblProveedoresEntrados = $('#tblproveedorentrado').DataTable( {
        ajax: {
            url: base_url + "Reportes/listarProveedorEntrado",
            dataSrc: ''
        },
        columns: [
            {'data' : 'nombre'},
            {'data' : 'total'},
            {'data' : 'montototal'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-8'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>"
    });
     /** Fin de Total de proveedores entradas*/
     /** Inicio de Total de almacenes entradas */
    tblAlmacenesEntrados = $('#tblalmacenesentrado').DataTable( {
        ajax: {
            url: base_url + "Reportes/listarAlmacenEntrado" ,
            dataSrc: ''
        },
        columns: [
            {'data' : 'nombre'},
            {'data' : 'total'},
            {'data' : 'montototal'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-8'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>"
    });
    /** Fin de Total de almacenes entradas*/
    /** Inicio de Total de usuarios entradas */
    tblUsuariosEntrados = $('#tblusuariosentrado').DataTable( {
        ajax: {
            url: base_url + "Reportes/listarUsuarioEntrado",
            dataSrc: ''
        },
        columns: [
            {'data' : 'nombre'},
            {'data' : 'total'},
            {'data' : 'montototal'}
        ],
        language: {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        dom: "<'row'<'col-sm-4'l><'col-sm-8'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>>"
    });
     /** Fin de Total de usuarios entradas*/
})
/** Inicio de Actualizar contraseña */
function frmCambiarPass(e) {
    e.preventDefault();
    const actual = document.getElementById('contrasena_actual').value;
    const nueva = document.getElementById('contrasena_nueva').value;
    const confirmar = document.getElementById('confirmar_contrasena').value;
    if(actual ==""|| nueva ==""|| confirmar==""){
        alertas('Todo los campos son obligatorios', 'warning');
        return false;
    }else{
        if (nueva != confirmar ) {
            alertas('Las contraseñas no coinciden', 'warning');
            return false;
        }else{
            const url =base_url + "Usuarios/cambiarPass";
            const frm =document.getElementById("frmCambiarPass");
            const http=new XMLHttpRequest();
            http.open("POST", url, true);
            http.send( new FormData(frm));
            http.onreadystatechange=function(){
                if(this.readyState == 4 && this.status ==200){
                const res = JSON.parse(this.responseText);
                if (res.msg == 'Contraseña modificada con éxito') {
                    alertas(res.msg, res.icono);
                    document.getElementById("frmCambiarPass").reset();
                    $("#cambiarPass").modal("hide");
                }else if(res.msg == 'Las contraseña actual es incorrecta'){
                    alertas(res.msg, res.icono);
                }else{
                    alertas(res.msg, res.icono);
                }
                
                
                }
            }
        }
    }
}

/** Fin de Actualizar contraseña */
/** Inicio de Usuario */
function frmUsuario(){
    document.getElementById("title").innerHTML = "Registrar usuario";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("contrasenas").classList.remove("d-none");
    document.getElementById("frmUsuario").reset();
    $("#nuevo_usuario").modal("show");
    document.getElementById("id").value ="";
}
function registrarUser(e){
    e.preventDefault();
    const usuario=document.getElementById("usuario");
    const nombre=document.getElementById("nombre");
    const contrasena=document.getElementById("contrasena");
    const confirmar=document.getElementById("confirmar");
    const cargo=document.getElementById("cargo");
    const almacen=document.getElementById("almacen");
    if(usuario.value == "" || nombre.value== "" || cargo.value== "" || almacen.value=="") {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Porfavor ingrese los datos, es obligatorio',
            showConfirmButton: false,
            timer: 3000
          })
    }else{
        const url =base_url + "Usuarios/registrar";
        const frm =document.getElementById("frmUsuario");
        const http=new XMLHttpRequest();
        http.open("POST", url, true);
        http.send( new FormData(frm));
        http.onreadystatechange=function(){
            if(this.readyState == 4 && this.status ==200){
               const res = JSON.parse(this.responseText);
               if(res == "si"){
                  Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Usuario Registrado con éxito',
                    showConfirmButton: false,
                    timer: 3000
                    })
                  frm.reset();
                  $("#nuevo_usuario").modal("hide");
                  tblUsuarios.ajax.reload();
               }else if(res == "modificado"){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Usuario modificado con éxito',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    $("#nuevo_usuario").modal("hide");
                    tblUsuarios.ajax.reload();
               }else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                     timer: 3000
                    })
               }
                   
                
            
            }
        }
    }
}
function btnEditarUser(id){
    document.getElementById("title").innerHTML = "Actualizar usuario";
    document.getElementById("btnAccion").innerHTML = "Actualizar";
    const url =base_url + "Usuarios/editar/"+id;
        const http=new XMLHttpRequest();
        http.open("GET", url, true);
        http.send();
        http.onreadystatechange=function(){
            if(this.readyState == 4 && this.status ==200){
               const res = JSON.parse(this.responseText);
               document.getElementById("id").value = res.id;
               document.getElementById("usuario").value = res.usuario;
               document.getElementById("nombre").value = res.nombre;
               document.getElementById("cargo").value = res.id_cargo;
               document.getElementById("almacen").value = res.id_almacen;
               document.getElementById("contrasenas").classList.add("d-none");
               $("#nuevo_usuario").modal("show");

            }
        }
    
}
function btnEliminarUser(id){
    Swal.fire({
        title: '¿Deseas Eliminar Usuario?',
        text: "¡El usuario no se eliminara de forma permanente!,  solo cambiará el estado a inactivo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url =base_url + "Usuarios/eliminar/"+id;
            const http=new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange=function(){
                if(this.readyState == 4 && this.status ==200){
                    const res = JSON.parse(this.responseText);
                    if (res == "ok" ){
                        Swal.fire(
                            'Mensaje!',
                            'Usuario eliminado con éxito.',
                            'success'
                        )
                        tblUsuarios.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
            
        }
      })
}
function btnReingresarUser(id){
    Swal.fire({
        title: '¿Está seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url =base_url + "Usuarios/reingresar/"+id;
            const http=new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange=function(){
                if(this.readyState == 4 && this.status ==200){
                    const res = JSON.parse(this.responseText);
                    if (res == "ok" ){
                        Swal.fire(
                            'Mensaje!',
                            'Usuario reingresado con éxito.',
                            'success'
                        )
                        tblUsuarios.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
            
        }
      })
}
/** Fin de Usuario */
/*******************************/
/** inicio de cargo */
function frmCargo(){
    document.getElementById("title").innerHTML ="Agregar Cargo";
    document.getElementById("btnAccion").innerHTML ="Agregar";
    document.getElementById("frmCargo").reset();
    $("#nuevo_cargo").modal("show");
    document.getElementById("id").value ="";
}
function registrarCar(e){
    e.preventDefault();
    const nombre = document.getElementById("nombre");
    if( nombre.value=="" ){
        alertas('Todo los campos son obligatorios', 'warning');
    }else{
        const url = base_url +"Cargos/registrar";
        const frm = document.getElementById("frmCargo");
        const http = new XMLHttpRequest();
        http.open("POST",url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res= JSON.parse(this.responseText);
                $("#nuevo_cargo").modal("hide");
                alertas(res.msg, res.icono);
                tblCargos.ajax.reload();
            }    
        }
    }
}
function btnEditarCar(id){
    document.getElementById("title").innerHTML ="Actualizar Cargo";
    document.getElementById("btnAccion").innerHTML ="Actualizar";
    const url = base_url +"Cargos/editar/"+id;
    const http = new XMLHttpRequest();
    http.open("GET",url, true);
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText); 
            document.getElementById("id").value =res.id;
            document.getElementById("nombre").value=res.nombre; 
            $("#nuevo_cargo").modal("show");  
        }

    }
}
function btnEliminarCar(id){
    Swal.fire({
        title: '¿Deseas Eliminar Cargo?',
        text: "¡El cargo no se eliminara de forma permanente!,  solo cambiará el estado a inactivo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url +"Cargos/eliminar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res=JSON.parse(this.responseText);
                  alertas(res.msg, res.icono);
                  tblCargos.ajax.reload();  
                }
            }
        }
    })
}
function btnReingresarCar(id){
    Swal.fire({
        title: '¿Está seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url +"Cargos/reingresar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res= JSON.parse(this.responseText);
                  tblCargos.ajax.reload();
                  alertas(res.msg, res.icono);   
                }
            }
        }
      })
}
/** Fin de cargos */
/*******************************/
/*******************************/
/** inicio de identidad */
function frmIdentidad(){
    document.getElementById("title").innerHTML ="Agregar Identidad";
    document.getElementById("btnAccion").innerHTML ="Agregar";
    document.getElementById("frmIdentidad").reset();
    $("#nuevo_identidad").modal("show");
    document.getElementById("id").value ="";
}
function registrarIden(e){
    e.preventDefault();
    const nombre = document.getElementById("nombre");
    if( nombre.value=="" ){
        alertas('Todo los campos son obligatorios', 'warning');
    }else{
        const url = base_url +"Identidades/registrar";
        const frm = document.getElementById("frmIdentidad");
        const http = new XMLHttpRequest();
        http.open("POST",url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res= JSON.parse(this.responseText);
                $("#nuevo_identidad").modal("hide");
                alertas(res.msg, res.icono);
                tblIdentidades.ajax.reload();
            }    
        }
    }
}
function btnEditarIden(id){
    document.getElementById("title").innerHTML ="Actualizar Identidad";
    document.getElementById("btnAccion").innerHTML ="Actualizar";
    const url = base_url +"Identidades/editar/"+id;
    const http = new XMLHttpRequest();
    http.open("GET",url, true);
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText); 
            document.getElementById("id").value =res.id;
            document.getElementById("nombre").value=res.nombre; 
            $("#nuevo_identidad").modal("show");  
        }
    }
}
function btnEliminarIden(id){
    Swal.fire({
        title: '¿Deseas Eliminar la Identidad?',
        text: "¡La Identidad no se eliminara de forma permanente!,  solo cambiará el estado a inactivo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url +"Identidades/eliminar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res=JSON.parse(this.responseText);
                  alertas(res.msg, res.icono);
                  tblIdentidades.ajax.reload();
               }
            }

        } 
    })
}
function btnReingresarIden(id){
    Swal.fire({
        title: '¿Está seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url +"Identidades/reingresar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res= JSON.parse(this.responseText);
                  tblIdentidades.ajax.reload();
                  alertas(res.msg, res.icono);   
                }
            }
        }
    })
}
/** Fin de identidad */
/*******************************/
/** inicio de almacenes */
function frmAlmacen(){
    document.getElementById("title").innerHTML ="Agregar Almacén";
    document.getElementById("btnAccion").innerHTML ="Agregar";
    document.getElementById("frmAlmacen").reset();
    $("#nuevo_almacen").modal("show");
    document.getElementById("id").value ="";
}
function registrarAlm(e){
    e.preventDefault();
    const nombre = document.getElementById("nombre");
    const direccion = document.getElementById("direccion");
    const encargado = document.getElementById("encargado");
    const telefono = document.getElementById("telefono");
    const correo = document.getElementById("correo");
    if( nombre.value=="" || direccion.value=="" || encargado.value=="" || telefono.value=="" || correo.value==""){
        alertas('Todo los campos son obligatorios', 'warning');
    }else{
        const url = base_url +"Almacenes/registrar";
        const frm = document.getElementById("frmAlmacen");
        const http = new XMLHttpRequest();
        http.open("POST",url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res= JSON.parse(this.responseText);
                $("#nuevo_almacen").modal("hide");
                alertas(res.msg, res.icono);
                tblAlmacenes.ajax.reload();
            }  
        }
    }
}
function btnEditarAlm(id){
    document.getElementById("title").innerHTML ="Actualizar Almacén";
    document.getElementById("btnAccion").innerHTML="Actualizar";
    const url = base_url +"Almacenes/editar/"+id;
    const http = new XMLHttpRequest();
    http.open("GET",url, true);
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
          const res = JSON.parse(this.responseText); 
          document.getElementById("id").value =res.id;
            document.getElementById("nombre").value=res.nombre;
            document.getElementById("direccion").value=res.direccion;
            document.getElementById("encargado").value=res.encargado;
            document.getElementById("telefono").value=res.telefono;
            document.getElementById("correo").value=res.correo;
            $("#nuevo_almacen").modal("show");  
        }
    }   
}
function btnEliminarAlm(id){
    Swal.fire({
        title: '¿Deseas Eliminar Almacén?',
        text: "¡El almacén no se eliminara de forma permanente!,  solo cambiará el estado a inactivo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url +"Almacenes/eliminar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res= JSON.parse(this.responseText);
                  alertas(res.msg, res.icono);
                  tblAlmacenes.ajax.reload();
                }
            }
        }
    })
}
function btnReingresarAlm(id){
    Swal.fire({
        title: '¿Está seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url +"Almacenes/reingresar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res= JSON.parse(this.responseText);
                  tblAlmacenes.ajax.reload();
                  alertas(res.msg, res.icono);   
                }
            }
        }
    })
}
/** Fin de almacenes */
/*******************************/
/** inicio de Proveedor */
function frmProveedor(){
    document.getElementById("title").innerHTML ="Registrar Proveedor";
    document.getElementById("btnAccion").innerHTML ="Registrar";
    document.getElementById("frmProveedor").reset();
    $("#nuevo_proveedor").modal("show");
    document.getElementById("id").value ="";
}
function registrarPro(e){
    e.preventDefault();
    const nombre = document.getElementById("nombre");
    const identidad = document.getElementById("identidad");
    const n_identidad = document.getElementById("n_identidad");
    const telefono = document.getElementById("telefono");
    const correo = document.getElementById("correo");
    const direccion = document.getElementById("direccion");
    if(nombre.value=="" || identidad.value=="" || n_identidad.value=="" || telefono.value==""||correo.value=="" ||direccion.value==""){
        alertas('Todo los campos son obligatorios', 'warning');
    }else{
        const url = base_url +"Proveedores/registrar";
        const frm = document.getElementById("frmProveedor");
        const http = new XMLHttpRequest();
        http.open("POST",url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res = JSON.parse(this.responseText);
                $("#nuevo_proveedor").modal("hide");
                alertas(res.msg, res.icono);
                tblProveedores.ajax.reload();
            }
        }
    }
}
function btnEditarPro(id){
    document.getElementById("title").innerHTML ="Actualizar Proveedor";
    document.getElementById("btnAccion").innerHTML="Actualizar";
    const url = base_url +"Proveedores/editar/"+id;
    const http = new XMLHttpRequest();
    http.open("GET",url, true);
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
          const res = JSON.parse(this.responseText); 
            document.getElementById("id").value =res.id;
            document.getElementById("nombre").value=res.nombre;
            document.getElementById("identidad").value =res.id_identidad;
            document.getElementById("n_identidad").value = res.n_identidad;
            document.getElementById("telefono").value=res.telefono;
            document.getElementById("correo").value = res.correo;
            document.getElementById("direccion").value=res.direccion;  
            $("#nuevo_proveedor").modal("show");  
        }

    }

    
}
function btnEliminarPro(id){
    Swal.fire({
        title: '¿Deseas Eliminar proveedor?',
        text: "¡El proveedor no se eliminara de forma permanente!,  solo cambiará el estado a inactivo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url +"Proveedores/eliminar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res= JSON.parse(this.responseText);
                  alertas(res.msg, res.icono);
                  tblProveedores.ajax.reload();
                }
            }
        }
      })
}
function btnReingresarPro(id){
    Swal.fire({
        title: '¿Está seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url +"Proveedores/reingresar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res= JSON.parse(this.responseText);
                  tblProveedores.ajax.reload();
                  alertas(res.msg, res.icono);
                }
            }
        }
    })
}
/** Fin de proveedores */
/*******************************/
/** inicio de cliente */
function frmCliente(){
    document.getElementById("title").innerHTML ="Registrar Cliente";
    document.getElementById("btnAccion").innerHTML ="Registrar";
    document.getElementById("frmCliente").reset();
    $("#nuevo_cliente").modal("show");
    document.getElementById("id").value ="";
}
function registrarCli(e){
    e.preventDefault();
    const nombre = document.getElementById("nombre");
    const identidad =document.getElementById("identidad");
    const n_identidad = document.getElementById("n_identidad");
    const telefono = document.getElementById("telefono");
    const correo = document.getElementById("correo");
    const direccion = document.getElementById("direccion");
    if(nombre.value=="" || identidad.value=="" || n_identidad.value=="" || telefono.value==""|| correo.value=="" || direccion.value==""){
        alertas('Todo los campos son obligatorios', 'warning');
    }else{
        const url = base_url +"Clientes/registrar";
        const frm = document.getElementById("frmCliente");
        const http = new XMLHttpRequest();
        http.open("POST",url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res = JSON.parse(this.responseText);
                $("#nuevo_cliente").modal("hide");
                alertas(res.msg, res.icono);
                tblClientes.ajax.reload();
            }
        }
    }
}
function btnEditarCli(id){
    document.getElementById("title").innerHTML ="Actualizar Cliente";
    document.getElementById("btnAccion").innerHTML="Actualizar";
    const url = base_url +"Clientes/editar/"+id;
    const http = new XMLHttpRequest();
    http.open("GET",url, true);
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
          const res = JSON.parse(this.responseText); 
            document.getElementById("id").value =res.id;
            document.getElementById("nombre").value=res.nombre;
            document.getElementById("identidad").value=res.id_identidad;
            document.getElementById("n_identidad").value= res.n_identidad;
            document.getElementById("telefono").value=res.telefono;
            document.getElementById("correo").value=res.correo;
            document.getElementById("direccion").value=res.direccion;  
            $("#nuevo_cliente").modal("show");  
        }

    }

    
}
function btnEliminarCli(id){
    Swal.fire({
        title: '¿Deseas Eliminar Cliente?',
        text: "¡El cliente no se eliminara de forma permanente!,  solo cambiará el estado a inactivo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url +"Clientes/eliminar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res= JSON.parse(this.responseText);
                  alertas(res.msg, res.icono);
                  tblClientes.ajax.reload();
                }
            }
        }
    })
}
function btnReingresarCli(id){
    Swal.fire({
        title: '¿Está seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url +"Clientes/reingresar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res= JSON.parse(this.responseText);
                  tblClientes.ajax.reload();
                  alertas(res.msg, res.icono);   
                }
            }
        }
    })
}
/** Fin de cliente */
/*******************************/
/** inicio de categorias */
function frmCategoria(){
    document.getElementById("title").innerHTML ="Agregar Categoria";
    document.getElementById("btnAccion").innerHTML ="Agregar";
    document.getElementById("frmCategoria").reset();
    $("#nuevo_categoria").modal("show");
    document.getElementById("id").value ="";
}
function registrarCateg(e){
    e.preventDefault();
    const nombre = document.getElementById("nombre");
    if( nombre.value=="" ){
        alertas('Todo los campos son obligatorios', 'warning' );
    }else{
        const url = base_url +"Categorias/registrar";
        const frm = document.getElementById("frmCategoria");
        const http = new XMLHttpRequest();
        http.open("POST",url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res= JSON.parse(this.responseText);
                $("#nuevo_categoria").modal("hide");
                alertas(res.msg, res.icono);
                tblCategorias.ajax.reload();    
            }    
        }
    }
}
function btnEditarCateg(id){
    document.getElementById("title").innerHTML ="Actualizar Categoria";
    document.getElementById("btnAccion").innerHTML ="Actualizar";
    const url = base_url +"Categorias/editar/"+id;
    const http = new XMLHttpRequest();
    http.open("GET",url, true);
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText); 
            document.getElementById("id").value =res.id;
            document.getElementById("nombre").value=res.nombre; 
            $("#nuevo_categoria").modal("show");  
        }

    }
}
function btnEliminarCateg(id){
    Swal.fire({
        title: '¿Deseas Eliminar Categoria?',
        text: "¡La categoria no se eliminara de forma permanente!,  solo cambiará el estado a inactivo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url +"Categorias/eliminar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res=JSON.parse(this.responseText);
                  alertas(res.msg, res.icono);
                  tblCategorias.ajax.reload();
                }
            }
        }
        
    })
}
function btnReingresarCateg(id){
    Swal.fire({
        title: '¿Está seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url +"Categorias/reingresar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res= JSON.parse(this.responseText);
                  tblCategorias.ajax.reload();
                  alertas(res.msg, res.icono);   
                }
            }
        }
    })
}
/** Fin de categorias */
/*******************************/
/** inicio de marcas */
function frmMarca(){
    document.getElementById("title").innerHTML ="Agregar Marca";
    document.getElementById("btnAccion").innerHTML ="Agregar";
    document.getElementById("frmMarca").reset();
    $("#nuevo_marca").modal("show");
    document.getElementById("id").value ="";
}
function registrarMar(e){
    e.preventDefault();
    const nombre = document.getElementById("nombre");
    if( nombre.value=="" ){
        alertas('Todo los campos son obligatorios', 'warning' );
    }else{
        const url = base_url +"Marcas/registrar";
        const frm = document.getElementById("frmMarca");
        const http = new XMLHttpRequest();
        http.open("POST",url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res= JSON.parse(this.responseText);
                $("#nuevo_marca").modal("hide");
                alertas(res.msg, res.icono);
                tblMarcas.ajax.reload();
            }
        }
    }
}
function btnEditarMar(id){
    document.getElementById("title").innerHTML ="Actualizar Marca";
    document.getElementById("btnAccion").innerHTML ="Actualizar";
    const url = base_url +"Marcas/editar/"+id;
    const http = new XMLHttpRequest();
    http.open("GET",url, true);
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText); 
            document.getElementById("id").value =res.id;
            document.getElementById("nombre").value=res.nombre; 
            $("#nuevo_marca").modal("show");  
        }

    }
}
function btnEliminarMar(id){
    Swal.fire({
        title: '¿Deseas Eliminar marca?',
        text: "¡La categoria no se eliminara de forma permanente!,  solo cambiará el estado a inactivo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url +"Marcas/eliminar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res=JSON.parse(this.responseText);
                  alertas(res.msg, res.icono);
                  tblMarcas.ajax.reload();
                }
            }
        }
    })
}
function btnReingresarMar(id){
    Swal.fire({
        title: '¿Está seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url +"Marcas/reingresar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res= JSON.parse(this.responseText);
                  tblMarcas.ajax.reload();
                  alertas(res.msg, res.icono);    
                }
            }
        }
      })
}
/** Fin de marcas */
/*******************************/
/** inicio de unidades */
function frmUnidad(){
    document.getElementById("title").innerHTML ="Agregar Unidad";
    document.getElementById("btnAccion").innerHTML ="Agregar";
    document.getElementById("frmUnidad").reset();
    $("#nuevo_unidad").modal("show");
    document.getElementById("id").value ="";
}
function registrarUni(e){
    e.preventDefault();
    const nombre = document.getElementById("nombre");
    if( nombre.value=="" ){
        alertas('Todo los campos son obligatorios', 'warning');
    }else{
        const url = base_url +"Unidades/registrar";
        const frm = document.getElementById("frmUnidad");
        const http = new XMLHttpRequest();
        http.open("POST",url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res= JSON.parse(this.responseText);
                $("#nuevo_unidad").modal("hide");
                alertas(res.msg, res.icono);
                tblUnidades.ajax.reload();  
            }
        }
    }
}
function btnEditarUni(id){
    document.getElementById("title").innerHTML ="Actualizar Unidad";
    document.getElementById("btnAccion").innerHTML ="Actualizar";
    const url = base_url +"Unidades/editar/"+id;
    const http = new XMLHttpRequest();
    http.open("GET",url, true);
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText); 
            document.getElementById("id").value =res.id;
            document.getElementById("nombre").value=res.nombre; 
            $("#nuevo_unidad").modal("show");  
        }
    }
}
function btnEliminarUni(id){
    Swal.fire({
        title: '¿Deseas Eliminar unidad?',
        text: "¡La categoria no se eliminara de forma permanente!,  solo cambiará el estado a inactivo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url +"Unidades/eliminar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res=JSON.parse(this.responseText);
                  alertas(res.msg, res.icono);
                  tblUnidades.ajax.reload();
               }
            } 
        }
    })
}
function btnReingresarUni(id){
    Swal.fire({
        title: '¿Está seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url +"Unidades/reingresar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res= JSON.parse(this.responseText);
                  tblUnidades.ajax.reload();
                  alertas(res.msg, res.icono);   
                }
            }
        }
    })
}
/** Fin de unidades */
/*******************************/
/** Inicio de productos */
function frmProducto(){
    document.getElementById("title").innerHTML = "Registrar Producto";
    document.getElementById("btnAccion").innerHTML = "Registrar";
    document.getElementById("frmProducto").reset();
    $("#nuevo_producto").modal("show");
    document.getElementById("id").value ="";
}
function registrarProd(e){
    e.preventDefault();
    const codigo=document.getElementById("codigo");
    const nombre=document.getElementById("nombre");
    const descripcion=document.getElementById("descripcion");
    const marca=document.getElementById("marca");
    const categoria=document.getElementById("categoria");
    const unidad=document.getElementById("unidad");
    const precio_compra=document.getElementById("precio_compra");
    const precio_venta=document.getElementById("precio_venta");
    if(codigo.value=="" ||nombre.value == "" || descripcion.value== "" || marca.value== "" || categoria.value=="" || unidad.value=="" || precio_compra.value=="" || precio_venta.value=="") {
        alertas('Todo los campos son obligatorios', 'warning');
    }else{
        const url =base_url + "Productos/registrar";
        const frm =document.getElementById("frmProducto");
        const http=new XMLHttpRequest();
        http.open("POST", url, true);
        http.send( new FormData(frm));
        http.onreadystatechange=function(){
            if(this.readyState == 4 && this.status ==200){
               const res = JSON.parse(this.responseText);
               $("#nuevo_producto").modal("hide");
               alertas(res.msg, res.icono);
               tblProductos.ajax.reload();
            }
        }
    }
}
function btnEditarProd(id){
    document.getElementById("title").innerHTML = "Actualizar producto";
    document.getElementById("btnAccion").innerHTML = "Actualizar";
    const url =base_url + "Productos/editar/"+id;
        const http=new XMLHttpRequest();
        http.open("GET", url, true);
        http.send();
        http.onreadystatechange=function(){
            if(this.readyState == 4 && this.status ==200){
               const res = JSON.parse(this.responseText);
               document.getElementById("id").value = res.id;
               document.getElementById("codigo").value = res.codigo;
               document.getElementById("nombre").value = res.nombre;
               document.getElementById("descripcion").value = res.descripcion;
               document.getElementById("marca").value = res.id_marca;
               document.getElementById("categoria").value = res.id_categoria;
               document.getElementById("unidad").value = res.id_unidad;
               document.getElementById("precio_compra").value = res.precio_compra;
               document.getElementById("precio_venta").value = res.precio_venta;
               $("#nuevo_producto").modal("show");

            }
        }
    
}
function btnEliminarProd(id){
    Swal.fire({
        title: '¿Deseas Eliminar Producto?',
        text: "¡El Producto no se eliminara de forma permanente!,  solo cambiará el estado a inactivo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url =base_url + "Productos/eliminar/"+id;
            const http=new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange=function(){
                if(this.readyState == 4 && this.status ==200){
                    const res = JSON.parse(this.responseText);
                    alertas(res.msg, res.icono);
                    tblProductos.ajax.reload();
                }
            } 
        }
    })
}
function btnReingresarProd(id){
    Swal.fire({
        title: '¿Está seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const url =base_url + "Productos/reingresar/"+id;
            const http=new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange=function(){
                if(this.readyState == 4 && this.status ==200){
                    const res = JSON.parse(this.responseText);
                    tblProductos.ajax.reload();
                    alertas(res.msg, res.icono);   
                }
            }
        }
    })
}
/** Fin de Usuario */
/*******************************/
/** inicio de documento */
function frmDocumento(){
    document.getElementById("title").innerHTML ="Agregar Documento";
    document.getElementById("btnAccion").innerHTML ="Agregar";
    document.getElementById("frmDocumento").reset();
    $("#nuevo_documento").modal("show");
    document.getElementById("id").value ="";
}
function registrarDoc(e){
    e.preventDefault();
    const nombre = document.getElementById("nombre");
    if( nombre.value=="" ){
        alertas('Todo los campos son obligatorios', 'warning');
    }else{
        const url = base_url +"Documentos/registrar";
        const frm = document.getElementById("frmDocumento");
        const http = new XMLHttpRequest();
        http.open("POST",url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res= JSON.parse(this.responseText);
                $("#nuevo_documento ").modal("hide");
                alertas(res.msg, res.icono);
                tblDocumentos.ajax.reload();
            }     
        }
    }
}
function btnEditarDoc(id){
    document.getElementById("title").innerHTML ="Actualizar Documento";
    document.getElementById("btnAccion").innerHTML ="Actualizar";
    const url = base_url +"Documentos/editar/"+id;
    const http = new XMLHttpRequest();
    http.open("GET",url, true);
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText); 
            document.getElementById("id").value =res.id;
            document.getElementById("nombre").value=res.nombre; 
            $("#nuevo_documento").modal("show");  
        }

    }
}
function btnEliminarDoc(id){
    Swal.fire({
        title: '¿Deseas Eliminar documento?',
        text: "¡El documento no se eliminara de forma permanente!,  solo cambiará el estado a inactivo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url +"Documentos/eliminar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res=JSON.parse(this.responseText);
                  alertas(res.msg, res.icono);
                  tblDocumentos.ajax.reload();
               }
            }
        }
    })
}
function btnReingresarDoc(id){
    Swal.fire({
        title: '¿Está seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url +"Documentos/reingresar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res= JSON.parse(this.responseText);
                  tblDocumentos.ajax.reload();
                  alertas(res.msg, res.icono);   
                }
            }
        }
    })
}
/** Fin de documento */
/*******************************/
/*******************************/
/** Inicio de entradas */
function buscarCodigoEn(e) {
    e.preventDefault();
    const cod = document.getElementById("codigo").value;
    if(cod != '') {
        if(e.which == 13){
            const url =base_url + "Entradas/buscarCodigoEn/"+ cod;
            const http=new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange=function(){
                    if(this.readyState == 4 && this.status ==200){
                        const res =JSON.parse(this.responseText);
                        if(res){
                            document.getElementById("producto").value = res.nombre;
                            document.getElementById("precio").value = res.precio_compra;
                            document.getElementById("id").value = res.id;
                            document.getElementById("rendimiento").removeAttribute('disabled');
                            document.getElementById("rendimiento").focus();
                            document.getElementById("peso_bruto").removeAttribute('disabled');
                            document.getElementById("cantidad").removeAttribute('disabled');
                        }else{
                            alertas('El producto no éxiste', 'warning');
                            document.getElementById("codigo").value='';
                            document.getElementById("codigo").focus();
                        }
            
                    }
            }
        }
    }else{
        alertas('Ingrese el Código de Barras ', 'warning');
    }

   
}
function calcularPrecioEn(e){
    e.preventDefault();
    const cant = document.getElementById("cantidad").value;
    const p_bruto = document.getElementById("peso_bruto").value;
    const precio = document.getElementById("precio").value;
    document.getElementById("kilos_tara").value= cant * 0.2;
    document.getElementById("peso_neto").value= p_bruto - (cant * 0.2);
    document.getElementById("sub_total").value= precio * (p_bruto - (cant * 0.2));
    if (e.which == 13) {
        if(cant > 0){
            const url =base_url + "Entradas/ingresar";
            const frm =document.getElementById("frmProductoEntrada");
            const http=new XMLHttpRequest();
            http.open("POST", url, true);
            http.send(new FormData (frm));
            http.onreadystatechange=function(){
                if(this.readyState == 4 && this.status ==200){
                    const res = JSON.parse(this.responseText);
                    alertas(res.msg, res.icono);
                    frm.reset();
                    cargaDetalleEn();
                    document.getElementById("rendimiento").setAttribute('disabled', 'disabled');
                    document.getElementById("peso_bruto").setAttribute('disabled', 'disabled');
                    document.getElementById("cantidad").setAttribute('disabled', 'disabled');
                    document.getElementById("codigo").focus();
                }
            }
        }
    }  
}
if(document.getElementById('tblDetalleEN')){
    cargaDetalleEn();
}
function cargaDetalleEn(){
    const url =base_url + "Entradas/listar";
    const http=new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange=function(){
        if(this.readyState == 4 && this.status ==200){
            const res = JSON.parse(this.responseText);
            let html ='';
            res.detalle.forEach(row => {
                 html +=`<tr>
                     <td>${row['id']}</td>
                     <td>${row['nombre']}</td>
                     <td>${row['rendimiento']}</td>
                     <td>${row['peso_bruto']}</td>
                     <td>${row['cantidad']}</td>
                     <td>${row['kilos_tara']}</td>
                     <td>${row['peso_neto']}</td>
                     <td>${row['precio']}</td>
                     <td>${row['sub_total']}</td>
                     <td>
                        <button class="btn btn-danger" type="button" onclick="deleteDetalleEn(${row['id']})">
                        <i class="fas fa-trash-alt"></i>
                        </button>
                     </td>
 
 
                 </tr>`;
             }); 
             document.getElementById("tblDetalleEN").innerHTML = html;      
             document.getElementById("total").value = res.total_pagar.total;  
    
         }
    }
}
function deleteDetalleEn(id){
    const url =base_url + "Entradas/delete/"+id;
    const http=new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange=function(){
        if(this.readyState == 4 && this.status ==200){
          const res=JSON.parse(this.responseText);
          if( res == 'ok'){
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Producto Eliminado',
                showConfirmButton: false,
                timer: 2000
            })
            cargaDetalleEn();
          }else{
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Error de Eliminar Producto',
                showConfirmButton: false,
                 timer: 2000
            })
          }
        }
    }
}
function generarEntrada(){
    Swal.fire({
        title: '¿Está seguro de realizar la entrada?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
    }).then((result) => {
        if (result.isConfirmed) {
            const id_documento = document.getElementById('documento').value;
            const n_documento = document.getElementById('n_documento').value;
            const id_proveedor = document.getElementById('proveedor').value;
            if (id_documento =="" || n_documento =="" || id_proveedor =="") {
                Swal.fire({
                    position: 'top-end',
                    icon: 'warning',
                    title: 'Ingrese los datos de detalle de la entrada, es obligatorios',
                    showConfirmButton: false,
                    timer: 3500
                })
            }else{
                const frm = document.getElementById('frmDatoEntrada');
                const url =base_url + "Entradas/registrarEntrada";
                const http=new XMLHttpRequest();
                http.open("POST", url, true);
                http.send(new FormData(frm));
                http.onreadystatechange=function(){
                    if(this.readyState == 4 && this.status ==200){
                        const res = JSON.parse(this.responseText);
                        if (res.msg == "ok" ){
                            Swal.fire(
                                'Mensaje!',
                                'Entrada generada.',
                                'success'
                            )
                            document.getElementById("frmDatoEntrada").reset();
                            const ruta =base_url +'Entradas/generarPdf/'+ res.id_entrada;
                            window.open(ruta);
                            setTimeout(() =>{
                                window.location.reload();
                            },300);
                        }else{
                            Swal.fire(
                                'Mensaje!',
                                res,
                                'error'
                            )
                        }
                    }
                }
            }
            
        }
    })   
}
function CancelarEntrada(){
    Swal.fire({
        title: '¿Está seguro de cancelar la Entrada?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url =base_url + "Entradas/cancelarEntrada";
            const http=new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange=function(){
                if(this.readyState == 4 && this.status ==200){
                    document.getElementById("frmDatoEntrada").reset();
                    document.getElementById("frmProductoEntrada").reset();
                    document.getElementById("rendimiento").setAttribute('disabled', 'disabled');
                    document.getElementById("peso_bruto").setAttribute('disabled', 'disabled');
                    document.getElementById("cantidad").setAttribute('disabled', 'disabled');
                    document.getElementById("codigo").focus();
                    const res = JSON.parse(this.responseText);
                    if (res.msg == "ok" ){
                        Swal.fire(
                            'Mensaje!',
                            'Entrada Cancelada.',
                            'success'
                        )
                        
                        setTimeout(() =>{
                            window.location.reload();
                        },300);
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
            
        }
      })   
}

function btnAnularE(id){
    Swal.fire({
        title: '¿Está seguro de anular la entrada?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url =base_url + "Entradas/anularEntrada/"+id;
            const http=new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange=function(){
                if(this.readyState == 4 && this.status ==200){
                   const res = JSON.parse(this.responseText);
                   alertas(res.msg, res.icono);
                   t_h_e.ajax.reload();
                }
            }
        }
      })   
}


/** Fin de Entradas */
/*******************************/
/** Inicio de salidas */
function buscarCodigoSa(e) {
    e.preventDefault();
    const cod = document.getElementById("codigo").value;
    if (cod != '') {
        if(e.which == 13){
            const url =base_url + "Salidas/buscarCodigoSa/"+ cod;
            const http=new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange=function(){
                if(this.readyState == 4 && this.status ==200){
                    const res =JSON.parse(this.responseText);
                    if(res){
                        document.getElementById("producto").value = res.nombre;
                        document.getElementById("precio").value = res.precio_venta;
                        document.getElementById("id").value = res.id;
                        document.getElementById("peso_bruto").removeAttribute('disabled');
                        document.getElementById("peso_bruto").focus();
                        document.getElementById("cantidad").removeAttribute('disabled');
                    }else{
                        alertas('El producto no éxiste', 'warning');
                        document.getElementById("codigo").value='';
                        document.getElementById("codigo").focus();
                    }
                }
            }
        } 
    }else{
        alertas('Ingrese el Código de Barras ', 'warning');
    }

    
 }
function calcularPrecioSa(e){
    e.preventDefault();
    const cant = document.getElementById("cantidad").value;
    const p_bruto = document.getElementById("peso_bruto").value;
    const precio = document.getElementById("precio").value;
    document.getElementById("kilos_tara").value= cant * 0.2;
    document.getElementById("peso_neto").value= p_bruto - (cant * 0.2);
    document.getElementById("sub_total").value= precio * (p_bruto - (cant * 0.2));
    if (e.which == 13) {
        if(cant > 0){
            const url =base_url + "Salidas/ingresar";
            const frm =document.getElementById("frmProductoSalida");
            const http=new XMLHttpRequest();
            http.open("POST", url, true);
            http.send(new FormData (frm));
            http.onreadystatechange=function(){
                if(this.readyState == 4 && this.status ==200){
                    const res = JSON.parse(this.responseText);
                    alertas(res.msg, res.icono);
                    frm.reset();
                    cargaDetalleSa();
                    document.getElementById("peso_bruto").setAttribute('disabled', 'disabled');
                    document.getElementById("cantidad").setAttribute('disabled', 'disabled');
                    document.getElementById("codigo").focus();
                    
                }
            }
        }
    }  
}
if(document.getElementById('tblDetalleSA')){
    cargaDetalleSa();
}
function cargaDetalleSa(){
    const url =base_url + "Salidas/listar";
    const http=new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange=function(){
        if(this.readyState == 4 && this.status ==200){
            const res = JSON.parse(this.responseText);
            let html ='';
            res.detalle.forEach(row => {
                 html +=`<tr>
                     <td>${row['id']}</td>
                     <td>${row['nombre']}</td>
                     <td>${row['peso_bruto']}</td>
                     <td>${row['cantidad']}</td>
                     <td>${row['kilos_tara']}</td>
                     <td>${row['peso_neto']}</td>
                     <td>${row['precio']}</td>
                     <td>${row['sub_total']}</td>
                     <td>
                        <button class="btn btn-danger" type="button" onclick="deleteDetalleSa(${row['id']})">
                        <i class="fas fa-trash-alt"></i>
                        </button>
                     </td>
 
 
                 </tr>`;
             }); 
             document.getElementById("tblDetalleSA").innerHTML = html;      
             document.getElementById("total").value = res.total_pagar.total;  
    
         }
    }
}
function deleteDetalleSa(id){
    const url =base_url + "Salidas/delete/"+id;
    const http=new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange=function(){
        if(this.readyState == 4 && this.status ==200){
          const res=JSON.parse(this.responseText);
          if( res == 'ok'){
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Producto Eliminado',
                showConfirmButton: false,
                timer: 2000
            })
            cargaDetalleSa();
          }else{
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Error de Eliminar Producto',
                showConfirmButton: false,
                 timer: 2000
            })
          }
        }
    }
}
function generarSalida(){
    Swal.fire({
        title: '¿Está seguro de realizar la salida?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const id_documento = document.getElementById('documento').value;
            const n_documento = document.getElementById('n_documento').value;
            const motivo = document.getElementById('motivo').value; 
            if(id_documento =="" || n_documento =="" || motivo ==""){
                Swal.fire({
                    position: 'top-end',
                    icon: 'warning',
                    title: 'Ingrese los datos de detalle de la salida, es obligatorios',
                    showConfirmButton: false,
                    timer: 3500
                })
            }else{
                const frm = document.getElementById('frmDatoSalida');
                const url =base_url + "Salidas/registrarSalida";
                const http=new XMLHttpRequest();
                http.open("POST", url, true);
                http.send(new FormData(frm));
                http.onreadystatechange=function(){
                    if(this.readyState == 4 && this.status ==200){
                        const res = JSON.parse(this.responseText);
                        if (res.msg == "ok" ){
                            Swal.fire(
                                'Mensaje!',
                                'Salida generada.',
                                'success'
                            )
                            document.getElementById("frmDatoSalida").reset();
                            const ruta =base_url +'Salidas/generarPdf/'+ res.id_salida;
                            window.open(ruta);
                            setTimeout(() =>{
                                window.location.reload();
                            },300);
                        }else{
                            Swal.fire(
                                'Mensaje!',
                                res,
                                'error'
                            )
                        }
                    }
                }
            }
            
            
        }
      })   
}
function CancelarSalida(){
    Swal.fire({
        title: '¿Está seguro de cancelar la Salida?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url =base_url + "Salidas/cancelarSalida";
            const http=new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange=function(){
                if(this.readyState == 4 && this.status ==200){
                    document.getElementById("frmDatoSalida").reset();
                    document.getElementById("frmProductoSalida").reset();
                    document.getElementById("peso_bruto").setAttribute('disabled', 'disabled');
                    document.getElementById("cantidad").setAttribute('disabled', 'disabled');
                    document.getElementById("codigo").focus();
                    const res = JSON.parse(this.responseText);
                    if (res.msg == "ok" ){
                        Swal.fire(
                            'Mensaje!',
                            'Salida Cancelada.',
                            'success'
                        )
                        setTimeout(() =>{
                            window.location.reload();
                        },300);
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
            
        }
      })   
}

function btnAnularS(id){
    Swal.fire({
        title: '¿Está seguro de anular la salida?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url =base_url + "Salidas/anularSalida/"+id;
            const http=new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange=function(){
                if(this.readyState == 4 && this.status ==200){
                   const res = JSON.parse(this.responseText);
                   alertas(res.msg, res.icono);
                   t_h_s.ajax.reload();
                }
            }
        }
      })   
}
/** Fin de Salidas */
/*******************************/
/** inicio de ventas */
function buscarCodigoVe(e) {
    e.preventDefault();
    const cod = document.getElementById("codigo").value;
    if (cod != '') {
        if(e.which == 13){
            const url =base_url + "Ventas/buscarCodigoVe/"+ cod;
            const http=new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange=function(){
                    if(this.readyState == 4 && this.status ==200){
                        const res =JSON.parse(this.responseText);
                        if(res){
                            document.getElementById("producto").value = res.nombre;
                            document.getElementById("precio").value = res.precio_venta;
                            document.getElementById("id").value = res.id;
                            document.getElementById("peso_bruto").removeAttribute('disabled');
                            document.getElementById("peso_bruto").focus();
                            document.getElementById("cantidad").removeAttribute('disabled');

                            
                        }else{
                            alertas('El producto no éxiste', 'warning');
                            document.getElementById("codigo").value='';
                            document.getElementById("codigo").focus();
                        }
            
                    }
            }
        }
    }else{
        alertas('Ingrese el Código de Barras ', 'warning');
    }
}
function calcularPrecioVe(e){
    e.preventDefault();
    const cant = document.getElementById("cantidad").value;
    const p_bruto = document.getElementById("peso_bruto").value;
    const precio = document.getElementById("precio").value;
    document.getElementById("kilos_tara").value= cant * 0.2;
    document.getElementById("peso_neto").value= p_bruto - (cant * 0.2);
    document.getElementById("sub_total").value= precio * (p_bruto - (cant * 0.2));
    if (e.which == 13) {
        if(cant > 0){
            const url =base_url + "Ventas/ingresar";
            const frm =document.getElementById("frmProductoVenta");
            const http=new XMLHttpRequest();
            http.open("POST", url, true);
            http.send(new FormData (frm));
            http.onreadystatechange=function(){
                if(this.readyState == 4 && this.status ==200){
                    const res = JSON.parse(this.responseText);
                    alertas(res.msg, res.icono);
                    frm.reset();
                    cargaDetalleVe();
                    document.getElementById("peso_bruto").setAttribute('disabled', 'disabled');
                    document.getElementById("cantidad").setAttribute('disabled', 'disabled');
                    document.getElementById("codigo").focus();
                }
            }
        }
    }  
}
if(document.getElementById('tblDetalleVE')){
    cargaDetalleVe();
}
function cargaDetalleVe(){
    const url =base_url + "Ventas/listar";
    const http=new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange=function(){
        if(this.readyState == 4 && this.status ==200){
            const res = JSON.parse(this.responseText);
            let html ='';
            res.detalle.forEach(row => {
                 html +=`<tr>
                     <td>${row['id']}</td>
                     <td>${row['nombre']}</td>
                     <td>${row['peso_bruto']}</td>
                     <td>${row['cantidad']}</td>
                     <td>${row['kilos_tara']}</td>
                     <td>${row['peso_neto']}</td>
                     <td>${row['precio']}</td>
                     <td>${row['sub_total']}</td>
                     <td>
                        <button class="btn btn-danger" type="button" onclick="deleteDetalleVe(${row['id']})">
                        <i class="fas fa-trash-alt"></i>
                        </button>
                     </td>
 
 
                 </tr>`;
             }); 
             document.getElementById("tblDetalleVE").innerHTML = html;      
             document.getElementById("total").value = res.total_pagar.total;  
    
         }
    }
}
function deleteDetalleVe(id){
    const url =base_url + "Ventas/delete/"+id;
    const http=new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange=function(){
        if(this.readyState == 4 && this.status ==200){
          const res=JSON.parse(this.responseText);
          if( res == 'ok'){
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Producto Eliminado',
                showConfirmButton: false,
                timer: 2000
            })
            cargaDetalleVe();
          }else{
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Error de Eliminar Producto',
                showConfirmButton: false,
                 timer: 2000
            })
          }
        }
    }
}
function generarVenta(){
    Swal.fire({
        title: '¿Está seguro de realizar la venta?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const id_documento = document.getElementById('documento').value;
            const n_documento = document.getElementById('n_documento').value;
            const id_cliente = document.getElementById('cliente').value;
            if (id_documento =="" || n_documento =="" || id_cliente =="") {
                alertas('Ingrese los datos de detalle de la venta, es obligatorios', 'warning');
            }else{
                const frm = document.getElementById('frmDatoVenta');
                const url =base_url + "Ventas/registrarVenta";
                const http=new XMLHttpRequest();
                http.open("POST", url, true);
                http.send(new FormData(frm));
                http.onreadystatechange=function(){
                    if(this.readyState == 4 && this.status ==200){
                        const res = JSON.parse(this.responseText);
                        if (res.msg == "ok" ){
                            alertas(res.msg, res.icono); 
                            document.getElementById("frmDatoVenta").reset();
                            const ruta =base_url +'Ventas/generarPdf/'+ res.id_venta;
                            window.open(ruta);
                            setTimeout(() =>{
                                window.location.reload();
                            },300);
                        }else{
                            alertas(res.msg, res.icono);

                        }
                    }
                }
            }
            

        }
      })   
}
function CancelarVenta(){
    Swal.fire({
        title: '¿Está seguro de cancelar la Venta?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url =base_url + "Ventas/cancelarVenta";
            const http=new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange=function(){
                if(this.readyState == 4 && this.status ==200){
                    document.getElementById("frmDatoVenta").reset();
                    document.getElementById("frmProductoVenta").reset();
                    document.getElementById("peso_bruto").setAttribute('disabled', 'disabled');
                    document.getElementById("cantidad").setAttribute('disabled', 'disabled');
                    document.getElementById("codigo").focus();
                    const res = JSON.parse(this.responseText);
                    if (res.msg == "ok" ){
                        Swal.fire(
                            'Mensaje!',
                            'Ventas Cancelada.',
                            'success'
                        )
                        
                        setTimeout(() =>{
                            window.location.reload();
                        },300);
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }
            }
            
        }
      })   
}
function btnAnularV(id){
    Swal.fire({
        title: '¿Está seguro de anular la venta?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url =base_url + "Ventas/anularVenta/"+id;
            const http=new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange=function(){
                if(this.readyState == 4 && this.status ==200){
                   const res = JSON.parse(this.responseText);
                   alertas(res.msg, res.icono);
                   t_h_v.ajax.reload();
                }
            }
        }
      })   
}

/** Fin de ventas */
/*******************************/
/** inicio de Administracion */
function modificarEmpresa() {
    const frm = document.getElementById('frmEmpresa');
    const url =base_url + "Administracion/modificar";
    const http=new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange=function(){
        if(this.readyState == 4 && this.status ==200){
            const res = JSON.parse(this.responseText);
            alertas(res.msg, res.icono);
        }
    }
}
/** Fin de Administracion */
/*******************************/
/** inicio de Panel de administración */
if (document.getElementById('stockMinimo')) {
    reporteStock();
    reportePeso();
}
function reporteStock(){
    const url =base_url + "Administracion/reporteStock";
    const http=new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange=function(){
    if(this.readyState == 4 && this.status ==200){
        const res = JSON.parse(this.responseText);
        let nombre =[];
        let cantidad =[];
        for (let i = 0; i < res.length; i++) {
            nombre.push(res[i]['nombre']);
            cantidad.push(res[i]['cantidad']);
        }    
        var ctx = document.getElementById("stockMinimo");
        var mypieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: nombre,
                datasets: [{
                    data: cantidad,
                    backgroundColor: ['#9ba2c8', '#06c6c0', '#3536df','#d5e75b', '#28a745', '#d5e75b','#00aeff','#6b771a','#e36e79','#10af59'],
                }],
            },
        });
            
    }
    }
}
function reportePeso(){
    const url =base_url + "Administracion/reportePeso";
    const http=new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange=function(){
        if(this.readyState == 4 && this.status ==200){
            const res = JSON.parse(this.responseText);
            let nombre =[];
            let peso_total =[];
            for (let i = 0; i < res.length; i++) {
                nombre.push(res[i]['nombre']);
                peso_total.push(res[i]['peso_total']);
            }    
            var ctx = document.getElementById("pesoMinimo");
            var myPieChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: nombre,
                    datasets: [{
                        data: peso_total,
                        backgroundColor: ['#9ba2c8', '#06c6c0', '#3536df','#d5e75b', '#28a745', '#d5e75b','#00aeff','#6b771a','#e36e79','#10af59'],
                    }],
                },
            });
                
        }
    }
}
/** Fin de Panel de administración*/
/*******************************/
/** inicio de Alertas */
function alertas(mensaje, icono) {
    Swal.fire({
        position: 'top-end',
        icon: icono,
        title: mensaje,
        showConfirmButton: false,
        timer: 3000
    })
}
/** Fin de Alertas*/
/*******************************/
/** inicio de Cajas */
function frmCaja(){
    document.getElementById("title").innerHTML ="Agregar Caja";
    document.getElementById("btnAccion").innerHTML ="Agregar";
    document.getElementById("frmCaja").reset();
    $("#nuevo_caja").modal("show");
    document.getElementById("id").value ="";
}
function registrarCaj(e){
    e.preventDefault();
    const nombre = document.getElementById("nombre");
    if( nombre.value=="" ){
        alertas('Todo los campos son obligatorios', 'warning');
    }else{
        const url = base_url +"Cajas/registrar";
        const frm = document.getElementById("frmCaja");
        const http = new XMLHttpRequest();
        http.open("POST",url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res= JSON.parse(this.responseText);
                $("#nuevo_caja").modal("hide");
                alertas(res.msg, res.icono);
                tblCajas.ajax.reload();
            }
        }
    }
}
function btnEditarCaj(id){
    document.getElementById("title").innerHTML ="Actualizar Caja";
    document.getElementById("btnAccion").innerHTML ="Actualizar";
    const url = base_url +"Cajas/editar/"+id;
    const http = new XMLHttpRequest();
    http.open("GET",url, true);
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            const res = JSON.parse(this.responseText); 
            document.getElementById("id").value =res.id;
            document.getElementById("nombre").value=res.nombre; 
            $("#nuevo_caja").modal("show");  
        }

    }
}
function btnEliminarCaj(id){
    Swal.fire({
        title: '¿Deseas Eliminar Caja?',
        text: "¡La caja no se eliminara de forma permanente!,  solo cambiará el estado a inactivo",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url +"Cajas/eliminar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res=JSON.parse(this.responseText);
                  alertas(res.msg, res.icono);
                  tblCajas.ajax.reload();
               }
            }
        }  
    })
}
function btnReingresarCaj(id){
    Swal.fire({
        title: '¿Está seguro de reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'si',
        cancelButtonText:'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url +"Cajas/reingresar/"+id;
            const http = new XMLHttpRequest();
            http.open("GET",url, true);
            http.send();
            http.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                  const res= JSON.parse(this.responseText);
                  tblCajas.ajax.reload();
                  alertas(res.msg, res.icono);   
                }
            }
        }
      })
}
/** Fin de Cajas*/
/*******************************/
/** inicio de Arqueos */
if(document.getElementById('btn_abrir')){
    document.getElementById('btn_abrir').classList.remove('d-none');
    document.getElementById('btn_cerrar').classList.add('d-none');
}
function arqueoCaja() {
    document.getElementById('ocultar_campos').classList.add('d-none');
    document.getElementById('monto_inicial').value = '';
    document.getElementById('btnAccion').textContent ='Abrir Caja';
    $('#abrir_caja').modal('show');
}
function abrirArqueo(e) {
    e.preventDefault();
    const monto_inicial = document.getElementById('monto_inicial').value;
    if(monto_inicial ==""){
        alertas('Ingrese el monto inicial', 'warning');
    }else{
        const frm = document.getElementById('frmAbrirCaja');
        const url= base_url + "Cajas/abrirArqueo";
        const http= new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                alertas(res.msg , res.icono);
                tblArqueos.ajax.reload();
                $('#abrir_caja').modal('hide');
                document.getElementById('btn_abrir').classList.add('d-none');
                document.getElementById('btn_cerrar').classList.remove('d-none');
            }
        }

    }
}

function cerrarCaja() {
        const url= base_url + "Cajas/getVentas";
        const http= new XMLHttpRequest();
        http.open("GET", url, true);
        http.send();
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                document.getElementById('monto_final').value = res.monto_total.total;
                document.getElementById('total_ventas').value = res.total_ventas.total;
                document.getElementById('monto_inicial').value = res.inicial.monto_inicial;
                document.getElementById('monto_general').value = res.monto_general;
                document.getElementById('id').value = res.inicial.id;
                document.getElementById('ocultar_campos').classList.remove('d-none');
                document.getElementById('btnAccion').textContent ='Cerrar Caja';
                
                //alertas(res.msg , res.icono);
                $('#abrir_caja').modal('show');
                if(res.icono == 'success'){
                   
                     window.location.reload();
                     document.getElementById('btn_abrir').classList.add('d-none');
                    document.getElementById('btn_cerrar').classList.remove('d-none');
                    
                 }
                document.getElementById('btn_abrir').classList.add('d-none');
                document.getElementById('btn_cerrar').classList.remove('d-none');
                
            }
            
        }
}
/** Fin de Arqueos*/
/*******************************/
/** inicio de Permisos*/

function registrarPermisos(e) {
    e.preventDefault();
    const frm = document.getElementById('formulario');
    const url= base_url + "Usuarios/registrarPermiso";
    const http= new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(new FormData(frm));
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            if (res != '') {
                alertas(res.msg, res.icono);
            }else{
                alertas('Error no identificado','Error');

            }   
        }
    }
}

/** Fin de Permisos*/
/*******************************/
/** inicio de reportes */
if (document.getElementById('RstockMinimo')) {
    StockMinimo();
    PesoMinimo();
}
function StockMinimo(){
    const url =base_url + "Reportes/stockMinimo";
    const http=new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange=function(){
    if(this.readyState == 4 && this.status ==200){
        const res = JSON.parse(this.responseText);
        let nombre =[];
        let cantidad =[];
        for (let i = 0; i < res.length; i++) {
            nombre.push(res[i]['nombre']);
            cantidad.push(res[i]['cantidad']);
        }    
        var ctx = document.getElementById("RstockMinimo");
        var mypieChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: nombre,
                datasets: [{
                    label: 'TOP 10 DE PRODUCTOS CON STOCK MÍNIMO',
                    data: cantidad,
                    backgroundColor: ['#9ba2c8', '#06c6c0', '#3536df','#d5e75b', '#28a745', '#d5e75b','#00aeff','#6b771a','#e36e79','#10af59'],
                }],
            },
        });
            
    }
    }
}
function PesoMinimo(){
    const url =base_url + "Reportes/pesoMinimo";
    const http=new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange=function(){
    if(this.readyState == 4 && this.status ==200){
        const res = JSON.parse(this.responseText);
        let nombre =[];
        let peso_total =[];
        for (let i = 0; i < res.length; i++) {
            nombre.push(res[i]['nombre']);
            peso_total.push(res[i]['peso_total']);
        }    
        var ctx = document.getElementById("RpesoMinimo");
        var mypieChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: nombre,
                datasets: [{
                    label: 'TOP 10 DE PRODUCTOS CON PESO MÍNIMO',
                    data: peso_total,
                    backgroundColor: ['#9ba2c8', '#06c6c0', '#3536df','#d5e75b', '#28a745', '#d5e75b','#00aeff','#6b771a','#e36e79','#10af59'],
                }],
            },
        });
            
    }
    }
}
if (document.getElementById('RproductosVendidos')) {
    productosVendidos();
    clientesVendidos();
    almacenesVendidos();
    usuariosVendidos();
}
function productosVendidos(){
    const url =base_url + "Reportes/productosVendidos";
    const http=new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange=function(){
    if(this.readyState == 4 && this.status ==200){
        const res = JSON.parse(this.responseText);
        let nombre =[];
        let total =[];
        for (let i = 0; i < res.length; i++) {
            nombre.push(res[i]['nombre']);
            total.push(res[i]['total']);
        }    
        var ctx = document.getElementById("RproductosVendidos");
        var myPieChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: nombre,
            datasets: [{
              label: 'TOP 10 DE PRODUCTOS MÁS VENDIDOS',
              data: total,
              backgroundColor: ['#9ba2c8', '#06c6c0', '#3536df','#d5e75b', '#28a745', '#d5e75b','#00aeff','#6b771a','#e36e79','#10af59'],
            }],
          },
        });
            
    }
    }
}
function clientesVendidos(){
    const url =base_url + "Reportes/clientesVendidos";
    const http=new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange=function(){
    if(this.readyState == 4 && this.status ==200){
        const res = JSON.parse(this.responseText);
        let nombre =[];
        let total =[];
        for (let i = 0; i < res.length; i++) {
            nombre.push(res[i]['nombre']);
            total.push(res[i]['total']);
        }    
        var ctx = document.getElementById("RclientesVendidos");
        var myPieChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: nombre,
            datasets: [{
              label: 'TOP 10 DE CLIENTES MÁS VENDIDOS',
              data: total,
              backgroundColor: ['#9ba2c8', '#06c6c0', '#3536df','#d5e75b', '#28a745', '#d5e75b','#00aeff','#6b771a','#e36e79','#10af59'],
            }],
          },
        });
            
    }
    }
}
function almacenesVendidos(){
    const url =base_url + "Reportes/almacenesVendidos";
    const http=new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange=function(){
    if(this.readyState == 4 && this.status ==200){
        const res = JSON.parse(this.responseText);
        let nombre =[];
        let total =[];
        for (let i = 0; i < res.length; i++) {
            nombre.push(res[i]['nombre']);
            total.push(res[i]['total']);
        }    
        var ctx = document.getElementById("RalmacenVendidos");
        var myPieChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: nombre,
            datasets: [{
              label: 'TOP 10 DE ALMACENES MÁS VENDIDOS',
              data: total,
              backgroundColor: ['#9ba2c8', '#06c6c0', '#3536df','#d5e75b', '#28a745', '#d5e75b','#00aeff','#6b771a','#e36e79','#10af59'],
            }],
          },
        });
            
    }
    }
}

function usuariosVendidos(){
    const url =base_url + "Reportes/usuariosVendidos";
    const http=new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange=function(){
    if(this.readyState == 4 && this.status ==200){
        const res = JSON.parse(this.responseText);
        let nombre =[];
        let total =[];
        for (let i = 0; i < res.length; i++) {
            nombre.push(res[i]['nombre']);
            total.push(res[i]['total']);
        }    
        var ctx = document.getElementById("RusuarioVendidos");
        var myPieChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: nombre,
            datasets: [{
              label: 'TOP 10 DE USUARIOS MÁS VENDIDOS',
              data: total,
              backgroundColor: ['#9ba2c8', '#06c6c0', '#3536df','#d5e75b', '#28a745', '#d5e75b','#00aeff','#6b771a','#e36e79','#10af59'],
            }],
          },
        });
            
    }
    }
}
if (document.getElementById('RproductosSalidos')) {
    productosSalidos();
    almacenesSalidos();
    usuariosSalidos();
}
function productosSalidos(){
    const url =base_url + "Reportes/productosSalidos";
    const http=new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange=function(){
    if(this.readyState == 4 && this.status ==200){
        const res = JSON.parse(this.responseText);
        let nombre =[];
        let total =[];
        for (let i = 0; i < res.length; i++) {
            nombre.push(res[i]['nombre']);
            total.push(res[i]['total']);
        }    
        var ctx = document.getElementById("RproductosSalidos");
        var myPieChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: nombre,
            datasets: [{
              label:'TOP 10 DE PRODUCTOS MÁS SALIDOS',
              data: total,
              backgroundColor: ['#9ba2c8', '#06c6c0', '#3536df','#d5e75b', '#28a745', '#d5e75b','#00aeff','#6b771a','#e36e79','#10af59'],
            }],
          },
        });
            
    }
    }
}
function almacenesSalidos(){
    const url =base_url + "Reportes/almacenesSalidos";
    const http=new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange=function(){
    if(this.readyState == 4 && this.status ==200){
        const res = JSON.parse(this.responseText);
        let nombre =[];
        let total =[];
        for (let i = 0; i < res.length; i++) {
            nombre.push(res[i]['nombre']);
            total.push(res[i]['total']);
        }    
        var ctx = document.getElementById("RalmacenSalidos");
        var myPieChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: nombre,
            datasets: [{
              label: 'TOP 10 DE ALMACENES MÁS SALIDOS',
              data: total,
              backgroundColor: ['#9ba2c8', '#06c6c0', '#3536df','#d5e75b', '#28a745', '#d5e75b','#00aeff','#6b771a','#e36e79','#10af59'],
            }],
          },
        });
            
    }
    }
}
function usuariosSalidos(){
    const url =base_url + "Reportes/usuariosSalidos";
    const http=new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange=function(){
    if(this.readyState == 4 && this.status ==200){
        const res = JSON.parse(this.responseText);
        let nombre =[];
        let total =[];
        for (let i = 0; i < res.length; i++) {
            nombre.push(res[i]['nombre']);
            total.push(res[i]['total']);
        }    
        var ctx = document.getElementById("RusuarioSalidos");
        var myPieChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: nombre,
            datasets: [{
              label: 'TOP 10 DE USUARIOS MÁS SALIDOS',
              data: total,
              backgroundColor: ['#9ba2c8', '#06c6c0', '#3536df','#d5e75b', '#28a745', '#d5e75b','#00aeff','#6b771a','#e36e79','#10af59'],
            }],
          },
        });
            
    }
    }
}

if (document.getElementById('RproductosRendimientos')) {
    productosRendimientos();
    productosEntrados();
    proveedoresEntrados();
    almacenesEntrados();
    usuariosEntrados();
    
}
function productosRendimientos(){
    const url =base_url + "Reportes/productosRendimientos";
    const http=new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange=function(){
    if(this.readyState == 4 && this.status ==200){
        const res = JSON.parse(this.responseText);
        let nombre =[];
        let rendimiento =[];
        for (let i = 0; i < res.length; i++) {
            nombre.push(res[i]['nombre']);
            rendimiento.push(res[i]['rendimiento']);
        }    
        var ctx = document.getElementById("RproductosRendimientos");
        var myPieChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: nombre,
            datasets: [{
              label:'TOP 10 EN RENDIMIENTOS DE PRODUCTOS',
              data: rendimiento,
              backgroundColor: ['#9ba2c8', '#06c6c0', '#3536df','#d5e75b', '#28a745', '#d5e75b','#00aeff','#6b771a','#e36e79','#10af59'],
            }],
          },
        });
            
    }
    }
}
function productosEntrados(){
    const url =base_url + "Reportes/productosEntrados";
    const http=new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange=function(){
    if(this.readyState == 4 && this.status ==200){
        const res = JSON.parse(this.responseText);
        let nombre =[];
        let total =[];
        for (let i = 0; i < res.length; i++) {
            nombre.push(res[i]['nombre']);
            total.push(res[i]['total']);
        }    
        var ctx = document.getElementById("RproductosEntradas");
        var myPieChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: nombre,
            datasets: [{
              label:'TOP 10 DE PRODUCTOS MÁS COMPRADOS',
              data: total,
              backgroundColor: ['#9ba2c8', '#06c6c0', '#3536df','#d5e75b', '#28a745', '#d5e75b','#00aeff','#6b771a','#e36e79','#10af59'],
            }],
          },
        });
            
    }
    }
}
function proveedoresEntrados(){
    const url =base_url + "Reportes/proveedoresEntrados";
    const http=new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange=function(){
    if(this.readyState == 4 && this.status ==200){
        const res = JSON.parse(this.responseText);
        let nombre =[];
        let total =[];
        for (let i = 0; i < res.length; i++) {
            nombre.push(res[i]['nombre']);
            total.push(res[i]['total']);
        }    
        var ctx = document.getElementById("RproveedoresEntradas");
        var myPieChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: nombre,
            datasets: [{
              label: 'TOP 10 DE PROVEEDORES MÁS COMPRADOS',
              data: total,
              backgroundColor: ['#9ba2c8', '#06c6c0', '#3536df','#d5e75b', '#28a745', '#d5e75b','#00aeff','#6b771a','#e36e79','#10af59'],
            }],
          },
        });
            
    }
    }
}
function almacenesEntrados(){
    const url =base_url + "Reportes/almacenesEntrados";
    const http=new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange=function(){
    if(this.readyState == 4 && this.status ==200){
        const res = JSON.parse(this.responseText);
        let nombre =[];
        let total =[];
        for (let i = 0; i < res.length; i++) {
            nombre.push(res[i]['nombre']);
            total.push(res[i]['total']);
        }    
        var ctx = document.getElementById("RalmacenEntradas");
        var myPieChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: nombre,
            datasets: [{
              label: 'TOP 10 DE ALMACENES MÁS COMPRADOS',
              data: total,
              backgroundColor: ['#9ba2c8', '#06c6c0', '#3536df','#d5e75b', '#28a745', '#d5e75b','#00aeff','#6b771a','#e36e79','#10af59'],
            }],
          },
        });
            
    }
    }
}
function usuariosEntrados(){
    const url =base_url + "Reportes/usuariosEntrados";
    const http=new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange=function(){
    if(this.readyState == 4 && this.status ==200){
        const res = JSON.parse(this.responseText);
        let nombre =[];
        let total =[];
        for (let i = 0; i < res.length; i++) {
            nombre.push(res[i]['nombre']);
            total.push(res[i]['total']);
        }    
        var ctx = document.getElementById("RusuarioEntradas");
        var myPieChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: nombre,
            datasets: [{
              label: 'TOP 10 DE USUARIOS MÁS COMPRADOS',
              data: total,
              backgroundColor: ['#9ba2c8', '#06c6c0', '#3536df','#d5e75b', '#28a745', '#d5e75b','#00aeff','#6b771a','#e36e79','#10af59'],
            }],
          },
        });
            
    }
    }
}
/** Fin de Reportes*/


