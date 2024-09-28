<?php

use Illuminate\Container\Container;

/**
 * 获取Container
 */
function di(): Container
{
    return Container::getInstance();
}
