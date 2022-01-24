
let tblUsuarios , tblCargos, tblAlmacenes, tblProveedores,tblCategorias,tblMarcas,tblUnidades,tblProductos,tblDocumentos,tblEntradas, tblSalidas,tblClientes;

/** Inicio de Usuario */
document.addEventListener("DOMContentLoaded", function(){
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
        ]
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
        ]
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
        ]
    });
    /** Fin de almacenes */
    /** Inicio de clientes */
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
        ]
    });
     /** Fin de la tabla clientes*/ 
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
        ]
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
        ]
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
        ]
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
        ]
    });
    /** Fin de documentos*/
    /** Inicio de entradas */
    tblEntradas = $('#tblEntradas').DataTable( {
        ajax: {
            url: base_url + "Entradas/listar" ,
            dataSrc: ''
        },
        columns: [
            {'data' : 'id'},
            {'data' : 'codigo'},
            {'data' : 'fecha_compra'},
            {'data' : 'documento'},
            {'data' : 'n_documento'},
            {'data' : 'proveedor'},
            {'data' : 'almacen'},
            {'data' : 'producto'},
            {'data' : 'cantidad'},
            {'data' : 'peso_bruto'},
            {'data' : 'peso_neto'},
            {'data' : 'kilos_tara'},
            {'data' : 'precio_compra'},
            {'data' : 'precio_venta'},
            {'data' : 'precio_total'},
            {'data' : 'fecha_vencimiento'},
            {'data' : 'acciones'}
        ]
    });
    /** Fin de entradas*/
    /** Inicio de salidas */
    tblSalidas = $('#tblSalidas').DataTable( {
        ajax: {
            url: base_url + "Salidas/listar" ,
            dataSrc: ''
        },
        columns: [
            {'data' : 'id'},
            {'data' : 'fecha_salida'},
            {'data' : 'documento'},
            {'data' : 'n_documento'},
            {'data' : 'almacen'},
            {'data' : 'motivo'},
            {'data' : 'producto'},
            {'data' : 'cantidad'},
            {'data' : 'precio'},
            {'data' : 'acciones'}
        ]
    });
    /** Fin de salidas*/
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
        ]
    });
     /** Fin de la tabla clientes*/ 
})
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
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Porfavor ingrese los datos, es obligatorios',
            showConfirmButton: false,
            timer: 3000
          })
    }else{
        const url = base_url +"Cargos/registrar";
        const frm = document.getElementById("frmCargo");
        const http = new XMLHttpRequest();
        http.open("POST",url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res= JSON.parse(this.responseText);
                    if(res == "si"){
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Cargo registrado con éxito',
                            showConfirmButton: false,
                            timer: 3000
                          })
                          frm.reset();
                          tblCargos.ajax.reload();
                          $("#nuevo_cargo").modal("hide");
                    }else if (res == "modificado") {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Cargo modificado con éxito',
                            showConfirmButton: false,
                            timer: 3000
                          })
                          $("#nuevo_cargo").modal("hide");
                          tblCargos.ajax.reload();
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
                  if(res == "ok"){
                    Swal.fire(
                     'Mensaje!',
                     'Cargo eliminado con éxito.',
                     'success'
                     )
                     tblCargos.ajax.reload();
               }else{
                 Swal.fire(
                     'Mensaje!',
                     res,
                     'error'
                     )
                    }
               }
            }

            Swal.fire(
            'Mensaje!',
            'elimiado',
            'error'
            )
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
                    if(res == "ok"){
                       Swal.fire(
                        'Mensaje!',
                        'Cargo reingresado con éxito.',
                        'success'
                        )
                        tblCargos.ajax.reload();
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
/** Fin de cargos */
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
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Porfavor ingrese los datos, es obligatorios',
            showConfirmButton: false,
            timer: 3000
          })
    }else{
        const url = base_url +"Almacenes/registrar";
        const frm = document.getElementById("frmAlmacen");
        const http = new XMLHttpRequest();
        http.open("POST",url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res= JSON.parse(this.responseText);
                    if(res == "si"){
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Almacén registrado con éxito',
                            showConfirmButton: false,
                            timer: 3000
                          })
                          frm.reset();
                          tblAlmacenes.ajax.reload();
                          $("#nuevo_almacen").modal("hide");
                    }else if (res == "modificado") {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Almacén modificado con éxito',
                            showConfirmButton: false,
                            timer: 3000
                          })
                          $("#nuevo_almacen").modal("hide");
                          tblAlmacenes.ajax.reload();
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
                    if(res == "ok"){
                       Swal.fire(
                        'Mensaje!',
                        'Almacén eliminado con éxito.',
                        'success'
                        )
                        tblAlmacenes.ajax.reload();
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
                    if(res == "ok"){
                       Swal.fire(
                        'Mensaje!',
                        'Almacén reingresado con éxito.',
                        'success'
                        )
                        tblAlmacenes.ajax.reload();
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
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Porfavor ingrese los datos, es obligatorios',
            showConfirmButton: false,
            timer: 3000
          })
    }else{
        const url = base_url +"Proveedores/registrar";
        const frm = document.getElementById("frmProveedor");
        const http = new XMLHttpRequest();
        http.open("POST",url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res = JSON.parse(this.responseText);
                if(res == "si" ){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Proveedor registrado con éxito',
                        showConfirmButton: false,
                        timer: 3000
                      })
                      frm.reset();
                      tblProveedores.ajax.reload();
                      $("#nuevo_proveedor").modal("hide");

                }else if (res == "modificado") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Proveedor modificado con éxito',
                        showConfirmButton: false,
                        timer: 3000
                      })
                      $("#nuevo_proveedor").modal("hide");
                      tblProveedores.ajax.reload();
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
                    if(res == "ok"){
                       Swal.fire(
                        'Mensaje!',
                        'Proveedor eliminado con éxito.',
                        'success'
                        )
                        tblProveedores.ajax.reload();
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
                    if(res == "ok"){
                       Swal.fire(
                        'Mensaje!',
                        'Proveedor reingresado con éxito.',
                        'success'
                        )
                        tblProveedores.ajax.reload();
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
/** Fin de proveedores */
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
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Porfavor ingrese los datos, es obligatorios',
            showConfirmButton: false,
            timer: 3000
          })
    }else{
        const url = base_url +"Categorias/registrar";
        const frm = document.getElementById("frmCategoria");
        const http = new XMLHttpRequest();
        http.open("POST",url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res= JSON.parse(this.responseText);
                    if(res == "si"){
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Categoria agregado con éxito',
                            showConfirmButton: false,
                            timer: 3000
                          })
                          frm.reset();
                          tblCategorias.ajax.reload();
                          $("#nuevo_categoria").modal("hide");
                    }else if (res == "modificado") {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Categoria modificado con éxito',
                            showConfirmButton: false,
                            timer: 3000
                          })
                          $("#nuevo_categoria").modal("hide");
                          tblCategorias.ajax.reload();
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
                  if(res == "ok"){
                    Swal.fire(
                     'Mensaje!',
                     'Categoria eliminado con éxito.',
                     'success'
                     )
                     tblCategorias.ajax.reload();
               }else{
                 Swal.fire(
                     'Mensaje!',
                     res,
                     'error'
                     )
                    }
               }
            }

            Swal.fire(
            'Mensaje!',
            'elimiado',
            'error'
            )
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
                    if(res == "ok"){
                       Swal.fire(
                        'Mensaje!',
                        'Catalogo reingresado con éxito.',
                        'success'
                        )
                        tblCategorias.ajax.reload();
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
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Porfavor ingrese los datos, es obligatorios',
            showConfirmButton: false,
            timer: 3000
          })
    }else{
        const url = base_url +"Marcas/registrar";
        const frm = document.getElementById("frmMarca");
        const http = new XMLHttpRequest();
        http.open("POST",url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res= JSON.parse(this.responseText);
                    if(res == "si"){
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Marca agregado con éxito',
                            showConfirmButton: false,
                            timer: 3000
                          })
                          frm.reset();
                          tblMarcas.ajax.reload();
                          $("#nuevo_marca").modal("hide");
                    }else if (res == "modificado") {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Marca modificado con éxito',
                            showConfirmButton: false,
                            timer: 3000
                          })
                          $("#nuevo_marca").modal("hide");
                          tblMarcas.ajax.reload();
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
                  if(res == "ok"){
                    Swal.fire(
                     'Mensaje!',
                     'Marca eliminado con éxito.',
                     'success'
                     )
                     tblMarcas.ajax.reload();
               }else{
                 Swal.fire(
                     'Mensaje!',
                     res,
                     'error'
                     )
                    }
               }
            }

            Swal.fire(
            'Mensaje!',
            'elimiado',
            'error'
            )
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
                    if(res == "ok"){
                       Swal.fire(
                        'Mensaje!',
                        'Marca reingresado con éxito.',
                        'success'
                        )
                        tblMarcas.ajax.reload();
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
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Porfavor ingrese los datos, es obligatorios',
            showConfirmButton: false,
            timer: 3000
          })
    }else{
        const url = base_url +"Unidades/registrar";
        const frm = document.getElementById("frmUnidad");
        const http = new XMLHttpRequest();
        http.open("POST",url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res= JSON.parse(this.responseText);
                    if(res == "si"){
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Unidad agregado con éxito',
                            showConfirmButton: false,
                            timer: 3000
                          })
                          frm.reset();
                          tblUnidades.ajax.reload();
                          $("#nuevo_unidad").modal("hide");
                    }else if (res == "modificado") {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Unidad modificado con éxito',
                            showConfirmButton: false,
                            timer: 3000
                          })
                          $("#nuevo_unidad").modal("hide");
                          tblUnidades.ajax.reload();
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
                  if(res == "ok"){
                    Swal.fire(
                     'Mensaje!',
                     'Unidades eliminado con éxito.',
                     'success'
                     )
                     tblUnidades.ajax.reload();
               }else{
                 Swal.fire(
                     'Mensaje!',
                     res,
                     'error'
                     )
                    }
               }
            }

            Swal.fire(
            'Mensaje!',
            'elimiado',
            'error'
            )
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
                    if(res == "ok"){
                       Swal.fire(
                        'Mensaje!',
                        'Unidad reingresado con éxito.',
                        'success'
                        )
                        tblUnidades.ajax.reload();
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
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Porfavor ingrese los datos, es obligatorio',
            showConfirmButton: false,
            timer: 3000
          })
    }else{
        const url =base_url + "Productos/registrar";
        const frm =document.getElementById("frmProducto");
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
                    title: 'Producto Registrado con éxito',
                    showConfirmButton: false,
                    timer: 3000
                    })
                  frm.reset();
                  $("#nuevo_producto").modal("hide");
                  tblProductos.ajax.reload();
               }else if(res == "modificado"){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Producto modificado con éxito',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    $("#nuevo_producto").modal("hide");
                    tblProductos.ajax.reload();
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
                    if (res == "ok" ){
                        Swal.fire(
                            'Mensaje!',
                            'Producto eliminado con éxito.',
                            'success'
                        )
                        tblProductos.ajax.reload();
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
                    if (res == "ok" ){
                        Swal.fire(
                            'Mensaje!',
                            'Producto reingresado con éxito.',
                            'success'
                        )
                        tblProductos.ajax.reload();
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
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Porfavor ingrese los datos, es obligatorios',
            showConfirmButton: false,
            timer: 3000
          })
    }else{
        const url = base_url +"Documentos/registrar";
        const frm = document.getElementById("frmDocumento");
        const http = new XMLHttpRequest();
        http.open("POST",url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res= JSON.parse(this.responseText);
                    if(res == "si"){
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Documento agregado con éxito',
                            showConfirmButton: false,
                            timer: 3000
                          })
                          frm.reset();
                          tblDocumentos.ajax.reload();
                          $("#nuevo_documento").modal("hide");
                    }else if (res == "modificado") {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Documento modificado con éxito',
                            showConfirmButton: false,
                            timer: 3000
                          })
                          $("#nuevo_documento ").modal("hide");
                          tblDocumentos.ajax.reload();
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
                  if(res == "ok"){
                    Swal.fire(
                     'Mensaje!',
                     'Documento eliminado con éxito.',
                     'success'
                     )
                     tblDocumentos.ajax.reload();
               }else{
                 Swal.fire(
                     'Mensaje!',
                     res,
                     'error'
                     )
                    }
               }
            }

            Swal.fire(
            'Mensaje!',
            'elimiado',
            'error'
            )
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
                    if(res == "ok"){
                       Swal.fire(
                        'Mensaje!',
                        'Documento reingresado con éxito.',
                        'success'
                        )
                        tblDocumentos.ajax.reload();
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
/** Fin de documento */
/*******************************/
/*******************************/
/** Inicio de entradas */
function buscarProveedor(e){
    e.preventDefault();
    if(e.which == 13){
        const pro = document.getElementById("n_identidad").value;
        const url =base_url + "Entradas/buscarProveedor/"+ pro;
        const http=new XMLHttpRequest();
        http.open("GET", url, true);
        http.send();
        http.onreadystatechange=function(){
                if(this.readyState == 4 && this.status ==200){
                    const res =JSON.parse(this.responseText);
                    if(res){
                        document.getElementById("nombre").value = res.nombre;
                        document.getElementById("id").value = res.id;
                        
                    }else{
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'El proveedor no existe',
                            showConfirmButton: false,
                         timer: 2000
                        })
                        document.getElementById("n_identidad").value='';
                        document.getElementById("n_identidad").focus();
                    }
        
                }
        }
    }
}
function buscarCodigoEn(e) {
    e.preventDefault();
    if(e.which == 13){
        const cod = document.getElementById("codigo").value;
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
                        document.getElementById("peso_neto").focus();
                        
                    }else{
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'El producto no existe',
                            showConfirmButton: false,
                         timer: 2000
                        })
                        document.getElementById("codigo").value='';
                        document.getElementById("codigo").focus();
                    }
        
                }
        }
    }
 }
 function calcularPrecioEn(e){
    e.preventDefault();
    const p_bruto = document.getElementById("peso_bruto").value;
    const cant = document.getElementById("cantidad").value;
    const k_tara = document.getElementById("kilos_tara").value;
    const p_neto = document.getElementById("peso_neto").value;
    const precio = document.getElementById("precio").value;

    document.getElementById("kilos_tara").value= cant * 0.2;
    document.getElementById("peso_neto").value= p_bruto - k_tara;
    document.getElementById("sub_total").value= precio * p_neto;
    
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
                    if(res == 'ok'){
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Producto Ingresado',
                            showConfirmButton: false,
                            timer: 2000
                        })
                        frm.reset();
                        
                    }
                    
                }
            }
        }
    }
}



