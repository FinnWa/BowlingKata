<?php

declare(strict_types=1);

namespace frames;

final class CreateEmptyFrames
{
    private const FRAMES = 10;

    public function create(): array
    {
        $frames = [];
        for ($i = 1; $i <= self::FRAMES; $i++) {
            if ($i === 10) {
                $frames[] = ['first' => null, 'second' => null, 'third' => null];
                break;
            }
            $frames[] = ['first' => null, 'second' => null];
        }
        return $frames;
    }
}
