<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';

class Mailer {

    private $db;
    private $configs;

    public function __construct($db, $configs) {
        $this->db = $db;
        $this->configs = $configs;
    }

 
    function sendActivation($user, $email, $token) {
        $mail = new PHPMailer;
        $mail->setFrom($this->configs->getConfig('EMAIL_FROM_ADDR'), $this->configs->getConfig('EMAIL_FROM_NAME')); 
        $mail->Subject = $this->configs->getConfig('SITE_NAME') . " - Ative sua conta!";
        $sendto = $user;
        $mail->addAddress($email, $sendto);
        $mail->Body = $user . ",\n\n"
                . "Bem vindo(a)! Você acabou de se registrar em " . $this->configs->getConfig('SITE_NAME') . " "
                . "com o seguinte nome de usuário:\n\n"
                . "Usuário: " . $user . "\n\n"
                . "Por favor, acesse o seguinte link para ativar sua conta: "
                . $this->configs->loginPage()."?mode=activate&user=" . urlencode($user) . "&activatecode=" . $token . "#activate \n\n"
                . $this->configs->getConfig('SITE_NAME');
        return $mail->send();
    }
 
    function adminActivation($user, $email) {
        $mail = new PHPMailer;
        $mail->setFrom($this->configs->getConfig('EMAIL_FROM_ADDR'), $this->configs->getConfig('EMAIL_FROM_NAME'));
        $mail->Subject = $this->configs->getConfig('SITE_NAME') . " - Bem vindo(a)!";
        $sendto = $user;
        $mail->addAddress($email, $sendto);
        $mail->Body = $user . ",\n\n"
                . "Bem vindo(a)! Você acabou de se registrar em " . $this->configs->getConfig('SITE_NAME') . " "
                . "com o seguinte nome de usuário:\n\n"
                . "Usuário: " . $user . "\n\n"
                . "Sua conta está inativa no momento e precisará ser aprovada por um administrador. "
                . "Outro e-mail será enviado quando isso ocorrer.\n\n"
                . "Obrigado por se registrar.\n\n"
                . $this->configs->getConfig('SITE_NAME');
        return $mail->send();
    }

 
    function activateByAdmin($user, $email, $token) {
        $mail = new PHPMailer;
        $mail->setFrom($email,$user);
        $mail->Subject = $this->configs->getConfig('SITE_NAME') . " - Ativação de conta!";
        $adminemail = $this->configs->getConfig('EMAIL_FROM_ADDR');
        $sendto = $adminemail;
        $mail->addAddress($adminemail, $sendto);
        $mail->Body = "Olá Admin,\n\n"
                . $user . " acaba de se registrar em " . $this->configs->getConfig('SITE_NAME')
                . " com os seguintes detalhes:\n\n"
                . "Usuário: " . $user . "\n"
                . "E-mail: " . $email . "\n\n"
                . "Você deve verificar esta conta e, se necessário, ativá-la. \n\n"
                . "Use este link para ativar a conta ou visite o painel de administração.\n\n"
                . $this->configs->loginPage()."?mode=activate&user=" . urlencode($user) . "&activatecode=" . $token . "#activate \n\n"
                . "Obrigado.\n\n"
                . $this->configs->getConfig('SITE_NAME');
        return $mail->send();
    }

 
    function adminActivated($user, $email) {
        $mail = new PHPMailer;
        $mail->setFrom($this->configs->getConfig('EMAIL_FROM_ADDR'), $this->configs->getConfig('EMAIL_FROM_NAME'));
        $mail->Subject = $this->configs->getConfig('SITE_NAME') . " - Conta Ativada!";
        $sendto = $email;
        $mail->addAddress($email, $sendto);
        $mail->Body = $user . ",\n\n"
                . "Bem vindo(a)! Você acabou de se registrar em " . $this->configs->getConfig('SITE_NAME') . " "
                . "com o seguinte nome de usuário:\n\n"
                . "Usuário: " . $user . "\n\n"
                . "Sua conta já foi ativada. "
                . "Por favor clique aqui para entrar - "
                . $this->configs->loginPage() . "\n\nObrigado por se registrar.\n\n"
                . $this->configs->getConfig('SITE_NAME');
        return $mail->send();
    }

 
    function sendWelcome($user, $email) {
        $mail = new PHPMailer;
        $mail->setFrom($this->configs->getConfig('EMAIL_FROM_ADDR'), $this->configs->getConfig('EMAIL_FROM_NAME'));     
        $mail->Subject = $this->configs->getConfig('SITE_NAME') . " - Bem vindo(a)!";
        $sendto = $email;
        $mail->addAddress($email, $sendto);
        $mail->Body = $user . ",\n\n"
                . "Bem vindo(a)! Você acabou de se registrar em " . $this->configs->getConfig('SITE_NAME') . " "
                . "com as seguintes informações:\n\n"
                . "Usuário: " . $user . "\n\n" 
                . "Obrigado por se registrar!\n\n"
                . $this->configs->getConfig('SITE_NAME');
        return $mail->send();
    }
    
 
    function sendPassLink($user, $email, $templink) {
        $mail = new PHPMailer;
        $mail->setFrom($this->configs->getConfig('EMAIL_FROM_ADDR'), $this->configs->getConfig('EMAIL_FROM_NAME'));
        $mail->Subject = $this->configs->getConfig('SITE_NAME') . " - Redefinir sua senha";
        $sendto = $email;
        $mail->addAddress($email, $sendto);
        $mail->Body = "Olá " .$user . ",\n\n"
                . "Alguém solicitou recentemente uma alteração de senha para sua conta em ".$this->configs->getConfig('SITE_NAME').". \n\n"
                . "Se isso foi solicitado por você, você pode redefinir sua senha clicando no botão abaixo que expira em 2 horas. \n\n"
                . $this->configs->getConfig('WEB_ROOT')."pwreset.php?key=". $templink ."  \n\n"
                . "Obrigado! \n\n"
                . $this->configs->getConfig('SITE_NAME')." \n\n";
        return $mail->send();
    }

}
