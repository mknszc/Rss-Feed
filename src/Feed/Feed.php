<?php

namespace Src\Feed;

class Feed implements FeedInterface
{
	protected $channels = [];
	protected $xmlVersion = '1.0';
	protected $encoding = 'UTF-8';
	protected $rssVersion = '2.0';
	
	public function addChannel($channel)
	{
		$this->channels[] = $channel;
        
		return $this;
	}
	
	public function toXml ()
	{
		$xml = new \XMLWriter();
		$xml->openMemory();
		$xml->startDocument($this->xmlVersion, $this->encoding);
		$xml->startElement('rss');
		$xml->writeAttribute('version', $this->rssVersion);
		$xml->writeAttribute('xmlns:atom', 'https://www.w3.org/2005/Atom');
		
		if (!empty($this->channels)) {
			foreach ($this->channels as $channel) {
				$xml->writeRaw($channel->toXML());
			}
		}
		
		$xml->endElement();
		$xml->endDocument();
        
		return $xml->outputMemory();
	}
}
