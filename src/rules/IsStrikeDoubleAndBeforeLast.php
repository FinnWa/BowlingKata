<?php

declare(strict_types=1);

namespace rules;

final class IsStrikeDoubleAndBeforeLast
{
    public function strike($frameNumber): bool
    {
        return $frameNumber === 8;
    }
}
