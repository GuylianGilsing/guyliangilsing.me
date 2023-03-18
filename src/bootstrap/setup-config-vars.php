<?php

declare(strict_types=1);

if (file_exists(BASE_DIR.'/../app-config.php'))
{
    require_once BASE_DIR.'/../app-config.php';
}
else
{
    require_once __DIR__.'/setup-config-vars/config-vars.php';
}
