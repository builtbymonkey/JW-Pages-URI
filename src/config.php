<?php

if (!defined('JW_PAGES_URI_VERSION')) {
    define('JW_PAGES_URI_ID', 'jw_pages_uri');
    define('JW_PAGES_URI_NAME', 'JW Pages URI');
    define('JW_PAGES_URI_VERSION', '1.0.0');
}

$config['name'] = JW_PAGES_URI_NAME;
$config['version'] = JW_PAGES_URI_VERSION;


/**
 * < EE 2.6.0 backward compat
 */
if ( ! function_exists('ee'))
{
    function ee()
    {
        static $EE;
        if ( ! $EE) $EE = get_instance();
        return $EE;
    }
}
