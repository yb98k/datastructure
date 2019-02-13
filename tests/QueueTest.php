<?php

include ( __DIR__ . '/../vendor/autoload.php');

//线性队列
$queue = new \dt\linear\Queue();

$queue->enqueue('3423423')->enqueue(432424)->enqueue(['322', '123123'])->enqueue('66666');

var_dump($queue->getQueueFront());
var_dump($queue->dequeue());
var_dump($queue->dequeue());
var_dump($queue->getQueueFront());


//链式队列
$linkQueue = new \dt\nonlinear\LinkQueue();

$linkQueue->enqueue('3423423')->enqueue(432424)->enqueue(['322', '123123'])->enqueue('66666');


var_dump($linkQueue->dequeue());
var_dump($linkQueue->dequeue());
var_dump($linkQueue->dequeue());
var_dump($linkQueue->dequeue());
$linkQueue->enqueue('342342312312');
var_dump($linkQueue->dequeue());