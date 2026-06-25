<?php

namespace App\Helper;

class FormatNumber
{
  function thousandFormat($number) {
    // Ensure the input is treated as a number
    if (!is_numeric($number)) {
        return false; // Or handle error as needed
    }
    // Format the number with a dot as the thousand separator
    return number_format($number, 0, '', '.');
  }
}