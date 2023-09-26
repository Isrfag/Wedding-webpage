<?php

define('CLAVE','KEY');

$token=$_POST['token'];
$action=$_POST['action'];

$cu=curl_init();
curl_setopt($cu,CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
curl_setopt($cu,CURLOPT_POST,1);
curl_setopt($cu,CURLOPT_POSTFIELDS,http_build_query(array('secret' => CLAVE,'response' => $token)));
curl_setopt($cu,CURLOPT_RETURNTRANSFER,true);
$response=curl_exec($cu);
curl_close($cu);

$datos=json_decode($response,true);

if($datos['success']== 1 && $datos['score'] >= 0.5 ) {

    echo "CAPTCHA VALIDO.\n";

    $Pass=$_POST['contra'];

    if($Pass==password){

    $Nombre=$_POST['Nombre'];
    $Apellidos=$_POST['Apellidos'];
    $Numero=$_POST['Numero'];
    $Autobus=$_POST['autobus'];
    

    $Destinatario= "isrfag@gmail.com";
    $asunto= "Ha confirmado su asistencia";
    $cuerpo= '

        <html>
            <head>
                <title>Ha confirmado su asistencia</title>
            </head>
            
            <body>

                <h1>'.$Nombre . ' ha confirmado su asistencia a la boda!</h1>
                <h2>
                    Nombre: '.$Nombre . ' - ' . $Apellidos . ' <br>
                    Acompañante/s: '.$Numero. ' <br>
                    Autobus: '.$Autobus. '
                </h2>    

            </body>
        </html>
    
    ';
    $headers= "MIME-Version: 1.0\r\n";
    $headers="Content-type: text/html; charset=UTF8\r\n";

    //Direccion remitente

    $headers .="FROM: $Nombre <$Apellidos>\r\n";
    mail($Destinatario,$asunto,$cuerpo,$headers);

    echo "Correo enviado";
    }else{
        echo "No estas invitado";
    }

}else{
    echo "ERES UN ROBOT";
}

?>



<a href="index.html">Volver a la página principal</a>