<?php

include ( __DIR__ . '/../vendor/autoload.php');

$pre = [1, 2, 4, 5, 7,8, 3, 6];
$infix = [4, 2, 7, 5, 8, 1, 3, 6];

$object = new \dt\chained\BinaryTree();
$object->createBtByPreInfix($pre, $infix);

$object->preOrderBt($object->tree, $orderTree);
//$object->infixOrderBt($object->tree, $orderTree);
//$object->postOrderBt($object->tree, $orderTree);

//$object->fromTopToBottomOrderBt($object->tree, $orderTree);
var_dump($orderTree);