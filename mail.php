<?php
session_start();
// Generate CSRF token
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use ElliotJReed\DisposableEmail\DisposableEmail;
use Dotenv\Dotenv;

//Load Composer's autoloader (created by composer, not included with PHPMailer)
require './vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$form_csrf_token = isset($_POST['csrf_token']) ? $_POST['csrf_token'] : '';
$session_csrf_token = isset($_SESSION['csrf_token']) ? $_SESSION['csrf_token'] : '';

if (!isset($form_csrf_token) || $form_csrf_token !== $session_csrf_token) {
  echo json_encode([
    'success' => false,
    'message' => 'Something went wrong, please try again later!'
  ]);
  exit;
} else {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // define variables and set to empty values
    $name = isset($_POST["name"]) ? $_POST["name"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $subject = isset($_POST["subject"]) ? $_POST["subject"] : "";
    $message = isset($_POST["message"]) ? $_POST["message"] : "";
    $errors = [];

    function test_input($data)
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    if (empty($name)) {
      $errors['name'] = "Full name is required";
    } else {
      $name = test_input($name);
    }

    if (empty($email)) {
      $errors['email'] = "Email address is required";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) || DisposableEmail::isDisposable($email)) {
      $errors['email'] = "Invalid email address";
    } else {
      $email = test_input($email);
    }

    if (empty($subject)) {
      $errors['subject'] = "Subject is required";
    } else {
      $subject = test_input($subject);
    }

    if (empty($message)) {
      $errors['message'] = "Message is required";
    } else {
      $message = test_input($message);
    }

    if (!$errors) {
      try {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
        //Server settings
        $mail->SMTPDebug = $_ENV['SMTP_DEBUG'];                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = $_ENV['SMTP_HOST'];                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $_ENV['SMTP_USERNAME'];                     //SMTP username
        $mail->Password   = $_ENV['SMTP_PASSWORD'];                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port = $_ENV['SMTP_PORT'];                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom($_ENV['MAIL_FROM'], $_ENV['MAIL_FROM_NAME']);
        // $mail->addAddress('support@haceneouserir.me', 'Hacene Ouserir');     //Add a recipient
        $mail->addAddress($_ENV['MAIL_ADDRESS']);               //Name is optional
        $mail->addReplyTo($email, $name);
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $message;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo json_encode([
          'success' => true,
          'message' => 'Your message has been sent successfully!'
        ]);
      } catch (Exception $e) {
        // echo json_encode(['success' => false, 'message' => "Mailer Error: {$mail->ErrorInfo}"]);
        echo json_encode([
          'success' => false,
          'message' => 'Your message has not been sent!'
        ]);
      }
    } else {
      echo json_encode([
        'success' => false,
        'errors' => $errors
      ]);
    }
  } else {
    echo json_encode([
      'success' => false,
      'message' => 'Something went wrong, please try again later!'
    ]);
  }
}
