<?php

namespace App\Helper;

class WebpImageUrl
{
  public function convert($path, $width = null)
  {
    $url = url("storage/{$path}");

    // Append format and width as query parameters
    $query = http_build_query([
      'format' => 'webp',
      'width' => $width
    ]);

    return "{$url}?{$query}";
  }
}
