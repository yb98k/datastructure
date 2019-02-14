<?php
/**
 * Created by PhpStorm.
 * User: yk
 * Date: 19-2-13
 * Time: 下午2:55
 */

namespace dt\chained\structure;


class BTNode {

    public $data;

    public $parent;

    public $lChild;

    public $rChild;

    public function __construct($data = null){
        $this->data = $data;
    }
}