<?php

namespace Src\Feed;

interface FeedInterface
{
	public function addChannel($channel);

	public function toXml();
}