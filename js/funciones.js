$( document ).ready(function() {
    //Expresiones regulares
    var exp_pass=/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$/;

    $("#principal").show();
    $("#lector").hide();
    $("#escritor").hide();

    $("#formRegPrin").click(function (e) { 
        e.preventDefault();
        var email = $("#correo").val();
        var user = $("#user").val();
        var pass = $("#password").val();
        var rol = $("#selectRol").val();

        if(email == "" || user == "" || pass == "" || rol == "0"){
            alertify.alert("Complete todos los campos solicitados");
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
        }else if($("#selectRol").val() === "Escritor"){
            $("#principal").hide();
            $("#lector").hide();
            $("#escritor").show();
        }else{
            alertify.alert("Selecciona un rol");
        }
    }

    $("#btnLector").click(function(e){
        e.preventDefault();

        if($("#nombreLec").val() == "" || $("#apellidoLec").val()== "" || $("#edadLec").val()== ""
        || $("#generoLec").val()== "0" || $("#categoriaLec").val()== "0"){
            alertify.alert("Complete todos los campos solicitados");
        }else if( $("#terminosLec").is(':checked') ){
            agregarDatosLector();
        } else {
            alertify.alert("No puede completar el registro si no acepta los terminos y condiciones");
        }
    });

    $("#btnEscritor").click(function (e) { 
        e.preventDefault();

        if($("#nombreEsc").val() == "" || $("#apellidoEsc").val()== "" || $("#rfcEsc").val()== "" || $("#edadEsc").val()== ""
        || $("#generoEsc").val()== "0" || $("#direccionEsc").val()== "" || $("#telefonoEsc").val()== "" || $("#referenciasEsc")== "" || $("#categoriaEsc").val()== "0"){
            alertify.alert("Complete todos los campos solicitados");
        }else if( $("#terminos").is(':checked') ){
            agregarDatosEscritor();
        } else {
            alertify.alert("No puede completar el registro si no acepta los terminos y condiciones");
        }
        
    });

    function agregarDatosLector() {
        cadena = "correo=" + $("#correo").val() + "&user=" + $("#user").val() + "&pass=" + $("#password").val() + "&rol=" + $("#selectRol").val()
        + "&nombre=" + $("#nombreLec").val() + "&apellido=" + $("#apellidoLec").val() + "&edad=" + $("#edadLec").val()
        + "&genero=" + $("#generoLec").val() + "&categoria=" + $("#categoriaLec").val();
        $.ajax({
            type: "POST",
            url: "include/registrarUsuarioLec.php",
            data: cadena,
            success: function (r) {
                if (r == 11) {
                    alertify.success("Datos agregados con exito");                  
                    alertify.alert("Registro completado", function(){
                        $(location).attr('href','login.php');
                    }); 
                } else {
                    alertify.success("Lo sentimos, no se pudo completar el registro. Intentelo mas tarde");
                    alertify.error("Fallo el servidor"); 
                }
            }
    
        });
    }

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
                if (r == 11) {
                    alertify.success("Datos agregados con exito");                  
                    alertify.alert("Registro completado", function(){
                        $(location).attr('href','login.php');
                    }); 
                } else {
                    alertify.success("Lo sentimos, no se pudo completar el registro. Intentelo mas tarde");
                    alertify.error("Fallo el servidor"); 
                }
            }
    
        });
    
    }
    var tycLec = "<p><strong>Al registrarse como uno de nuestros lectores, aceptarás las siguientes normas de nuestra comunidad:</strong></p>"+
    "<div class='main'>"+
        "<lu>"+
            "<li>Como lector de nuestra comunidad, solo prodrás interactuar con nuestros escritores, comentando en sus respectivos posts.</li>"+
            "<li>Los comentarios que realice serán moderados por nuestro(s) administrador(es).</li>"+
            "<li>Queda totalmente prohibido el uso de lenguaje altisonante o agresivo en el área de comentarios.</li>"+
            "<li>De no cumplir con la norma anterior de nuestra comunidad, su cuenta será eliminada y su(s) comentario(s) serán eliminados del tablón.</li>"+
        "</lu>";

    var tycEsc = "<p><strong>Al registrarse como escritor en el sitio, aceptarás las siguientes normas de nuestra comunidad:</strong></p>"+
    "<div class='main'>"+
        "<lu>"+
            "<li>Como escritor deberás iniciar sesión en el sitio para ser capaz de de publicar articulos.</li>"+
            "<li>Una vez creado su usuario, no podrá modificar algunos de sus datos personales, por lo que le pedimos sea cuidados@ a la hora de registrarse.</li>"+
            "<li>Queda prohibido el uso de palabras altisonantes en la redacción de sus artículos.</li>"+
            "<li>De no cumplir estos lineamientos, es posible que su usuario sea eliminado del sitio, junto con todos los articulos publicados bajo el mismo.</li>"+
        "</lu>";

    $("#tycLec").click(function(e){
        $("#modal-body").append(tycLec);
    });
    $("#tycEsc").click(function(e){
        $("#modal-body").append(tycEsc);
    });
    $("#btnModal").click(function(e){
        $("#modal-body").empty();
    });
        
});