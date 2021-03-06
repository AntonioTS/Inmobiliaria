<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js" type="text/javascript"></script>


        <style>
            body{


            background-color: #C5D4F7;
            }

            .registro h1{
                text-align: center;
                font-weight: bold;

            }   
            .registro h3{
                margin-left: 10px;
                margin-left: 15%;
            }  
            .registro div.form-group{
                margin-top: 30px;
                width:50%;
                margin-left: 20%;
            }
            .registro div.form-group #boton{
                padding: 10px 60px 10px 60px;

            }
        </style>


        <script>
            $(document).ready(function () {


                $("#formularioRegistro").validate({
                    errorClass: "rojo",
                    validClass: "verde",
                    rules: {
                        nombreNuevoUsuario: {
                            required: true,
                            minlength: 3
                        },
                        contrasenaNuevoUsuario: {
                            required: true,
                            minlength: 9,
                            maxlength: 16
                        },
                        direccionNuevoUsuario: {
                            required: true
                        },
                        telefonoNuevoUsuario: {
                            required: true,
                            minlength: 9

                        },

                        emailNuevoUsuario: {
                            required: true,
                            email: true
                        }
                    },
                    messages: {
                        nombreNuevoUsuario: {
                            required: "Campo nombre obligatorio",
                            minlength: "No es real"
                        },
                        contrasenaNuevoUsuario: {
                            required: "Campo contrase??a obligatorio",
                            minlength: "La contrase??a es muy corta",
                            maxlength: "La contrase??a es muy larga"
                        },
                        direccionNuevoUsuario: {
                            required: "Campo direccion obligatorio",
                        },
                        telefonoNuevoUsuario: {
                            required: "Campo telefono obligatorio",
                            minlength: "El numero no es correcto"
                        },

                        emailNuevoUsuario: {
                            required: "Campo email obligatorio",
                            email: "Email invalido"
                        }

                    }

                }); //FIn de la validacion 






                $("#boton").on("click", function () {

                    if ($("#formularioRegistro").valid()) {
                        var formData = new FormData($("#formularioRegistro")[0]);
                        var ruta = "../Controlador/Anadir_usuario.php"; // El script a d??nde se realizar?? la petici??n.
                        $.ajax({
                            url: ruta,
                            type: "POST",
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function (datos)
                            {
                                if (datos == "exito") {
                                    setTimeout(function(){
                                       window.location = "./formulario_controlUsuario.php";
                                     }, 3000);
                                   
                                      $(".registro").html('<div class="alert alert-success"><strong>Se ha A??adido correctamente. Bienvenido!</strong></div>');
                                } else {
                                    $("#respuesta").html(datos);
                                }

                            }
                        });

                        return false; // Evitar ejecutar el submit del formulario.
                        
                    }

                });







            });

        </script>
    </head>
    <body class="registro"> 
      
     
        <h1 >Inmobiliaria Castillo</h1><br><br>
      
        <h3>Registrarse como usuario</h3>
        <hr>
        <form class="form-horizontal" role="form" id="formularioRegistro">

            <div class="form-group">
                <label for="nombre" class="col-lg-2 control-label">Nombre</label>
                <div class="col-lg-10">
                    <input type="text" name="nombreNuevoUsuario" class="form-control" id="nombreNuevoUsuario"
                           placeholder="Nombre completo">
                </div>
            </div>


            <div class="form-group">
                <label for="email" class="col-lg-2 control-label">Email</label>
                <div class="col-lg-10">
                    <input type="email"  name="emailNuevoUsuario" class="form-control" id="email"
                           placeholder="Email" size="5">

                    <span id="respuesta"></span>
                </div>
            </div>
            <div class="form-group">
                <label for="contrase??a" class="col-lg-2 control-label">Contrase??a</label>
                <div class="col-lg-10">
                    <input type="password" name="contrasenaNuevoUsuario" class="form-control" id="contrasena" 
                           placeholder="Contrase??a">
                </div>
            </div>


            <div class="form-group">
                <label for="direccion" class="col-lg-2 control-label">Direccion</label>
                <div class="col-lg-10">
                    <input type="text"  name="direccionNuevoUsuario" class="form-control" id="direccion" 
                           placeholder="Direccion">
                </div>
            </div>


            <div class="form-group">
                <label for="telefono" class="col-lg-2 control-label">Telefono</label>
                <div class="col-lg-10">
                    <input type="tel" name="telefonoNuevoUsuario" class="form-control" id="telefono" 
                           placeholder="Telefono">
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" class="btn btn-success" id="boton"><strong>Send</strong></button>
                </div>
            </div>
        </form>
        
        <hr>
        <a class="btn btn-default" href="./formulario_controlUsuario.php" role="button">back</a><br>
    </body>
</html>
