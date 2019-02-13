<?php
/**
 * Created by PhpStorm.
 * User: yk
 * Date: 19-2-13
 * Time: 上午11:49
 */

namespace dt\sequential;


class Queue {

    /**
     * 队列存储
     * @var array
     */
    private $queue;

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
        $this->queue = array();

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
            $this->queue[] = $data;
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
            $data = array_splice($this->queue, 0, 1)[0];
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
        return $this->isEmpty() ? null : $this->queue[0];
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