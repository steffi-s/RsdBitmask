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
 * @author     Stefanie Schmidt <stefanie@reneschmidt.de>
 * @license  https://www.gnu.org/licenses/lgpl.html LGPLv3
 * @link     https://reneschmidt.de/
 */
class RsdBitmaskTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Checks given bitmasks
     * @return void
     */
    public function testInit()
    {
        $firstBitmask = new FirstBitmask(0);

        $this->assertFalse($firstBitmask->is(FirstBitmask::IS_A));
        $this->assertFalse($firstBitmask->is(FirstBitmask::IS_B));
        $this->assertFalse($firstBitmask->is(FirstBitmask::IS_C));
    }

    /**
     * Checks whether given flags are set or not
     * @return void
     */
    public function testSetFlag()
    {
        $firstBitmask = new FirstBitmask(0);

        $this->assertFalse($firstBitmask->is(FirstBitmask::IS_A));

        $firstBitmask->setFlag(FirstBitmask::IS_A);

        $this->assertTrue($firstBitmask->is(FirstBitmask::IS_A));

        $firstBitmask->setFlag(FirstBitmask::IS_A, false);

        $this->assertFalse($firstBitmask->is(FirstBitmask::IS_A));
    }

    /**
     * Checks whether a flag is illegal
     * @return void
     */
    public function testSetIllegalFlag()
    {
        $firstBitmask = new FirstBitmask(0);

        try {
            $firstBitmask->setFlag(5);
            $this->fail("Exception expected!");
        } catch (\Exception $e) {
            $this->assertSame(1, $e->getCode());
        }
    }

    /**
     * Check whether negative bitmask detection actually works
     * @return void
     */
    public function testSetNegativeBitmask()
    {
        try {
            new FirstBitmask(-2);
            $this->fail("Exception expected!");
        } catch (\Exception $e) {
            $this->assertSame(2, $e->getCode());
        }
    }
}
