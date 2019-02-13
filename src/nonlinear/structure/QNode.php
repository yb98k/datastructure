<?php
/**
 * Created by PhpStorm.
 * User: yk
 * Date: 19-2-13
 * Time: 下午2:00
 */

namespace dt\nonlinear\structure;


class QNode {

    public $data;

    public $next;

    public function __construct()
    {
        $this->data = null;
        $this->next = null;
    }
}