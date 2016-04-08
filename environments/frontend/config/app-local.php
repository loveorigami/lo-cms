<?php
use Zelenin\Zend\Expressive\Config\Provider\PhpProvider;

return [
	new PhpProvider(__DIR__ . '/../../common/config/{{,*.}global,{,*.}local}.php'),
	new PhpProvider(__DIR__ . '/{{,*.}global,{,*.}local}.php'),
	new \lo\modules\sight\ModuleConfig()
];
