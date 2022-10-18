<?php

namespace Src\Item;

interface ItemInterface
{
	public function title($title);

	public function link($url);

	public function description($description);

	public function id($id);

	public function name($name);

	public function price($price);

	public function category($category);
	
	public function toXML();
}