/** Fin de Entradas */
/*******************************/
/** Inicio de salidas */
function buscarCodigoSa(e) {
    e.preventDefault();
    if(e.which == 13){
        const cod = document.getElementById("codigo").value;
        const url =base_url + "Salidas/buscarCodigoSa/"+ cod;
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
                        
                    }else{
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'El producto no existe',
                            showConfirmButton: false,
                         timer: 2000
                        })
                        document.getElementById("codigo").value='';
                        document.getElementById("codigo").focus();
                    }
        
                }
        }
    }
 }
 function calcularTaraSa(e){
    e.preventDefault();
    const cant = document.getElementById("cantidad").value;
    document.getElementById("kilos_tara").value= cant * 0.2;
}

function calcularPrecioSa(e) {
    e.preventDefault();
    const peso_bruto = document.getElementById("peso_bruto").value;
    const kilos_tara = document.getElementById("kilos_tara").value;
    const precio = document.getElementById("precio").value;
    const peso_neto = document.getElementById("peso_neto").value;
    document.getElementById("peso_neto").value = peso_bruto - kilos_tara;
    document.getElementById("sub_total").value = precio * peso_neto;
}
/** Fin de Salidas */
/*******************************/
/** inicio de ventas */
function buscarCliente(e){
    e.preventDefault();
    if(e.which == 13){
        const cli = document.getElementById("n_identidad").value;
        const url =base_url + "Ventas/buscarCliente/"+ cli;
        const http=new XMLHttpRequest();
        http.open("GET", url, true);
        http.send();
        http.onreadystatechange=function(){
                if(this.readyState == 4 && this.status ==200){
                    const res =JSON.parse(this.responseText);
                    if(res){
                        document.getElementById("nombre").value = res.nombre;
                        document.getElementById("id").value = res.id;
                        
                    }else{
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'El cliente no existe',
                            showConfirmButton: false,
                         timer: 2000
                        })
                        document.getElementById("n_identidad").value='';
                        document.getElementById("n_identidad").focus();
                    }
        
                }
        }
    }
}
function buscarCodigoVe(e) {
    e.preventDefault();
    if(e.which == 13){
        const cod = document.getElementById("codigo").value;
        const url =base_url + "Ventas/buscarCodigoVe/"+ cod;
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
                        
                    }else{
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'El producto no existe',
                            showConfirmButton: false,
                         timer: 2000
                        })
                        document.getElementById("codigo").value='';
                        document.getElementById("codigo").focus();
                    }
        
                }
        }
    }
 }
 function calcularTaraVe(e){
    e.preventDefault();
    const cant = document.getElementById("cantidad").value;
    document.getElementById("kilos_tara").value= cant * 0.2;
}

