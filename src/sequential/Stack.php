<?php
/**
 * User: yk
 */

namespace dt\sequential;

/**
 * 线性结构栈
 * Class Stack
 * @package dt\linear
 */
class Stack {

    /**
     * 栈存储
     * @var array
     */
    private $stack;

    /**
     * 栈的长度
     * @var int
     */
    private $length;

    /**
     * 栈的限制大小
     * @var int
     */
    private $limitSize;

    public function __construct($limitSize = 0)
    {
        $this->stack = array();

        $this->length = 0;

        $this->limitSize = (int) $limitSize;
    }

    /**
     * 压栈
     * @param $data
     * @return $this
     */
    public function push($data)
    {
        if(!$this->isAchieveLimit()) {
            $this->stack[] = $data;
            $this->length++;
        }

        return $this;
    }

    /**
     * 出栈
     * @return bool|mixed
     */
    public function pop()
    {
        if(!$this->isEmpty()) {
            $popData = array_pop($this->stack);
            $this->length--;

            return $popData;
        }

        return false;
    }

    /**
     * 获取栈顶元素
     * @return bool|mixed
     */
    public function getTop()
    {
        return $this->isEmpty() ? null : end($this->stack);
    }

    /**
     * 获取栈的当前大小
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * 判断栈是否为空
     * @return bool
     */
    public function isEmpty()
    {
        return 0 === $this->length;
    }

    /**
     * 判断栈是否已达大小上限
     * @return bool
     */
    public function isAchieveLimit()
    {
        return $this->limitSize > 0 && $this->length >= $this->limitSize;
    }
}