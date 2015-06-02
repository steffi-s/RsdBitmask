<?php
/**
 * Created by PhpStorm.
 * User: steffi
 * Date: 02.06.15
 * Time: 14:56
 */

namespace RsdBitmaskTest;


use RsdBitmask\AbstractBitmask;

class FirstBitmask extends AbstractBitmask {
    const IS_A = 1;
    const IS_B = 2;
    const IS_C = 4;
} 