function calcularPrecioVe(e) {
    e.preventDefault();
    const peso_bruto = document.getElementById("peso_bruto").value;
    const kilos_tara = document.getElementById("kilos_tara").value;
    const precio = document.getElementById("precio").value;
    const peso_neto = document.getElementById("peso_neto").value;
    document.getElementById("peso_neto").value = peso_bruto - kilos_tara;
    document.getElementById("sub_total").value = precio * peso_neto;
}
/** Fin de ventas */
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
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Porfavor ingrese los datos, es obligatorios',
            showConfirmButton: false,
            timer: 3000
          })
    }else{
        const url = base_url +"Clientes/registrar";
        const frm = document.getElementById("frmCliente");
        const http = new XMLHttpRequest();
        http.open("POST",url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                const res = JSON.parse(this.responseText);
                if(res == "si" ){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Cliente registrado con éxito',
                        showConfirmButton: false,
                        timer: 3000
                      })
                      frm.reset();
                      tblClientes.ajax.reload();
                      $("#nuevo_cliente").modal("hide");

                }else if (res == "modificado") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Cliente modificado con éxito',
                        showConfirmButton: false,
                        timer: 3000
                      })
                      $("#nuevo_cliente").modal("hide");
                      tblClientes.ajax.reload();
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
                    if(res == "ok"){
                       Swal.fire(
                        'Mensaje!',
                        'Cliente eliminado con éxito.',
                        'success'
                        )
                        tblClientes.ajax.reload();
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
                    if(res == "ok"){
                       Swal.fire(
                        'Mensaje!',
                        'Cliente reingresado con éxito.',
                        'success'
                        )
                        tblClientes.ajax.reload();
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
/** Fin de cliente */