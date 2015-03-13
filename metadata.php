<?php
$sMetadataVersion = '1.1';

/**
 * Module information
 */
$aModule = array(
    'id' => 'oxidVarnishSSLFix',
    'title' => 'OXID Varnish Fix',
    'description' => 'Extends OXID so that it honors the HTTP_X_FORWARDED_PROTO flag',
    'version' => '1.0',
    'url' => 'https://github.com/felicitus/oxidVarnishSSLFix',
    'email' => 'felicitus-oxidvarnish@felicitus.org',
    'author' => 'Timo A. Hummel',
    'extend' => array(
        'oxconfig' => 'oxidVarnishSSLFix/core/oxidVarnishSSLFix',
    ),
);
