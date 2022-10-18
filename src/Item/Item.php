<?php

namespace Src\Item;

class Item implements ItemInterface
{
	protected $title;
	protected $description;
	protected $link;
	protected $id;
	protected $name;
	protected $price;
	protected $category;
	
	public function title($title)
	{
		$this->title = $title;
		
		return $this;
	}
	
	public function description($description)
	{
		$this->description = $description;
		
		return $this;
	}
	
	public function link($url)
	{
		$this->link = $url;
		
		return $this;
	}
	
	public function id($id)
	{
		$this->id = $id;
		
		return $this;
	}
	
	public function name($name)
	{
		$this->name = $name;
		
		return $this;
	}
	
	public function price($price)
	{
		$this->price = $price;
		
		return $this;
	}
	
	public function category($category)
	{
		$this->category = $category;
		
		return $this;
	}
	
	public function toXML()
	{
		$xml = new \XMLWriter();
		$xml->openMemory();
		$xml->startElement('item');
		
		if (isset($this->title)) {
			$xml->writeElement('title', $this->title);
		}
		
		if (isset($this->description)) {
			$xml->writeElement('description', $this->description);
		}
		
		if (isset($this->link)) {
			$xml->writeElement('link', $this->link);
		}
		
		if (isset($this->id)) {
			$xml->writeElement('id', $this->id);
		}
		
		if (isset($this->name)) {
			$xml->writeElement('name', $this->name);
		}
		
		if (isset($this->price)) {
			$xml->writeElement('price', $this->price);
		}
		
		if (isset($this->category)) {
			$xml->writeElement('category', $this->category);
		}
		
		$xml->endElement();
		return $xml->outputMemory();
	}
}