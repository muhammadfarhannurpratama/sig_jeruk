<?php

// To use reCAPTCHA, you need to sign up for an API key pair for your site.
// link: http://www.google.com/recaptcha/admin
switch (ENVIRONMENT)
{
    case 'development':
        $config['recaptcha_site_key'] = '6Lc1-jAUAAAAABLhrA80WY2Wflltl0UllhkDdcO0';
        $config['recaptcha_secret_key'] = '6Lc1-jAUAAAAAIqM7ZTt0PaIZf9lUDKmIY8IJnEE';
        break;

    case 'production':
        $config['recaptcha_site_key'] = '6LdU9DAUAAAAAOjC61HQaWrPOSTCWVgL10sEswnK';
        $config['recaptcha_secret_key'] = '6LdU9DAUAAAAAER2qZzX11s1DCF-hN-X98uFFBzS';
        break;

    default:
        $config['recaptcha_site_key'] = '6LdU9DAUAAAAAOjC61HQaWrPOSTCWVgL10sEswnK';
        $config['recaptcha_secret_key'] = '6LdU9DAUAAAAAER2qZzX11s1DCF-hN-X98uFFBzS';
        exit(1); // EXIT_ERROR
}

// reCAPTCHA supported 40+ languages listed here:
// https://developers.google.com/recaptcha/docs/language
$config['recaptcha_lang'] = 'en';

/* End of file recaptcha.php */
/* Location: ./application/config/recaptcha.php */
