function frmLogin(e){
    e.preventDefault();
    const usuario=document.getElementById("usuario");
    const contrasena=document.getElementById("contrasena");
    if(usuario.value == ""){
        contrasena.classList.remove("is-invalid");
        usuario.classList.add("is-invalid");
        usuario.focus();
    }else if (contrasena.value == ""){
        usuario.classList.remove("is-invalid");
        contrasena.classList.add("is-invalid");
        contrasena.focus();
    }else{
        const url =base_url + "Usuarios/validar";
        const frm =document.getElementById("frmLogin");
        const http=new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange=function(){
            if(this.readyState == 4 && this.status ==200){
               //console.log(this.responseText);
                const res = JSON.parse(this.responseText);
                if(res == "ok"){
                    window.location = base_url + "Administracion/home";
                }else{
                    document.getElementById("alerta").classList.remove("d-none");
                    document.getElementById("alerta").innerHTML =res;
                }
            }
        }
    }
}

function resetearPass(e){
    e.preventDefault();
    const correo=document.getElementById("correo").value;
    if(correo == ""){
        alertas('El correo es requerido ', 'warning');
    }else{
        const url =base_url + "Usuarios/resetear";
        const frm =document.getElementById("frmReset");
        const http=new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange=function(){
            if(this.readyState == 4 && this.status ==200){
                //console.log(this.responseText);
                const res = JSON.parse(this.responseText);
                alertas(res.msg, res.icono);
            }
        }
    }
}
function restablecerPass(e){
    e.preventDefault();
    const nueva_contrasena =document.getElementById("nueva_contrasena").value;
    const confirmar =document.getElementById("confirmar").value;
    if(nueva_contrasena == "" || confirmar == ""){
        alertas('Todo los campos son requeridos', 'warning');
    }else if(nueva_contrasena != confirmar){
        alertas('Las contraseñas no coinciden', 'warning');
    }else{
        const url =base_url + "Usuarios/resetearPass";
        const frm =document.getElementById("frmrestablecer");
        const http=new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange=function(){
            if(this.readyState == 4 && this.status ==200){
                console.log(this.responseText);
                const res = JSON.parse(this.responseText);
                alertas(res.msg, res.icono);
                if(res.icono == 'success'){
                   setTimeout(() => {
                    window.location = base_url;
                   },2000);
                }
            }
        }
    }
}
function alertas(mensaje, icono) {
    Swal.fire({
        position: 'top-end',
        icon: icono,
        title: mensaje,
        showConfirmButton: false,
        timer: 3000
    })
}