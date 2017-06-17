<?php

    /**
     * Created by PhpStorm.
     * User: claudio
     * Date: 17/06/17
     * Time: 16:24
     */

    require_once("configuracao.php");
    require_once("acesso.php");
    require_once("cabecalho.php");
    require_once("bootstrap.php");

    require_once("lib_phpmailer/PHPMailerAutoload.php");

    $nome = $_POST["nome"] ?? '';
    $email = $_POST["email"] ?? '';
    $mensagem = $_POST["mensagem"] ?? '';


    $mail = new PHPMailer();
    $mail->isSMTP();

    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->SMTPSecure = "tls";
    $mail->SMTPAuth = true;
    $mail->Username = "caelum.php.e.mysql@gmail.com";
    $mail->Password = "123456";

    $mail->setFrom("loja@gmail.com", "Loja de produtos");
    $mail->addAddress("caelum.php.e.mysql@gmail.com");
    $mail->Subject = "Email de contato da loja";
    $mail->msgHTML("<html>De: {$nome}<br />email: {$email}<br /> mensagem: {$mensagem}</html>");
    $mail->AltBody = "de: {$nome}\nemail:{$email}\nmensagem: {$mensagem}";

    if($mail->send()){
        alert_success("Obrigado por enviar sua mesnagem! Daqui a um ano retornaremos o contato algum dia! Seja positivo!");
    }else{
        alert_danger("Infelizmente não foi possível enviar email pois não temos smtp, então faça o favor de não perturbar. Obrigado");
    }

    require_once("rodape.php");
?>




