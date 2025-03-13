<?php

declare(strict_types=1);

namespace Lucifer\LaravelTablerUi\Enums;

enum Theme: string
{
    case PRIMARY = 'primary';

    case SECONDARY = 'secondary';

    case SUCCESS = 'success';

    case DANGER = 'danger';

    case WARNING = 'warning';

    case INFO = 'info';

    public static function values(): array
    {
        $values = [];

        foreach (self::cases() as $case) {
            $values[] = $case->value;
        }

        return $values;
    }

    public static function toArray(): array
    {
        $array = [];

        foreach (self::cases() as $case) {
            $array[$case->name] = $case->value;
        }

        return $array;
    }
}
