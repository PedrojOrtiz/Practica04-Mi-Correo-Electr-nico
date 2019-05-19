function validarCamposObligatorios() {

    var bandera = false
    for (var i = 0; i < document.forms[0].length; i++) {
        var elemento = document.forms[0].elements[i];
        if (elemento.value.trim() == '') {
            bandera = true
            if(elemento.id == 'nombres') {
                elemento.style.border = "1px red solid"
                document.getElementById("mensajeNombres").innerHTML = ('nombre obligatorio')
            }
            if(elemento.id == 'apellidos') {
                elemento.style.border = "1px red solid"
                document.getElementById("mensajeApellidos").innerHTML = ('apellido obligatorio')
            }
            if(elemento.id == 'correo') {
                elemento.style.border = "1px red solid"
                document.getElementById("mensajeCorreo").innerHTML = ('correo obligatorio')
            }
            if(elemento.id == 'contrasena') {
                elemento.style.border = "1px red solid"
                document.getElementById("mensajeContrasena").innerHTML = ('contraseña obligatoria')
            }
        }
    }
    if (document.getElementById("admin").checked == false && document.getElementById("user").checked == false) {
        //document.getElementById("crear").innerHTML = (echo 'llego aqui')
        bandera = true
        elemento.style.border = "1px red solid"
        document.getElementById("mensajeRol").innerHTML = ('Elija su tipo de usuario')
    
    } else if (bandera) {
        alert('Llenar todos los campos correctamente')
        return false
    } else {
        return true
    }
    
}

function validarLetras(elemento) {
    elemento.value.charCodeAt()
}