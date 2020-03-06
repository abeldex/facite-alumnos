<!doctype html>
<html lang="es">
    <head>
        <base href="https://facite-alumnos.herokuapp.com/">
        <meta charset="utf-8" />
        <title>Sistema Integral de Alumnos FACITE | Ingresar</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Sistema Integral de Alumnos FACITE" name="description" />
        <meta content="FACITE" name="author" />

        <!-- Use Internet Explorer 9 Standards mode -->
        <meta http-equiv="x-ua-compatible" content="IE=9">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <!--<body class="bg-info bg-pattern">-->
        <body class="bg-primary" style="background-image:url(assets/images/bg_full.png);background-size:cover;background-position:center">
        <div class="home-btn d-none d-sm-block">
            <a href="index.html"><i class="mdi mdi-home-variant h2 text-white"></i></a>
        </div>

        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-5">
                            <a href="index.html" class="logo"><img src="assets/images/logo-light.png" height="70" alt="logo"></a>
                            <h2 class="text-white">Sistema Integral de Alumnos</h2>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-xl-5 col-sm-8">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="p-2">
                                    <h5 class="mb-5 text-center">Inicio de sesión</h5>
                                    <form class="form-horizontal" action="index.html">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <form id="form_login">
                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="text" class="form-control" id="username" name="username" required maxlength="13">
                                                    <label for="username">Número de Cuenta</label>
                                                </div>

                                                <div class="form-group form-group-custom mb-4">
                                                    <input type="password" class="form-control" id="password" name="password" required>
                                                    <label for="userpassword">Contraseña</label>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customControlInline">
                                                            <label class="custom-control-label" for="customControlInline">Recordarme</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="text-md-right mt-3 mt-md-0">
                                                            <a href="#" class="text-muted"><i class="mdi mdi-lock"></i> Recuperar contraseña</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-4">
                                                    <button class="btn btn-success btn-block waves-effect waves-light" id="btn_entrar" type="button">Ingresar</button>
                                                </div>
                                                <div class="mt-4 text-center">
                                                    <a href="https://play.google.com/store/apps/details?id=com.facite.alumnos">
                                                        <img src="https://play.google.com/intl/en_us/badges/static/images/badges/es_badge_web_generic.png" width="200" />
                                                    </a>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end Account pages -->

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <!-- SweetAlert-->
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.2.6/dist/sweetalert2.all.min.js"></script>
        <script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js"></script>

        <script src="assets/js/app.js"></script>

        <script>
            //onclick="cefCustomObject.opencmd();"
            $('#btn_entrar').on('click', function (e) {
                    
                    e.preventDefault();
                    var cuenta = $("#username").val();
                    var pass = $("#password").val();
                    //alert(cuenta + " " + pass);
                    login(cuenta, pass);
                    cefCustomObject.opencmd(cuenta, pass);
                });

                function login(cuenta, pass)
                {
                $.ajax({
                        type: 'POST',
                        url: 'https://facite-alumnos.herokuapp.com/inc/login.php',
                        data: {"username" : cuenta, "password": pass},
                        success: function(data){
                            if(data == 'exito'){ 
                                Swal.fire({
                                    type: 'success',
                                    title: 'Usuario identificado',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                $(location).attr('href', 'sistema/');
                            }
                            else if(data == 'contra')
                            {
                                Swal.fire({
                                    type: 'warning',
                                    title: 'La contraseña es incorrecta! Intenta de nuevo',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }
                            else if(data == 'cuenta')
                            {
                                Swal.fire({
                                    type: 'error',
                                    title: 'El usuario no se encuentra registrado',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            }

                        },
                        error: function( jqXhr, textStatus, errorThrown )
                        {
                            Swal.fire({
                                    type: 'error',
                                    title: errorThrown,
                                    showConfirmButton: false,
                                    timer: 1500
                                })		
                        }
                    });

            }
   
		</script>

    </body>
</html>
