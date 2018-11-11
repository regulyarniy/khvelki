<?php 
// load PHPmailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// load composer dependencies
require_once 'vendor/autoload.php';

// get login and pass for gmail
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();
$LOGIN = getenv('LOGIN');
$PASS = getenv('PASS');
$TO = getenv('TO');

//get time
date_default_timezone_set('Asia/Vladivostok');
$date = date('d/m/Y H:i:s a', time());

// getting order number and incrementing
if (file_exists('orders.txt')) {
    $content = file('orders.txt'); // reading all lines into array
    $upvotes = intval($content[0]) + 1; // getting first line
    file_put_contents('orders.txt', $upvotes); // writing data
} else {
    $upvotes = 'NaN';
}

//send email
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = $LOGIN;                 // SMTP username
    $mail->Password = $PASS;                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
	
	$mail->CharSet = 'UTF-8';
	
    //Recipients
    $mail->setFrom($LOGIN, 'Интернет магазин khvelki.ru');
    $mail->addAddress($TO);     // Add a recipient
    $mail->addAddress($LOGIN);     // Add a recipient
    $mail->addReplyTo($LOGIN, 'Интернет магазин khvelki.ru');

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'khvelki Новый заказ №'.$upvotes;
    // Template https://mjml.io/try-it-live/H1gEDdrTX
    $mail->Body    = '
    <!doctype html><html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><head><title></title><!--[if !mso]><!-- --><meta http-equiv="X-UA-Compatible" content="IE=edge"><!--<![endif]--><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1"><style type="text/css">#outlook a { padding:0; }
              .ReadMsgBody { width:100%; }
              .ExternalClass { width:100%; }
              .ExternalClass * { line-height:100%; }
              body { margin:0;padding:0;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%; }
              table, td { border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt; }
              img { border:0;height:auto;line-height:100%; outline:none;text-decoration:none;-ms-interpolation-mode:bicubic; }
              p { display:block;margin:13px 0; }</style><!--[if !mso]><!--><style type="text/css">@media only screen and (max-width:480px) {
                @-ms-viewport { width:320px; }
                @viewport { width:320px; }
              }</style><!--<![endif]--><!--[if mso]>
            <xml>
            <o:OfficeDocumentSettings>
              <o:AllowPNG/>
              <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
            </xml>
            <![endif]--><!--[if lte mso 11]>
            <style type="text/css">
              .outlook-group-fix { width:100% !important; }
            </style>
            <![endif]--><!--[if !mso]><!--><link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700" rel="stylesheet" type="text/css"><style type="text/css">@import url(https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700);</style><!--<![endif]--><style type="text/css">@media only screen and (min-width:480px) {
            .mj-column-per-100 { width:100% !important; max-width: 100%; }
          }</style><style type="text/css"></style></head><body><div><!--[if mso | IE]><table align="center" border="0" cellpadding="0" cellspacing="0" class="" style="width:600px;" width="600" ><tr><td style="line-height:0px;font-size:0px;mso-line-height-rule:exactly;"><![endif]--><div style="Margin:0px auto;max-width:600px;"><table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="width:100%;"><tbody><tr><td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;vertical-align:top;"><!--[if mso | IE]><table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td class="" style="vertical-align:top;width:600px;" ><![endif]--><div class="mj-column-per-100 outlook-group-fix" style="font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;"><table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%"><tr><td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;"><div style="font-family:helvetica;font-size:20px;line-height:1;text-align:left;color:#378b29;">Заказ № '.$upvotes.'</div></td></tr><tr><td style="font-size:0px;padding:10px 25px;word-break:break-word;"><p style="border-top:solid 4px #eec23e;font-size:1;margin:0px auto;width:100%;"></p><!--[if mso | IE]><table align="center" border="0" cellpadding="0" cellspacing="0" style="border-top:solid 4px #eec23e;font-size:1;margin:0px auto;width:550px;" role="presentation" width="550px" ><tr><td style="height:0;line-height:0;"> &nbsp;
    </td></tr></table><![endif]--></td></tr><tr><td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;"><table cellpadding="0" cellspacing="0" width="100%" border="0" style="cellspacing:0;color:#000000;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:13px;line-height:22px;table-layout:auto;width:100%;"><tr><td style="padding: 10px; border: 1px solid #1a2f4c">Имя</td><td style="padding: 10px; border: 1px solid #1a2f4c">'.$_POST['name'].'</td></tr><tr><td style="padding: 10px; border: 1px solid #1a2f4c">Телефон</td><td style="padding: 10px; border: 1px solid #1a2f4c">'.$_POST['tel'].'</td></tr><tr><td style="padding: 10px; border: 1px solid #1a2f4c">Адрес</td><td style="padding: 10px; border: 1px solid #1a2f4c">'.$_POST['address'].'</td></tr><tr><td style="padding: 10px; border: 1px solid #1a2f4c">Комментарий</td><td style="padding: 10px; border: 1px solid #1a2f4c">'.$_POST['comment'].'</td></tr><tr><td style="padding: 10px; border: 1px solid #1a2f4c">Товары</td><td style="padding: 10px; border: 1px solid #1a2f4c">'.$_POST['products'].'</td></tr><tr><td style="padding: 10px; border: 1px solid #1a2f4c">Итог (пересчитать!)</td><td style="padding: 10px; border: 1px solid #1a2f4c">'.$_POST['total'].'</td></tr></table></td></tr><tr><td style="font-size:0px;padding:10px 25px;word-break:break-word;"><p style="border-top:solid 4px #eec23e;font-size:1;margin:0px auto;width:100%;"></p><!--[if mso | IE]><table align="center" border="0" cellpadding="0" cellspacing="0" style="border-top:solid 4px #eec23e;font-size:1;margin:0px auto;width:550px;" role="presentation" width="550px" ><tr><td style="height:0;line-height:0;"> &nbsp;
    </td></tr></table><![endif]--></td></tr><tr><td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;"><div style="font-family:helvetica;font-size:16px;line-height:1;text-align:left;color:#111111;">Время: '.$date.'</div></td></tr></table></div><!--[if mso | IE]></td></tr></table><![endif]--></td></tr></tbody></table></div><!--[if mso | IE]></td></tr></table><![endif]--></div></body></html>
    ';
    $mail->AltBody = 'Заказ № '.$upvotes.'/nИмя: '.$_POST['name'].'/nТелефон: '.$_POST['tel'].'/nАдрес: '.$_POST['address'].'/nКомментарий: '.$_POST['comment'].'/nТовары: '.$_POST['products'].'/nИтог(пересчитать!): '.$_POST['total'];

    $mail->send();
    echo '
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Магазин исскуственных ёлок khvelki.ru</title>
      <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
      <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
      <style>
        body {
          background-color: #1a2f4c;
          color: #e9f3fb;
          width: 100vw;
          height: 100vh;
          display: flex;
          justify-content: center;
          align-items: center;
        }
    
        p {
          font-size: 30px;
          line-height: 36px;
          margin: auto;
        }
      </style>
    </head>
    
    <body>
      <p>
        Спасибо! Заказ принят.<br> Номер вашего заказа: '.$upvotes.'<br>В ближайщее время с Вами свяжется наш менеджер для уточнения заказа
      </p>
    </body>
    
    </html>
    ';
} catch (Exception $e) {
    echo '
    <!DOCTYPE html>
    <html lang="en">
    
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Магазин исскуственных ёлок khvelki.ru</title>
      <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
      <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
      <style>
        body {
          background-color: #1a2f4c;
          color: #e9f3fb;
          width: 100vw;
          height: 100vh;
          display: flex;
          justify-content: center;
          align-items: center;
        }
    
        p {
          font-size: 30px;
          line-height: 36px;
          margin: auto;
        }
      </style>
    </head>
    
    <body>
      <p>
        Что то пошло не так! Просим Вас совершить заказ по телефону +79098788011. Ошибка: '.$mail->ErrorInfo.'
      </p>
    </body>
    
    </html>
    ';
}
 ?>