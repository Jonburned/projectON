<?php

namespace Crowd\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class CrowdUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
