<?php

namespace App\Factory;

class LoginProviderFactory
{
    public function createProvider($idProvider)
    {
        if($idProvider == 1)
        {
            return 'facebook';
        }
        elseif($idProvider == 2)
        {
            return 'google';
        }
        elseif($idProvider == 3)
        {
            return 'instagram';
        }
    }

}

