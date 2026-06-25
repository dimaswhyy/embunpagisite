<?php

namespace App\Helper;

class CleanHTML
{
  public function cleanAttributes($html)
  {
    // Regex to match any HTML tag and strip all attributes except href and target
    return preg_replace_callback('/<(\w+)\b([^>]*)>/', function ($matches) {
      // Keep only href and target attributes
      preg_match_all('/\b(href|target)=(".*?"|\'.*?\')/', $matches[2], $allowed);
      
      // Rebuild the tag with allowed attributes or no attributes if none found
      if (!empty($allowed[0])) {
          // Join the allowed attributes into a string
          $filteredAttributes = ' ' . implode(' ', array_map(function ($attr, $value) {
              return "$attr=$value";
          }, $allowed[1], $allowed[2]));
      } else {
          $filteredAttributes = ''; // No attributes to keep
      }
      
      // Return the cleaned tag with or without attributes
      return "<{$matches[1]}$filteredAttributes>";
    }, $html);
  }
}
