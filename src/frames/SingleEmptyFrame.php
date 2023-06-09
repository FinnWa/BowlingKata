<?php

declare(strict_types=1);

namespace frames;

final class SingleEmptyFrame
{
    public function get(array $frames, int $frameNumber): array
    {
        return $frames[$frameNumber];
    }
}
