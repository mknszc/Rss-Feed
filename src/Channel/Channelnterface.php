<?php

namespace Src\Channel;

interface Channelnterface
{
    public function title($title);

	public function link($link);

	public function description($description);

	public function category($category);

	public function copyright($copyright);

	public function generator($generator);

	public function image($url, $title, $link);

	public function language($language);

	public function atomLink($link);

	public function addItem($item);

	public function toXML();
}