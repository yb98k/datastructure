<?php
/**
 * Created by PhpStorm.
 * User: yk
 * Date: 19-2-13
 * Time: 下午2:01
 */

namespace dt\chained;


use dt\chained\structure\QNode;

class LinkQueue {

    /**
     * 队列头部指针
     * @var QNode
     */
    private $frontPointer;

    /**
     * 队列尾部指针
     * @var QNode
     */
    private $tailPointer;

    /**
     * 队列长度
     * @var int
     */
    private $length;

    /**
     * 队列长度限制
     * @var int
     */
    private $queueLimit;

    public function __construct($queueLimit = 0)
    {
        $this->frontPointer = null;

        $this->tailPointer = null;

        $this->length = 0;

        $this->queueLimit = (int) $queueLimit;
    }

    /**
     * 入队
     * @param $data
     * @return $this|bool
     */
    public function enqueue($data)
    {
        if(!$this->isAchieveLimit()) {
            $newNode = new QNode();
            $newNode->data = $data;

            if($this->length == 0) {
                $this->frontPointer = $newNode;
                $this->tailPointer = $newNode;
            }

            $this->tailPointer->next = $newNode;
            $this->tailPointer = $newNode;

            $this->length++;

            return $this;
        }

        return false;
    }

    /**
     * 出队
     * @return mixed
     */
    public function dequeue()
    {
        if(!$this->isEmpty()) {

            $temp = $this->frontPointer;
            $data = $this->frontPointer->data;
            unset($this->frontPointer);
            $this->frontPointer = $temp->next;
            unset($temp);

            $this->length--;

            return $data;
        }

        return null;
    }

    /**
     * 获取队列顶部内容
     * @return mixed|null
     */
    public function getQueueFront()
    {
        return $this->isEmpty() ? null : $this->frontPointer->data;
    }

    /**
     * 获取队列长度
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * 判断队列是否为空
     * @return bool
     */
    public function isEmpty()
    {
        return 0 === $this->length;
    }

    /**
     * 判断队列是否超过限制长度
     * @return bool
     */
    public function isAchieveLimit()
    {
        return $this->queueLimit > 0 && $this->length >= $this->queueLimit;
    }
}