<?php
    if(!empty($_POST)){
		
		$captcha = $_POST['g-recaptcha-response'];
		
		$secret = '6LeEsBIgAAAAALlDrgWpF6aRWvuVuyrPbUeUQSg7';
		
		if(!$captcha){

			echo '<script>alert("Por favor verifica el captcha");
            window.location.href="./index.php";    
            </script>';

			
			} else {
			
			$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");
			
			$arr = json_decode($response, TRUE);
			
			if($arr['success'])
			{
				if(isset($_POST['mail'])) {
                    if (!empty($_POST['mail'])) {
                        require_once 'php/Mail.php';
                    }else {
                        echo'<script type="text/javascript">
                        alert("Debes todos llenar los campos.");
                        window.location.href="index.php";
                        </>';
                    }
                }
				} else {
                   die();
			}
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="./image/favicon3.png">
    <title>TRES REYES CAJITITLAN</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

    <main class="formulario">
        <section class="banner-principal">
            <div class="uk-text-center" uk-grid>
                <div class="uk-width-1-1@m uk-height-medium uk-flex uk-flex-center uk-flex-middle uk-background-cover uk-light banner" uk-img>
                    <a href="./index.php" style=" font-family: BellItalica;" class="uk-button uk-button-default uk-flex uk-flex-center" href="">CONOCER MÁS <div class="uk-flex uk-flex-center uk-flex-middle"><i class="fa fa-long-arrow-right flecha"></i></div></a>
                </div>
            </div>
        </section>
        <div class="uk-text-center container-formulario" uk-grid>
            <div class="uk-width-1-5@m"></div>
            <div class="uk-width-expand@m">
                <h5 style=" font-family: BellItalica;">Con la finalidad mantener un ambiente de paz y armonía, y cumplir con el seguimiento de nuestros usuarios, dejamos a su disposición el siguiente reporte de incidencias, en caso de percibir un problema que pueda ocasionar daños a la integridad humana o propiedad. </h5>

                    <form class="form" name="formulario" action="#my-form" method="post" id="my-form" enctype="multipart/form-data">
                        <div class="uk-flex uk-flex-center contenido"   uk-grid>
                            <div class="uk-width-1-1@m">
                                <h1>REPORTE DE INCIDENCIAS</h1>
                            </div>
                            <div class="uk-width-1-1@m">
                                <h3>DATOS DE LA PERSONA</h3>
                            </div>
                            <div class="uk-width-1-1 input">
                                <label for="nombre" class="uk-flex uk-flex-left">NOMBRE</label>
                                <input class="uk-input" name="name" type="text">
                            </div>

                            <input style="display: none;" name="firstname" type="text" id="firstname" class="hide-robot">

                            <div class="uk-width-1-2@s input">
                                <label for="marca" class="uk-flex uk-flex-left">CASA</label>  
                                <input class="uk-input" name="marca" type="text">
                            </div>

                            <div class="uk-width-1-2@s input">
                                <label for="phone" class="uk-flex uk-flex-left">NÚMERO TELEFÓNICO</label>
                                <input class="uk-input" name="phone" type="text">
                            </div>

                            <div class="uk-width-1-1@m">
                                <h3>DESCRIPCIÓN DEL INCIDENTE</h3>
                            </div>

                            <div class="uk-width-1-2@s">
                                <div class="uk-text-center" uk-grid>
                                    <div class="uk-width-1-1@m descripcion">
                                        <div class="uk-width-1-1@s">
                                            <label for="mail" class="uk-flex uk-flex-left">FECHA</label>
                                            <input class="uk-input" name="mail" type="text">
                                        </div>

                                        <div class="uk-width-1-1@s">
                                            <label for="modelo" class="uk-flex uk-flex-left">LUGAR</label>
                                            <input class="uk-input" name="modelo" type="text">
                                        </div>

                                        <div class="uk-width-1-1@s">
                                            <label for="km" class="uk-flex uk-flex-left">HORA</label>
                                            <input class="uk-input" name="km" type="text">
                                        </div>

                                        <div class="uk-width-1-1@s">
                                            <label for="ano" class="uk-flex uk-flex-left">¿NOTIFICÓ A SEGURIDAD?</label>
                                            <input class="uk-input" name="ano" type="text">
                                        </div>
                                        
                                        <div class="uk-width-1-1@s">
                                            <label for="mensaje" class="uk-flex uk-flex-left">CAUSAS DEL INCIDENTE</label>
                                            <input class="uk-input" name="mensaje" type="text">
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="uk-width-1-2@s">
                                <div class="uk-text-center" uk-grid>
                                    <div class="uk-width-1-1@m">
                                    <!-- Falta agregalos al php mailer -->
                                        <div class="uk-margin detalle">
                                            <label for="describa" class="uk-flex uk-flex-left">DESCRIBA CON DETALLE EL PROBLEMA</label>
                                            <textarea name="describa" class="uk-textarea" rows="5"></textarea>
                                        </div>

                                        <label class="label" for="foto1" class="uk-flex uk-flex-left">ADJUNTE IMAGEN COMO EVIDENCIA</label>
                                        <div class="uk-margin adjunte">
                                            <input type="file" name="files[]" style="font-size: 1em" size="40" accept=".JPG,.PNG" multiple>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- Falta agregalos al php mailer -->
                            <div class="uk-width-1-1 input">
                                <label for="comentarios" class="uk-flex uk-flex-left">COMENTARIOS ADICIONALES</label>
                                <input name="comentarios" class="uk-input" type="text">
                            </div>
                        
                        </div>

                        <div uk-margin>
                            <div class="g-recaptcha" data-sitekey="6LeEsBIgAAAAABeVbHfZjqNIdFzoEG9cMKGqJ2kY" ></div>
                        </div>

                        <p class="boton" uk-margin>
                            <button type="submit" class="uk-button uk-button-large">ENVIAR</button>
                        </p>
                    </form>

            </div>
            <div class="uk-width-1-5@m"></div>
        </div>
    </main>

    <?php include './vistas/footer2.php';?>

    <!-- UIkit CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.13.7/dist/css/uikit.min.css" />

<!-- UIkit JS -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.13.7/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.13.7/dist/js/uikit-icons.min.js"></script>

<!-- Recapchar -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

</body>
</html>