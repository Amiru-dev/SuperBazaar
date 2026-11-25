<?php

include_once __DIR__ . "/../includes/connection.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../vendor/phpmailer/Exception.php';
require __DIR__ . '/../vendor/phpmailer/PHPMailer.php';
require __DIR__ . '/../vendor/phpmailer/SMTP.php';

$email = $_POST["e"];
$vcode = uniqid();

$rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $email . "'");
$num = $rs->num_rows;

if ($num > 0) {
    // user found
    Database::iud("UPDATE `user` SET `v_code` = '" . $vcode . "' WHERE `email` = '" . $email . "'");

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = SMTP_HOST;                                    //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                     //Enable SMTP authentication
        $mail->Username = SMTP_USER;                                //SMTP username
        $mail->Password = SMTP_PASS;                                //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = SMTP_PORT;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom(SMTP_USER, 'SuperBazaar');
        $mail->addAddress($email);     //Add a recipient
        $mail->addReplyTo('info@example.com', 'Information');

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Reset your account password';
        $mail->Body = '<table style="width: 100%;">
        <tbody>
            <tr>
                <td align="center">
                    <table style="max-width: 800px;">
                        <tr>
                            <td align="center">
                                <a href="#"
                                    style="font-size: 40px; font-weight: bold; color: black; text-decoration: none;">SuperBazaar</a>
                                <hr>
                            </td>
                        </tr>
    
                        <tr>
                            <td>
                                <h1 style="font-size: 25px; line-height: 45px; font-weight: 600;" align="center">Reset
                                    Your Password</h1>
                                <p style="margin-bottom: 24px;" align="center">You can change your password by clicking the button below.
                                </p>
                                <div>
                                    <a href="http://localhost/SuperBazaar/resetPassword.php?vcode=' . $vcode . '"
                                        style="text-decoration: none; display: inline-block; border-radius: 8px; background-color: blue; color: white; padding: 15px; margin-left: 30%; font-weight: 600">
                                        <span>Reset Password</span>
                                    </a>
                                </div>
                                <div>
                                    <img src="https://scontent.xx.fbcdn.net/v/t39.30808-6/306753727_143320678408497_8267722658787640596_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeGkMzHcFO0E4kvRf8nCeBmIfuTqtWGLlCl-5Oq1YYuUKQA344oDjW_AKemnFHJioHIoJ0HyWQ4MivhtSqSPfcXF&_nc_ohc=YxYtqFbFsTYQ7kNvgE0s46x&_nc_ht=scontent.xx&oh=00_AYAIwueHXY2Uh2Y662VlfyZytbtf6umR93B1XVTG3hs_AA&oe=66671813"
                                        style="max-width: 500px; max-height: 400px; margin-left: 20%; margin-top: 7%;">
    
                                </div>
    
                                <p style="margin-top: 24px;">If you didn\'t ask to reset your password, you can ignore this
                                    email.</p>
                                <hr>
                            </td>
                        </tr>
    
                        <tr>
                            <td align="center">
                                <p style="font-weight: 600;">&copy; 2024 SuperBazaar.lk || All Rights Reserved</p>
                            </td>
                        </tr>
    
                    </table>
                </td>
            </tr>
        </tbody>
    
    </table>';

        $mail->send();
        echo ("Success");

    } catch (Exception $email) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

} else {
    // user not found
    echo ("fail");
}
?>