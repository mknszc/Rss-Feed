<?php

namespace Src\Channel;

class Channel implements Channelnterface
{
    protected $title;
    protected $description;
    protected $link;
    protected $image;
    protected $copyright;
    protected $generator;
    protected $language;
    protected $category;
    protected $atomLink;
    protected $items = [];
    
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
    
    public function link($link)
    {
        $this->link = $link;
        
        return $this;
    }
    
    public function image($url, $title, $link)
    {
        $this->image = [
            'url' => $url,
            'title' => $title,
            'link' => $link
        ];
        
        return $this;
    }
    
    public function copyright($copyright)
    {
        $this->copyright = $copyright;
        
        return $this;
    }
    
    public function generator($generator)
    {
        $this->generator = $generator;
        
        return $this;
    }
    
    public function language($language)
    {
        $this->language = $language;
        
        return $this;
    }
    
    public function category($category)
    {
        $this->category = $category;
        
        return $this;
    }
    
    public function atomLink($link)
    {
        $this->atomLink = $link;
        
        return $this;
    }
    
    public function addItem($item)
    {
        $this->items[] = $item;
        
        return $this;
    }
    
    public function toXML()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->startElement('channel');
        
        if (isset($this->atomLink)) {
            $xml->startElement('atom:link');
            $xml->writeAttribute('href', $this->atomLink);
            $xml->writeAttribute('rel', 'self');
            $xml->writeAttribute('type', 'application/rss+xml');
            $xml->endElement();
        }
        
        if (isset($this->title)) {
            $xml->writeElement('title', $this->title);
        }
        
        if (isset($this->description)) {
            $xml->writeElement('description', $this->description);
        }
        
        if (isset($this->link)) {
            $xml->writeElement('link', $this->link);
        }
        
        if (isset($this->image)) {
            $xml->startElement('image');
            foreach ($this->image as $tag => $value) {
                $xml->writeElement($tag, $value);
            }
            $xml->endElement();
        }
        
        if (isset($this->category)) {
            $xml->writeElement('category', $this->category);
        }
        
        if (isset($this->copyright)) {
            $xml->writeElement('copyright', $this->copyright);
        }
        
        if (isset($this->generator)) {
            $xml->writeElement('generator', $this->generator);
        }
        
        if (isset($this->language)) {
            $xml->writeElement('language', $this->language);
        }
        
        if (!empty($this->items)) {
            foreach ($this->items as $item) {
                $xml->writeRaw($item->toXML());
            }
        }
        
        $xml->endElement();
        
        return $xml->outputMemory();
    }
}
