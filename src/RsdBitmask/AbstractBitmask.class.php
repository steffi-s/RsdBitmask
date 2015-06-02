<?php
/**
 * Created by PhpStorm.
 * User: steffi
 * Date: 02.06.15
 * Time: 14:42
 */

namespace RsdBitmask;


abstract class AbstractBitmask
{
    /**
     * @var int
     */
    public $bitmaskPayload = 0;

    /**
     * @param int $bitmaskPayload
     */
    public function __construct($bitmaskPayload)
    {
        $this->bitmaskPayload = $bitmaskPayload;
    }

    public function is($flag) {
        return ($this->bitmaskPayload & $flag) === $flag;
    }

    public function setFlag($flag, $set = true) {
        if ($flag != 0 && !$this->isPowerOfTwo((int)$flag)) {
            throw new \Exception("Illegal flag.");
        }

        if ($set) {
            $this->bitmaskPayload |= (int)$flag;
        } else {
            $this->bitmaskPayload &= ~(int)$flag;
        }

        return $this->bitmaskPayload;
    }

    public function isPowerOfTwo($flag) {
        return $flag > 0 && !($flag & ($flag - 1));
    }
} 