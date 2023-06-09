<?php

declare(strict_types=1);

namespace rules;

final class IsAboveLast
{
    public function doNothing($frameNumber): bool
    {
        return $frameNumber === 9;
    }
}
