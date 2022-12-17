<?php
header('Content-Type: text/xml; charset=utf-8');

require_once dirname(__DIR__) . '/vendor/autoload.php';

use Src\Data\JsonReader;
use Src\Feed\Feed;
use Src\Channel\Channel;
use Src\Item\Item;

$feed = new Feed();

$channel = new Channel();
$channel->title("Cimri")
    ->description("Product list for Cimri");

$data = new JsonReader();
$products = $data->read('data/products.json');

foreach ($products as $key => $product) {
    $item = new Item();
    $item->name($product->name)
        ->price($product->price)
        ->category($product->category);
    
    $channel->addItem($item);
}

$feed->addChannel($channel);

echo $feed->toXml();
