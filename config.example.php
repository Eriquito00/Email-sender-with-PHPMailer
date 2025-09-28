# =================================
# Configuració SMTP per PHPMailer
# =================================
# NO EDITIS ESTE ARCHIU DIRECTAMENT
# Copia este archiu a un archiu config.php i edítal amb les teves dades.
# =================================

<?php

return [
    "SMTP_HOST" => "smtp.gmail.com",
    "SMTP_USER" => "example@example.com",       # Tu email normal i corrent
    "SMTP_PASS" => "contraseñaExample",         # Contrasenya d'Aplicacio del teu email
    "SMTP_PORT" => 587,
    "SMTP_SECURE" => "tls"
];

?>