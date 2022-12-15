<?php

namespace Core\Helpers;

use Exception;

trait Tests
{
    protected static function check_if_exists($expr, $msg)
    {
        try {
            if (!$expr) {
                throw new \Exception($msg);
            }
        } catch (\Exception $error) {
            echo $error->getMessage();
            die;
        }
    }

    protected static function check_if_empty($var)
    {
        try {
            if (empty($var)) {
                throw new \Exception("Empty data");
            }
        } catch (\Exception $error) {
            echo $error->getMessage();
            die;
        }
    }
}
