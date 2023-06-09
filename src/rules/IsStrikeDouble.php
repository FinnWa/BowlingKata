<?php

declare(strict_types=1);

namespace rules;

final class IsStrikeDouble
{
    public function strike($frame): bool
    {
        return $frame['first'] === '10';
    }
}
