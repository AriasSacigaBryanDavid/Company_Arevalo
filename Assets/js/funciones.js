
let tblUsuarios , tblCargos, tblAlmacenes, tblProveedores;

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
            {'data' : 'ruc'},
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
    const ruc= document.getElementById("ruc");
    const telefono = document.getElementById("telefono");
    const correo = document.getElementById("correo");
    const direccion = document.getElementById("direccion");
    if(nombre.value=="" || ruc.value=="" ||telefono.value==""||correo.value=="" ||direccion.value==""){
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
            document.getElementById("ruc").value =res.ruc;
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