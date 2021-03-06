<?php

include ( __DIR__ . '/../vendor/autoload.php');

//线性栈
$stack = new \dt\sequential\Stack();

$stack->push('123123')->push('234123421')->push('324325')->push('4534534');

var_dump($stack->pop());
var_dump($stack->getTop());

//链栈
$linkStack = new \dt\chained\LinkStack();

$linkStack->push('123123')->push('234123421')->push('324325')->push('4534534');

var_dump($linkStack->pop());
var_dump($linkStack->pop());