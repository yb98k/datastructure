<?php
/**
 * Created by PhpStorm.
 * User: yk
 * Date: 19-2-13
 * Time: 上午9:51
 */

namespace dt\nonlinear\structure;


class SNode
{
    public $data;

    public $prior;

    public function __construct()
    {
        $this->data = null;
        $this->prior = null;
    }
}