<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require '../PHPMailer/PHPMailer/src/Exception.php';
require '../PHPMailer/PHPMailer/src/PHPMailer.php';
require '../PHPMailer/PHPMailer/src/SMTP.php';

define("USERNAME", 'eric.gbekor@ashesi.edu.gh');
define("PASSWORD", 'goodthings20');

//$opt = $_REQUEST['option'];
//switch ($opt) {
//
//    case 1:
//        staffFollowup();
//        break;
//    case 3:
//        requestConfirmation();
//        break;
//    case 2:
//        staffThankYou();
//        break;
//    default:;
//        break;
//}

class mail
{
    //Email sent after request is received
    function requestConfirmation($userEmail, $requestid, $name)
    {
        $mail = new PHPMailer(true);
        try {

            $mail->SMTPDebug = 3; // Enable verbose debug output
            $mail->isSMTP();
            $mail->Host = 'smtp.office365.com'; // Specify main and backup SMTP servers
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = USERNAME; // SMTP username
            $mail->Password = PASSWORD; // SMTP password
            $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;
            $mail->SetFrom(USERNAME, 'CS LAB');
            $mail->addAddress($userEmail);

            $mail->IsHTML(true);

            $mail->Subject = 'Confirmation of Request Receipt';
            $mail->Body = "
        <p>Dear " . $name . ", </p>

        <p>Thank you for your request to the Ashesi University's Computer Science Lab.</br>
        Your request with ID <strong>&quot;" . $requestid . "&quot; </strong> is pending approval.</br>
        You will be notified when approval process is completed <span style='color:red'> within two weeks</span> following its review.</p>

        <p>Use the request id <strong>&quot;" . $requestid . "&quot;</strong> to check status of request.</p> </br>

        <p>
        Regards,<br>
        CS Dept<br>
        CS Lab Inventory
        </p>

        <p style='font-size:12px; font-style:italic'>
        <strong>Notice of Confidentiality</strong> <br>
        The content of this email may be privileged and are confidential.<br>
        It may not be disclosed to or used by anyone other than the intended person, nor copied in any way.<br>
        <span style='color:red'>If received in error</span>, please notify the sender and then delete it from your system. <br>
        Thank you.
        </p>
        ";

            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }

    }


    //Email sent after request is approved
    function approveRequestMail($userEmail, $requestid, $name)
    {
        $mail = new PHPMailer(true);
        try {

            $mail->SMTPDebug = 3; // Enable verbose debug output
            $mail->isSMTP();
            $mail->Host = 'smtp.office365.com'; // Specify main and backup SMTP servers
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = USERNAME; // SMTP username
            $mail->Password = PASSWORD; // SMTP password
            $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;
            $mail->SetFrom(USERNAME, 'CS LAB');
            $mail->addAddress($userEmail);

            $mail->IsHTML(true);

            $mail->Subject = 'Confirmation of Request Approval';
            $mail->Body = "
        <p>Dear " . $name . ", </p>

        <p>Thank you for your request to the Ashesi University's Computer Science Lab.</br>
        Your request with ID <strong>&quot;" . $requestid . "&quot; </strong> has been approved.</br>
        <p>Use the request id <strong>&quot;" . $requestid  . "&quot;</strong> to check out your item from the Lab Coordinator.</p> </br>

        <p>
        Regards,<br>
        CS Dept<br>
        CS Lab Inventory
        </p>

        <p style='font-size:12px; font-style:italic'>
        <strong>Notice of Confidentiality</strong> <br>
        The content of this email may be privileged and are confidential.<br>
        It may not be disclosed to or used by anyone other than the intended person, nor copied in any way.<br>
        <span style='color:red'>If received in error</span>, please notify the sender and then delete it from your system. <br>
        Thank you.
        </p>
        ";

            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }

    }


    //Email sent after request is declined
    function declineRequestMail($userEmail, $requestid, $name)
    {
        $mail = new PHPMailer(true);
        try {

            $mail->SMTPDebug = 3; // Enable verbose debug output
            $mail->isSMTP();
            $mail->Host = 'smtp.office365.com'; // Specify main and backup SMTP servers
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = USERNAME; // SMTP username
            $mail->Password = PASSWORD; // SMTP password
            $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;
            $mail->SetFrom(USERNAME, 'CS LAB');
            $mail->addAddress($userEmail);

            $mail->IsHTML(true);

            $mail->Subject = 'Request Declined';
            $mail->Body = "
        <p>Dear " . $name . ", </p>

        <p>Thank you for your request to the Ashesi University's Computer Science Lab.</br>
        Unfortunatey, your request with ID <strong>&quot;" . $requestid . "&quot; </strong> has been declined.</br>
        Sorry for any inconveniences caused.</p></br>

        <p>
        Regards,<br>
        CS Dept<br>
        CS Lab Inventory
        </p>

        <p style='font-size:12px; font-style:italic'>
        <strong>Notice of Confidentiality</strong> <br>
        The content of this email may be privileged and are confidential.<br>
        It may not be disclosed to or used by anyone other than the intended person, nor copied in any way.<br>
        <span style='color:red'>If received in error</span>, please notify the sender and then delete it from your system. <br>
        Thank you.
        </p>
        ";

            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }

    }


}