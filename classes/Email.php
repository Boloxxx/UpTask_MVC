<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email
{

    protected $email;
    protected $nombre;
    protected $token;

    public function __construct($email, $nombre, $token)
    {

        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;

    }

    public function enviarConfirmacion()
    {

        // Crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = '2525';
        $mail->Username = '7dce1c233ceb16';
        $mail->Password = 'f9afc0c0229d27';

        $mail->setFrom('cuentas@uptask.com');
        $mail->addAddress('cuentas@uptask.com', 'Uptask.com');
        $mail->Subject = 'Confirma tu cuenta';

        // Set HTML
        $mail->isHTML(TRUE);
         $mail->CharSet = 'UTF-8';

         $contenido = '<html>';
         $contenido .= "<p><strong>Hola " . $this->nombre .  "</strong> Has Creado tu cuenta en UpTask, solo debes confirmarla presionando el siguiente enlace</p>";
         $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/confirmar?token=" . $this->token . "'>Confirmar Cuenta</a>";        
         $contenido .= "<p>Si tu no solicitaste este cambio, puedes ignorar el mensaje</p>";
         $contenido .= '</html>';
         $mail->Body = $contenido;

         //Enviar el mail
         $mail->send();
    }

    public function enviarInstrucciones() {
         // Crear el objeto de email
         $mail = new PHPMailer();
         $mail->isSMTP();
         $mail->Host = 'sandbox.smtp.mailtrap.io';
         $mail->SMTPAuth = true;
         $mail->Port = '2525';
         $mail->Username = '7dce1c233ceb16';
         $mail->Password = 'f9afc0c0229d27';
 
         $mail->setFrom('cuentas@uptask.com');
         $mail->addAddress('cuentas@task.com', 'Uptask.com');
         $mail->Subject = 'Reestablece tu Password';
 
         // Set HTML
         $mail->isHTML(TRUE);
          $mail->CharSet = 'UTF-8';
 
          $contenido = '<html>';
          $contenido .= "<p><strong>Hola " . $this->nombre .  "</strong> Has Solicitado reestablecer tu password sigue el siguiente enlace para hacerlo.</p>";
          $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/reestablecer?token=" . $this->token . "'>Reestablecer Password</a>";        
          $contenido .= "<p>Si tu no solicitaste este cambio, puedes ignorar el mensaje</p>";
          $contenido .= '</html>';
          $mail->Body = $contenido;
 
          //Enviar el mail
          $mail->send();
     }
    }