<?php
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    $to = "rostiksmoliar@gmail.com"; 
    $subject = "Новое сообщение с лендинга";
    $body = "Имя: $name\nEmail: $email\nСообщение:\n$message";

    $headers = "From: $email\r\nReply-To: $email\r\nContent-Type: text/plain; charset=UTF-8\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo json_encode(["status" => "success", "message" => "Ваше сообщение успешно отправлено!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Ошибка при отправке сообщения. Попробуйте снова."]);
    }
}
?>