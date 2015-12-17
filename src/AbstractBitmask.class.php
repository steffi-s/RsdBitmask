<?php

namespace RsdBitmask;

/**
 * Simple bitmask class to set bitmasks
 *
 * 1. checks whether a flag is positive or not
 * 2. checks whether a flag is power of two or not
 * 3. sets the flag and returns the bitmask as an int
 * 4. gets the actual bitmask as an int
 *
 * PHP Version 5.5
 *
 * @category Bitmask
 * @package  RsdBitmask
 * @author   Stefanie Schmidt <stefanie@reneschmidt.de>
 * @license  https://www.gnu.org/licenses/lgpl.html LGPLv3
 * @link     https://reneschmidt.de/
 */
abstract class AbstractBitmask
{
    /**
     * @var int Bitmask in int representation
     */
    protected $bitmask = 0;

    /**
     * Constructor
     * @param int $bitmask Bitmask in int representation
     * @throws \Exception
     */
    public function __construct($bitmask)
    {
        if ($bitmask < 0) {
            throw new \Exception("Bitmask must not be negative!", 2);
        }
        $this->bitmask = $bitmask;
    }

    /**
     * Getter for bitmask
     * @return int
     */
    public function getBitmask()
    {
        return $this->bitmask;
    }

    /**
     * Check whether a flag is set in the bitmask or not
     * @param int $flag Bitmask flag
     * @return bool
     */
    public function is($flag)
    {
        return ($this->bitmask & $flag) === $flag;
    }

    /**
     * Set flag
     * @param int  $flag Bitmask flag
     * @param bool $set  Set if true otherwise unset
     * @return int bitmask
     * @throws \Exception
     */
    public function setFlag($flag, $set = true)
    {
        if ($flag != 0 && !$this->isPowerOfTwo((int)$flag)) {
            throw new \Exception("Illegal flag.", 1);
        }

        if ($set) {
            $this->bitmask |= (int)$flag;
        } else {
            $this->bitmask &= ~(int)$flag;
        }

        return $this->getBitmask();
    }

    /**
     * Unset flag
     * @param int $flag Bitmask flag
     * @return int bitmask
     */
    public function unsetFlag($flag)
    {
        return $this->setFlag($flag, false);
    }

    /**
     * Checks whether a flag is power of two or not
     * @param int $flag Flag of bitmask
     * @return bool
     */
    public function isPowerOfTwo($flag)
    {
        return $flag > 0 && !($flag & ($flag - 1));
    }
}
