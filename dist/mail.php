<?php
/**
 * Created by PhpStorm.
 * User: evd1ser
 * Date: 2019-01-31
 * Time: 15:35
 */

require_once ('PHPMailer/PHPMailer.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$recepient = "sale@choosedesign.ru";
$sitename = "choose";




$name = null;
$phone = null;
$email = null;
$selected = null;

if (isset($_POST["name"])) {
  $name = trim($_POST["name"]);
}
if (isset($_POST["telephone"])) {
  $phone = trim($_POST["telephone"]);
}
if (isset($_POST["description"])) {
  $desc = trim($_POST["description"]);
}



if ($phone && $name) {
  $pagetitle = "Новая заявка с сайта \"$sitename\"";
  $message = "Новая заявка с сайта - $sitename \n\n\n
  Имя: $name \n
  Телефон: $phone \n
  Описание - $desc ";


    $email = new PHPMailer();
    $email->SetFrom('webmaster@choosedesign.ru', 'Choose Design');
    $email->Subject   = $pagetitle;
    $email->Body      = $message;
    $email->AddAddress( $recepient);


    if(!empty($_FILES['file']['tmp_name'])){
        $email->addAttachment($_FILES['file']['tmp_name'], $_FILES['file']['name']);
    }

    $email->Send();

    header("Location: https://choosedesign.ru/#contacts");

//  mail($recepient, $pagetitle, $message, "Content-type: text/plain; charset=\"utf-8\"\n From: $recepient");

//  $data = array(
//    'name' => urldecode($_POST['name']),
//    //  'email' => $mail,
//    'phone' => urldecode($_POST['telephone']),
//    'realSource' => urldecode($_SERVER['SCRIPT_FILENAME'])
//  );
//
//  $fd = fopen("saveData.txt", 'a') or die("не удалось создать файл");
//  fwrite($fd, implode("::", $data) . PHP_EOL);
//  fclose($fd);
} else {
  http_response_code(404);
  echo '404';
  die();
}
