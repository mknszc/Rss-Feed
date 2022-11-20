<?php

namespace Src\Data;

interface JsonReaderInterface
{
	public function read(string $url): array;
}
