<?php

/**
 * Disable xml-prc
 *
 */

add_filter('xmlrpc_enabled', '__return_false');
