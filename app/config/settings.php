<?php
/**
 *  Default app config
 */
Config::write('app.name', "Memory Test");
Config::write('app.conv.perpage', 10);
Config::write('app.upload_url', 'http://localhost/memorytest/upload');
Config::write('app.url_base', 'http://localhost/memorytest/');
Config::write('app.hash', 'md5');
Config::write('analytics', true);
Config::write('404_page', true);
Config::write('cnpj_client', true);

// Security
Config::write("securitySalt", "m3m0ryt35t");

// Other
Config::write("defaultExtension", "htm");

// Language
Config::write('multilang', false);
Config::write('default_language', 'br');

// Environment
if (Config::read('multilang')):
    if (Session::read('language')):
        Config::write("environment", Session::read('language'));
    else:
        Config::write("environment", Config::read('default_language'));
    endif;
else:
    if ($_SERVER["SERVER_NAME"] == "localhost") {
        Config::write("environment", 'development'); //Change here if there's no multilang
    } 
    else if ($_SERVER["SERVER_NAME"] == "memorytest.wfsneto.com.br" || $_SERVER["SERVER_NAME"] == "wfsneto.com.br" || $_SERVER["SERVER_NAME"] == "www.wfsneto.com.br") {
        Config::write("environment", 'production'); //Change here if there's no multilang
    }
endif;

// Debug mode
Config::write('debug', true);

// Currency settings
Config::write('app.currency', 'R$');
Config::write('app.currency_name', 'Real');
Config::write('app.currency_format_decimals', 2);
Config::write('app.currency_format_dec_point', ',');
Config::write('app.currency_format_thousands_sep', '.');

// Mail settings
Config::write('Mailer.transport', "mail.agiletecnologia.com.br"); // smtp
Config::write('Mailer.smtp.host', "mail.agiletecnologia.com.br"); //mail.domain.com
Config::write('Mailer.smtp.port', '25');
Config::write('Mailer.smtp.encryption', '');
Config::write('Mailer.smtp.username', "valdeir.antonio@agiletecnologia.com.br"); //email
Config::write('Mailer.smtp.password', "valdeir2010"); //password
