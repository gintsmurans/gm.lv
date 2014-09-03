<?php

if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

$name       = $_POST['name'];
$email      = $_POST['email'];
$text    = $_POST['text'];
$error      = '';

$address = "gm@gm.lv";

$e_subject = "New message from {$name}";

$e_body = "You have a new message from: $name" . PHP_EOL . PHP_EOL;
$e_content = $text . PHP_EOL . PHP_EOL;
$e_reply = "You can contact $name via email: $email";

$msg = wordwrap($e_body . $e_content . $e_reply, 70);

$headers = "From: $email" . PHP_EOL;
$headers .= "Reply-To: $email" . PHP_EOL;
$headers .= "MIME-Version: 1.0" . PHP_EOL;
$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

if (mail($address, $e_subject, $msg, $headers))
{
    echo '<div class="success-msg" style="font-family: Courier New, Arial, Verdana;">
        <span class="icon-info-2"></span>
        Hello, '.$name.'.<br>
        Your message has been sent successfully.<br>
        I will contact you soon!
    </div>';
}
else
{
    echo '<div style="font-family: Courier New, Arial, Verdana; color: red;">ERROR! Your message could not be sent.</div>';
}

?>