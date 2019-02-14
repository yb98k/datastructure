<?php
/**
 * Created by PhpStorm.
 * User: yk
 * Date: 19-2-13
 * Time: 下午2:56
 */

namespace dt\chained;


use dt\chained\structure\BTNode;

class BinaryTree {

    public $tree;

    public function __construct(){
        $this->tree = null;
    }

    public function createBtByPreInfix($pre, $infix)
    {
        $this->tree = $this->byPreInfix($pre, $infix, 0, count($pre) - 1, 0, null);
    }

    private function byPreInfix($pre, $infix, $preStart, $preEnd, $infixStart, $p) {
        $root = new BTNode();
        $root->parent = $p;
        //根节点数据在pre数组的第一位
        $root->data = $pre[$preStart];
        //根节点在in数组中的坐标
        $root_inx = array_search($root->data, $infix);

        //我把左右子树的pre数组，in数组的开始结束坐标写出来，便于理解
        #左子树在pre数组的开始坐标
        $pre_l_s = $preStart + 1;
        //左子树在pre数组的结束坐标，其中root_inx-in_s为左子树长度
        $pre_l_e = $preStart + ($root_inx - $infixStart);
        //右子树开始坐标
        $pre_r_s = $pre_l_e + 1;
        //右子树结束坐标
        $pre_r_e = $preEnd;
        //左子树在in数组开始坐标
        $in_l_s = $infixStart;
        //右子树在in数组开始坐标
        $in_r_s = $root_inx + 1;

        if ($pre_l_s <= $pre_l_e)
            $root->lChild = $this->byPreInfix($pre, $infix, $pre_l_s, $pre_l_e, $in_l_s, $root);
        if ($pre_r_s <= $pre_r_e)
            $root->rChild = $this->byPreInfix($pre, $infix, $pre_r_s, $pre_r_e, $in_r_s, $root);

        return $root;
    }




    /**
     * 先序遍历二叉树
     * @param $tree
     * @param $orderTree
     * @return array|void
     */
    public function preOrderBt($tree, &$orderTree){
        if($tree != null){
            $orderTree[] = $tree->data;
            $this->preOrderBt($tree->lChild, $orderTree);
            $this->preOrderBt($tree->rChild, $orderTree);
        }
    }

    /**
     * 中序遍历二叉树
     * @param $tree
     * @param $orderTree
     */
    public function infixOrderBt($tree, &$orderTree)
    {
        if($tree != null) {
            $this->preOrderBt($tree->lChild, $orderTree);
            $orderTree[] = $tree->data;
            $this->preOrderBt($tree->rChild, $orderTree);
        }
    }

    /**
     * 后序遍历二叉树
     * @param $tree
     * @param $orderTree
     */
    public function postOrderBt($tree, &$orderTree){
        if($tree != null){
            $this->postOrderBt($tree->lChild, $orderTree);
            $this->postOrderBt($tree->rChild, $orderTree);
            $orderTree[] = $tree->data;
        }
    }

    /**
     * 层序遍历
     * @param $tree
     * @param $orderTree
     * @return null
     */
    public function fromTopToBottomOrderBt($tree, &$orderTree)
    {
        if($tree == null) {
            return null;
        }

        $queue = [];
        array_push($queue, $tree);

        while($node = array_shift($queue)) {
            $orderTree[] = $node->data;
            if($node->lChild != null) {
                array_push($queue, $node->lChild);
            }
            if($node->rChild != null) {
                array_push($queue, $node->rChild);
            }
        }
    }

}