$( document ).ready(function() {
    //Expresiones regulares
    var exp_pass=/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$/;
    var exp= /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/;

    $("#principal").show();
    $("#lector").hide();
    $("#escritor").hide();

    $("#formRegPrin").click(function (e) { 
        e.preventDefault();
        var email = $("#correo").val();
        var user = $("#user").val();
        var pass = $("#password").val();
        var rol = $("#selectRol").val();

        console.log($("#selectRol").val());

        if(email == "" || user == "" || pass == "" || rol == "0"){
            alertify.alert("Complete los campos solicitados");
        }else if(!exp_pass.test(pass)){
            alertify.alert("La contraseña debe contener mínimo seis caracteres, al menos una letra mayúscula, una letra minúscula y un número");
        }else{
            RegistroPorRol();
        }

    });

    function RegistroPorRol(){
        if($("#selectRol").val() === "Lector"){
            $("#principal").hide();
            $("#lector").show();
            $("#escritor").hide();
        }else if($("#selectRol").val() === "Escritor"){+
            $("#principal").hide();
            $("#lector").hide();
            $("#escritor").show();
        }else{
            alertify.alert("Selecciona un rol");
        }
    }

    $("#btnEscritor").click(function (e) { 
        e.preventDefault();
        agregarDatosEscritor();
    });

    function agregarDatosEscritor() {
        cadena = "correo=" + $("#correo").val() + "&user=" + $("#user").val() + "&pass=" + $("#password").val() + "&rol=" + $("#selectRol").val()
        + "&nombre=" + $("#nombreEsc").val() + "&apellido=" + $("#apellidoEsc").val() + "&rfc=" + $("#rfcEsc").val() + "&edad=" + $("#edadEsc").val()
        + "&genero=" + $("#generoEsc").val() + "&direccion=" + $("#direccionEsc").val() + "&telefono=" + $("#telefonoEsc").val() + "&referencias=" + $("#referenciasEsc").val()
        + "&categoria=" + $("#categoriaEsc").val();
        $.ajax({
            type: "POST",
            url: "include/registrarUsuario.php",
            data: cadena,
            success: function (r) {
                console.log(r);
                if (r == 1) {
                    alertify.success("Datos agregados con exito");
                   
                } else {
                    alertify.success("Fallo el servidor"); 
                }
            }
    
        });
    
    }
        
});