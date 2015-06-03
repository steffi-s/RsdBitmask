<?php

namespace RsdBitmaskTest;

use RsdBitmask\AbstractBitmask;

/**
 * Simple class with constant bitmask flags
 * For testing only
 *
 * @category Bitmask
 * @package  RsdBitmaskTest
 * @author   Stefanie Schmidt <stefanie@reneschmidt.de>
 * @license  https://www.gnu.org/licenses/lgpl.html LGPLv3
 * @link     https://reneschmidt.de/
 */
class FirstBitmask extends AbstractBitmask
{
    const IS_A = 1;
    const IS_B = 2;
    const IS_C = 4;
}
