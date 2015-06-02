<?php
/**
 * RsdBitmask tests
 *
 * PHP Version 5.5
 *
 * @package  RsdBitmask
 * @author   Rene Schmidt <rene@reneschmidt.de>
 * @license  https://www.gnu.org/licenses/lgpl.html LGPLv3
 * @link     https://reneschmidt.de/
 */
namespace RsdBitmaskTest;


/**
 * Test RsdBitmask
 *
 * @category Password
 * @package    RsdBitmask
 * @subpackage TestUnit
 * @author     Rene Schmidt <rene@reneschmidt.de>
 * @license  https://www.gnu.org/licenses/lgpl.html LGPLv3
 * @link     https://reneschmidt.de/
 */
class RsdBitmaskTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test hashPassword function
     *
     * @return void
     */
    public function testInit()
    {
        $firstBitmask = new FirstBitmask(0);

        $this->assertFalse($firstBitmask->is(FirstBitmask::IS_A));
        $this->assertFalse($firstBitmask->is(FirstBitmask::IS_B));
        $this->assertFalse($firstBitmask->is(FirstBitmask::IS_C));
    }
}