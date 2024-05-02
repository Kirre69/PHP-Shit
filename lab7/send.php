<?php
include('template.php');
if ((isset($_POST) && isset($_POST['name'])) && isset($_POST['msg'])) {
    $name = htmlspecialchars($_POST["name"]);
    $msg = htmlspecialchars($_POST["msg"]);
    $content = <<<END
    <h3>Message was sent:</h3>
    <p>Name: {$_POST{"name"}}</p>
    <br>
    <p>Message: {$_POST{"msg"}}</p>
END;
    $to = "kridan23@student.hh.se";
    $subject = "Test-mail";
    $message = $_POST["msg"];
    $headers = "From: " . $_POST["name"];
    mail($to, $subject, $message, $headers);

echo $navigation;
echo $content;
echo $foot;}
else {
    echo $what;
    echo $foot;
}
?>