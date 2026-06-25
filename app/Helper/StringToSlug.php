<?php

namespace App\Helper;

class StringToSlug
{
  public function convert($input)
  {
    // Convert to lowercase
    $input = strtolower($input);
    
    // Remove special characters and multiple spaces
    $input = preg_replace('/[^a-z0-9\s]/', '', $input);
    
    // Replace multiple spaces with a single space
    $input = preg_replace('/\s+/', ' ', $input);
    
    // Replace spaces with hyphens
    $input = str_replace(' ', '-', $input);
    
    return $input;
  }

  public function createUniqueSlug($model, $title)
  {
    $slug = $this->convert($title);
    $originalSlug = $slug;

    $count = 1;
    while ($model::where('slug', $slug)->exists()) {
      $slug = $originalSlug . '-' . $count;
      $count++;
    }

    return $slug;
  }
}
