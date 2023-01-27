<?php
extract($_POST);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

    if(isset($_POST["enviar"])) {
  
      // reCAPTCHA validation
      if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {

          // Google secret API
          $secretAPIkey = '6LdorushAAAAAHMAOEnN-14wF1vaoXsvt63KdoZw';

          // reCAPTCHA response verification
          $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretAPIkey.'&response='.$_POST['g-recaptcha-response']);

          // Decode JSON data
          $response = json_decode($verifyResponse);

              if($response->success){

                try {
                  //Server settings
                  //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                  $mail->isSMTP();                                            //Send using SMTP
                  $mail->isMail();                       //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`;
                  $mail->CharSet = 'UTF-8';
              
                  //Recipients
                  $mail->setFrom($correo, $nombre.' '. $apellidos); 
                  $mail->addAddress('katia.huerta@ignilytic.com', 'Ignilytic');     //Add a recipient   
              
                  //Content
                  $mail->isHTML(true);                                  //Set email format to HTML
                  $mail->Subject = 'Solicitud de informacion';
                  $mail->Body    = '<b>Hola mi nombre es:</b> '.ucfirst($nombre).' '.ucfirst($apellidos).'
                                    <br><b>Mi correo es:</b> '.$correo.'
                                    <br><b>Mi teléfono para contacto:</b> '.$telefono.'
                                    <br><b>Servicio:</b> '.$servicio.'
                                    <br><b>Mensaje:</b> '.ucfirst($mensaje);    
              
                  $mail->send();
                  $response = array(
                    "status" => "alert-success",
                    "message" => "Mensaje Enviado."
                );
              
              } catch (Exception $e) {
                  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
              }
                  
              } else {
                  $response = array(
                      "status" => "alert-danger",
                      "message" => "La verificación del robot falló, inténtalo de nuevo."
                  );
              }       
      } else{ 
          $response = array(
              "status" => "alert-danger",
              "message" => "Por favor marque la casilla reCAPTCHA."
          );
      } 
    }  
?>


<section class="contacto">
  <div class="general__titulo"><h1>Contacto</h1></div>
  <div class="contacto__info">Comunícate con nosotros para que podamos atender tu solicitud, por favor llena el siguiente formulario</div>

  <div class="contacto__wrapper general__card">
    <!-- Error messages -->
    <?php if(!empty($response)) {?>
      <div class="form-group col-12 text-center">
        <div class="alert text-center <?php echo $response['status']; ?>">
          <?php echo $response['message']; ?>
        </div>
      </div>
    <?php }?>
    <form class="row g-3 needs-validation" method="post" action="" autocomplete="off" novalidate>
      <div class="mb-3">
        <label for="validationNombre" class="form-label">Nombre contacto</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
        <div class="valid-feedback">Campo correcto</div>
        <div class="invalid-feedback">Campo obligatorio</div>
      </div>
      <div class="mb-3">
        <label for="validationCorreo" class="form-label">Correo electrónico</label>
        <input type="email" class="form-control" id="correo" name="correo" placeholder="name@example.com" required>
        <div class="valid-feedback">Campo correcto</div>
        <div class="invalid-feedback">Campo obligatorio</div>
      </div>
      <div class="mb-3">
        <label for="validationTelefono" class="form-label">Teléfono contacto</label>
        <input type="text" class="form-control" id="telefono" name="telefono" pattern="[0-9]+" maxlength="10" onkeypress="return valideKey(event);" required>
        <div class="valid-feedback">Campo correcto</div>
        <div class="invalid-feedback">Campo obligatorio</div>
      </div>
      <div class="mb-3">
        <label for="validationServicio" class="form-label">Tipo servicio</label>
        <select class="form-select" id="servicio" name="servicio" required>
          <option selected disabled value="">-- Seleccione --</option>
          <option>Páginas web</option>
          <option>Reparación de equipos</option>
          <option>Póliza de soporte técnico</option>
          <option>Diseño grafico</option>
          <option>Software personalizado</option>
        </select>
        <div class="valid-feedback">Campo correcto</div>
        <div class="invalid-feedback">Campo obligatorio</div>
      </div>
      <div class="mb-3">
        <label for="validationMensaje" class="form-label">Mensaje</label>
        <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required></textarea>
        <div class="valid-feedback">Campo correcto</div>
        <div class="invalid-feedback">Campo obligatorio</div>
      </div>

      <div class="mb-3 recaptch__alinear" >
        <!-- Google reCAPTCHA block -->
        <div class="g-recaptcha" data-sitekey="6LdorushAAAAAFKOAEb65swr5HnXNHy9FuZ27Ey0"></div>
        <br/>
      </div>

      <div class="col-12">
        <button class="btn btn-primary" name="enviar" id="enviar" type="submit">Enviar</button>
      </div>
    </form>

  </div>
</section>

  <!-- Google reCaptcha -->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

<script>
  (() => {
    'use strict'
    const forms = document.querySelectorAll('.needs-validation')
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, false)
    })
  })()
</script>

<script type="text/javascript">
function valideKey(evt){
    // code is the decimal ASCII representation of the pressed key.
    var code = (evt.which) ? evt.which : evt.keyCode;
    
    if(code==8) { // backspace.
      return true;
    } else if(code>=48 && code<=57) { // is a number.
      return true;
    } else{ // other keys.
      return false;
    }
}
</script> 