<?php

namespace Src\Data;

class JsonReader implements JsonReaderInterface
{
    public function read(string $url): array
    {
        $file = file_get_contents($url);
        
        return json_decode($file);
    }
}
