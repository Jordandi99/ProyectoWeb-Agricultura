$( document ).ready(function() {
    //Expresiones regulares
    var exp_pass=/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$/;

    $("#principal").show();
    $("#lector").hide();
    $("#escritor").hide();

    document.getElementById("formRegPrin").setAttribute("data-target","#myModal2");
    document.getElementById("btnLector").setAttribute("data-target","#myModal2");
    document.getElementById("btnEscritor").setAttribute("data-target","#myModal2");

    $("#formRegPrin").click(function (e) { 
        e.preventDefault();
        
        var email = $("#correo").val();
        var user = $("#user").val();
        var pass = $("#password").val();
        var rol = $("#selectRol").val();

        if(email == "" || user == "" || pass == "" || rol == "0"){
            var tit="<i class='fas fa-exclamation-triangle'></i> El registro no puede continuar"
            var body= "Por favor complete todos los campos solicitados."
            $("#modal-title2").append(tit);
            $("#modal-body2").append(body);
            
        }else if(!exp_pass.test(pass)){
            var tit="<i class='fas fa-exclamation-triangle'></i> El registro no puede continuar"
            var body= "La contraseña debe contener mínimo seis caracteres, al menos una letra mayúscula, una letra minúscula y un número."
            $("#modal-title2").append(tit);
            $("#modal-body2").append(body);
        }else{
            document.getElementById("formRegPrin").removeAttribute("data-target");
            RegistroPorRol();  
        }

    });

    $("#btnModal2").click(function(e){
        $("#modal-title2").empty();
        $("#modal-body2").empty();
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
            var tit="<i class='fas fa-exclamation-triangle'></i> El registro no puede continuar"
            var body= "Seleccione un rol"
            $("#modal-title2").append(tit);
            $("#modal-body2").append(body);
        }
    }

    $("#btnLector").click(function(e){
        e.preventDefault();
        if($("#nombreLec").val() == "" || $("#apellidoLec").val()== "" || $("#edadLec").val()== ""
        || $("#generoLec").val()== "0" || $("#categoriaLec").val()== "0"){
            var tit="<i class='fas fa-exclamation-triangle'></i> El registro no puede continuar"
            var body= "Por favor complete todos los campos solicitados."
            $("#modal-title2").append(tit);
            $("#modal-body2").append(body);
        }else if( $("#terminosLec").is(':checked') ){
            document.getElementById("btnLector").removeAttribute("data-target");
            agregarDatosLector();
        } else {
            var tit="<i class='fas fa-exclamation-triangle'></i> El registro no puede continuar"
            var body= "No puede completar el registro si no acepta los terminos y condiciones."
            $("#modal-title2").append(tit);
            $("#modal-body2").append(body);
        }
    });

    $("#btnEscritor").click(function (e) { 
        e.preventDefault();

        if($("#nombreEsc").val() == "" || $("#apellidoEsc").val()== "" || $("#rfcEsc").val()== "" || $("#edadEsc").val()== ""
        || $("#generoEsc").val()== "0" || $("#direccionEsc").val()== "" || $("#telefonoEsc").val()== "" || $("#referenciasEsc")== "" || $("#categoriaEsc").val()== "0"){
            var tit="<i class='fas fa-exclamation-triangle'></i> El registro no puede continuar"
            var body= "Por favor complete todos los campos solicitados."
            $("#modal-title2").append(tit);
            $("#modal-body2").append(body);
        }else if( $("#terminos").is(':checked') ){
            document.getElementById("btnEscritor").removeAttribute("data-target");
            agregarDatosEscritor();
        } else {
            var tit="<i class='fas fa-exclamation-triangle'></i> El registro no puede continuar"
            var body= "No puede completar el registro si no acepta los terminos y condiciones."
            $("#modal-title2").append(tit);
            $("#modal-body2").append(body);
        }
        
    });

    function agregarDatosLector() {
        document.getElementById("btnLector").setAttribute("data-target","#myModal2");
        cadena = "correo=" + $("#correo").val() + "&user=" + $("#user").val() + "&pass=" + $("#password").val() + "&rol=" + $("#selectRol").val()
        + "&nombre=" + $("#nombreLec").val() + "&apellido=" + $("#apellidoLec").val() + "&edad=" + $("#edadLec").val()
        + "&genero=" + $("#generoLec").val() + "&categoria=" + $("#categoriaLec").val();
        $.ajax({
            type: "POST",
            url: "include/registrarUsuarioLec.php",
            data: cadena,
            success: function (r) {
                if (r == 11) {
                    var tit="<i class='fas fa-check-circle'></i> Registro completado"
                    var body= "Su registro se ha completado correctamente, sera dirigido al login para que pueda ingresar con sus credenciales."
                    $("#modal-title2").append(tit);
                    $("#modal-body2").append(body);
                    $("#btnModal2").click(function(e){
                        $(location).attr('href','login.php');
                    });
                } else {
                    var tit="<i class='fas fa-exclamation-triangle'></i> Su registro no se pudo completar"
                    var body= "Error en el servidor, por favor intentelo mas tarde."
                    $("#modal-title2").append(tit);
                    $("#modal-body2").append(body);
                    $("#btnModal2").click(function(e){
                        $(location).attr('href','login.php');
                    });
                }
            }
    
        });
    }

    function agregarDatosEscritor() {
        document.getElementById("btnEscritor").setAttribute("data-target","#myModal2");
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
                    var tit="<i class='fas fa-check-circle'></i> Registro completado"
                    var body= "Su registro se ha completado correctamente, sera dirigido al login para que pueda ingresar con sus credenciales."
                    $("#modal-title2").append(tit);
                    $("#modal-body2").append(body);
                    $("#btnModal2").click(function(e){
                        $(location).attr('href','login.php');
                    });
                } else {
                    var tit="<i class='fas fa-exclamation-triangle'></i> Su registro no se pudo completar"
                    var body= "Error en el servidor, por favor intentelo mas tarde."
                    $("#modal-title2").append(tit);
                    $("#modal-body2").append(body);
                    $("#btnModal2").click(function(e){
                        $(location).attr('href','login.php');
                    });
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

    $("#btnLectorReg, #btnEscritorReg").click(function(e){
        $("#principal").show();
        $("#lector").hide();
        $("#escritor").hide();
    });
        
});