<?php
/**
 * User: yk
 */

namespace dt\nonlinear;


use dt\nonlinear\structure\SNode;

class LinkStack
{
    /**
     * 栈存储
     * @var SNode
     */
    private $stackPointer;

    /**
     * 栈的节点数
     * @var int
     */
    private $nodeCount;

    /**
     * 栈的限制大小
     * @var int
     */
    private $nodeLimit;

    public function __construct($nodeLimit = 0)
    {
        $this->stackPointer = new SNode();

        $this->nodeCount = 0;

        $this->nodeLimit = (int) $nodeLimit;
    }

    /**
     * 压栈
     * @param $data
     * @return $this|bool
     */
    public function push($data)
    {
        if(!$this->isAchieveLimit()) {
            $newNode = new SNode();
            $newNode->data = $data;
            $newNode->prior = $this->stackPointer;
            $this->stackPointer = $newNode;
            $this->nodeCount++;

            return $this;
        }

        return false;
    }

    /**
     * 出栈
     * @return bool|null
     */
    public function pop()
    {
        if(!$this->isEmpty()) {

            $popData = $this->stackPointer->data;
            $temp = $this->stackPointer;
            unset($this->stackPointer);
            $this->stackPointer = $temp->prior;
            unset($temp);

            $this->nodeCount--;

            return $popData;
        }
        return false;
    }

    /**
     * 获取栈顶元素
     * @return null
     */
    public function getTop()
    {
        return $this->stackPointer->data;
    }

    /**
     * 获取栈的当前大小
     * @return int
     */
    public function getLength()
    {
        return $this->nodeCount;
    }

    /**
     * 判断栈是否为空
     * @return bool
     */
    public function isEmpty()
    {
        return $this->nodeCount <= 0;
    }

    /**
     * 判断栈是否已达大小上限
     * @return bool
     */
    public function isAchieveLimit()
    {
        return $this->nodeLimit > 0 && $this->nodeCount >= $this->nodeLimit;
    }
}