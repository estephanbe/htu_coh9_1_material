<?php

/**
 * HTU Redirect - redirects the request to another url. 
 *
 * @param String $path
 * @return void
 */
function htu_redirect($path)
{
    header("Location: $path");
    exit();
}
