<?php
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';
$bookName = $_POST['bookName'];
$name = $_POST['username'];
$email = $_POST['email'];
$note = $_POST['note'];
$today = date("Y-m-d H:i:s");
$title = "Заказ книги";
$body = "
<h2>Данные по заказу</h2>
<b>Название заказа</b> $bookName<br>
<b>Имя покупателя:</b> $name<br>
<b>Почта покупателя:</b> $email<br>
<b>Заказ был совершен</b> $today<br>
<b>Примечание к заказу:</b><br>$note
";

//Отправка покупателю
//$mailToBuyer = mail($email,'Заказ книги', $body);
//echo $mailToBuyer;

$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth = true;
    $mail->SMTPDebug = 2;
    $mail->Debugoutput = function ($str, $level) {
        $GLOBALS['status'][] = $str;
    };
    $mail->Host = 'smtp.mail.ru'; // SMTP сервера вашей почты
    $mail->Username = 'paid_programming@mail.ru'; // Логин на почте
    $mail->Password = '03062002php'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('paid_programming@mail.ru', 'Админ'); // Адрес самой почты и имя отправителя
    $mail->addAddress('paid_programming2@mail.ru');
    if (!empty($file['name'][0])) {
        for ($ct = 0; $ct < count($file['tmp_name']); $ct++) {
            $uploadfile = tempnam(sys_get_temp_dir(), sha1($file['name'][$ct]));
            $filename = $file['name'][$ct];
            if (move_uploaded_file($file['tmp_name'][$ct], $uploadfile)) {
                $mail->addAttachment($uploadfile, $filename);
                $rfile[] = "Файл $filename прикреплён";
            } else {
                $rfile[] = "Не удалось прикрепить файл $filename";
            }
        }
    }
    $mail->isHTML(true);
    $mail->Subject = $title;
    $mail->Body = $body;
    if ($mail->send()) {
        $result = "success";
    } else {
        $result = "error";
    }
} catch (Exception $e) {
    $result = "error";
    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}
echo json_encode(["result" => $result, "resultfile" => $rfile, "status" => $status]);