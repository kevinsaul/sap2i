<?php

/*
 * Configure PHP Mailer to send transactionals emails in SMTP with .env parameters
 */
function my_phpmailer_configuration($phpmailer)
{
    $phpmailer->isSMTP();
    $phpmailer->Host = getenv('MAIL_HOST');
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = getenv('MAIL_PORT');
    $phpmailer->Username = getenv('MAIL_USERNAME');
    $phpmailer->Password = getenv('MAIL_PASSWORD');

    // Additionnal configuration
    $phpmailer->SMTPSecure = getenv('MAIL_ENCRYPTION');
    $phpmailer->From = getenv('MAIL_FROM_ADDRESS');
    $phpmailer->FromName = getenv('MAIL_FROM_NAME');
}

if (env('MAIL_SMTP')) {
    add_action('phpmailer_init', 'my_phpmailer_configuration');
}
