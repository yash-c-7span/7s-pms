<?php

namespace App\Library;

class Helper
{
    public static function errorMessage(string $message)
    {
        session()->flash('flash.error', $message);
    }
}