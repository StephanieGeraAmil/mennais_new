<p>Hola {{$inscription->userData->name}} {{$inscription->userData->lastname}},</p>
<p>Le recordamos que está inscripto PROEDUCAR XXXII - HACIA UNA INNOVACIÓN CON SENTIDO.</p>
<!--<p>Lo esperamos el próximo jueves 8 de febrero a las 8:00 HS en el SALÓN DE ACTOS DEL COLEGIO SANTO DOMINGO  - PALMAR 2288 ESQ. ACEVEDO DÍAZ.</p>-->
<p>Lo esperamos el próximo lunes 19 de febrero a las 18:00 HS en la primera sesion viruala través de este link: <a href="{!!$inscription->url()!!}" target="_blank" >Link de acceso</a></p>
<!--<img src="{!!$message->embedData(base64_decode($qrCodeData), 'QrCode.png', 'image/png')!!}">-->
<p>Saludos,</p>
<p>AUDEC.</p>
