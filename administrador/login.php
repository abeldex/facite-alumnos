<?php
  session_start();
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<base href="http://facite.uas.edu.mx/alumnos/administrador/">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="stylesheet" href="../css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/dropzone.css">
		<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Lato:400,700%7CMontserrat:300,400,600,700">
		
		<link rel="stylesheet" href="../icons/fontawesome/css/fontawesome-all.min.css"><!-- FontAwesome Icons -->
		<link rel="stylesheet" href="../icons/Iconsmind__Ultimate_Pack/Line%20icons/styles.min.css"><!-- iconsmind.com Icons -->
	</head>
	<body style="background-image:url('../images/bg1.jpg'); background-size: cover; background-repeat: no-repeat; background-position: center;">
		<div id="content-pro" >
			<div>
				<div class="container">
						<div class="registration-steps-page-container" style="max-width:550px">
							

							<div class="registration-step-final-padding welcome-page-styles" >
								
								<div class="centered-headings-pro pricing-plans-headings">
                                <a href="http://facite.uas.edu.mx/alumnos/administrador/"><img src="../images/logo.svg" alt="Logo"></a><br><br>
									<h4>Sistema Integral de Alumnos</h4>
                                    <h5>Administración</h5>
								</div>
								<form id="form_login">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Usuario">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-green-pro btn-display-block" id="btn_entrar">Entrar</button>
                                    </div>
                        
                                </form>
								<div class="clearfix"></div>
							</div><!-- close .registration-step-final-padding -->
	  					 
							
						</div><!-- close .registration-steps-page-container -->
					
				</div><!-- close .container -->
			</div><!-- close #pricing-plans-background-image -->
			
		</div><!-- close #content-pro -->
		
		
		<a href="#0" id="pro-scroll-top"><i class="fas fa-chevron-up"></i></a>
		<!-- Required Framework JavaScript -->
		<script src="../js/libs/jquery-3.3.1.min.js"></script><!-- jQuery -->
		<script src="../js/libs/popper.min.js" defer></script><!-- Bootstrap Popper/Extras JS -->
		<script src="../js/libs/bootstrap.min.js" defer></script><!-- Bootstrap Main JS -->
		<!-- All JavaScript in Footer -->
		
		<!-- Additional Plugins and JavaScript -->
		<script src="../js/navigation.js" defer></script><!-- Header Navigation JS -->
		<script src="../js/jquery.flexslider-min.js" defer></script><!-- Custom Document Ready JS -->		
		<script src="../js/script.js" defer></script><!-- Custom Document Ready JS -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		
        <script>
			$(document).ready( function () 
			{				
				//alert('jquery jalando');
				
				$('#btn_entrar').click(function(e){
					e.preventDefault();
					//swal("Good job!", "You clicked the button!", "success");
					var url = "http://facite.uas.edu.mx/alumnos/inc/login.php";
					$.ajax({                        
					   type: "POST",                 
					   url: url,                     
					   data: $("#form_login").serialize(), 
					   success: function(data)             
					   {
									 //$('#btn_cancelar').click();
									 //app.toast(data);
									if(data == 'exito'){
										swal('', "Usuario identificado", "success");
										if($('#username').val() == 'administrador'){
                                            $(location).attr('href', 'http://facite.uas.edu.mx/alumnos/administrador/');
                                        }
                                        else
                                        {
                                            $(location).attr('href', ' http://facite.uas.edu.mx/alumnos/sistema/')
                                        }
                                        
									} else if(data == 'contra')
									{
										swal('', "La contraseña es incorrecta! Intenta de nuevo", "warning");
									} else if(data == 'cuenta')
									{
										swal('', "El usuario no se encuentra registrado", "error");
									}
					   },
								 error: function( jqXhr, textStatus, errorThrown ){
									 swal("Error",errorThrown, "error");
									
					  }
				   });
				});
			});
			
			
		</script>

	</body>
</html>