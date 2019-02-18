<?php

namespace Kanboard\Plugin\AutomaticAction;

use Kanboard\Core\Plugin\Base;
use Kanboard\Plugin\AutomaticAction\Action\PrioByValue;

class Plugin extends Base
{
    public function initialize()
    {
        $this->actionManager->register(new PrioByValue($this->container));
    }
}
