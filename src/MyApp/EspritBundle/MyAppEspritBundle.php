<?php

namespace MyApp\EspritBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class MyAppEspritBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }

}
