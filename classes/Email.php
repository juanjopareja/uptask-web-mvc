<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {
    public $email;
    public $name;
    public $token;

    public function __construct($email, $name, $token)
    {
        $this->email = $email;
        $this->name = $name;
        $this->token = $token;
    }

    public function sendConfirmation() {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '3a94724a546351';
        $mail->Password = 'a17ac4346082ff';

        $mail->setFrom('cuentas@uptask.com');
        $mail->addAddress('cuentas@uptask.com', 'uptask.com');
        $mail->Subject = 'Confirma tu cuenta';

        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $content = '<html>';
        $content .= "<p><strong>Hola " . $this->name . "</strong>. Has creado tu cuenta en UpTask, solo debes confirmarla en el siguiente enlace</p>";
        $content .= "<p>Presiona aquí: <a href='http://localhost:3000/confirm?token=" . $this->token . "'>Confirmar Cuenta</a></p>";
        $content .= "<p>Si tú no creaste esta cuenta, puedes ignorar este mensaje</p>";
        $content .= '</html>';

        $mail->Body = $content;

        $mail->send();
    }

    public function sendInstructions() {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '3a94724a546351';
        $mail->Password = 'a17ac4346082ff';

        $mail->setFrom('cuentas@uptask.com');
        $mail->addAddress('cuentas@uptask.com', 'uptask.com');
        $mail->Subject = 'Restablece tu contraseña';

        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $content = '<html>';
        $content .= "<p><strong>Hola " . $this->name . "</strong>. Parece que has olvidado tu contraseña en UpTask, sigue el siguiente enlace para recuperarla.</p>";
        $content .= "<p>Presiona aquí: <a href='http://localhost:3000/restore?token=" . $this->token . "'>Restablecer contraseña</a></p>";
        $content .= "<p>Si tú no creaste esta cuenta, puedes ignorar este mensaje</p>";
        $content .= '</html>';

        $mail->Body = $content;

        $mail->send();
    }
}