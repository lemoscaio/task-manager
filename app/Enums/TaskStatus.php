<?php

namespace App\Enums;

enum TaskStatus: string
{
  case PENDING = 'pending';
  case IN_PROGRESS = 'in_progress';
  case DONE = 'done';

  public static function values(): array
  {
    return array_column(self::cases(), 'value');
  }
}