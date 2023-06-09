<?php

declare(strict_types=1);

namespace rules;

final class IsSpare
{
    public function spare($frame): bool
    {
        return $frame['first'] + $frame['second'] === 10 && $frame['second'] !== 0;
    }

}
