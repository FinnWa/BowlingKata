<?php

declare(strict_types=1);

namespace frames;

final class CreateGame
{

    private const LAST_FRAME = 9;

    public function __construct(
        private readonly \GetScores $getScores,
        private readonly CreateEmptyFrames $createEmptyFrames,
        private readonly SingleEmptyFrame $singleEmptyFrame
    ) {
    }

    public function create(): array
    {
        $scores = $this->getScores->scores();
        $frames = $this->createEmptyFrames->create();
        $framesFilled = [];

        for ($i = 0; $i <= self::LAST_FRAME; $i++) {
            $singleFrame = $this->singleEmptyFrame->get($frames, $i);
            if ($singleFrame['first'] === null && current($scores) === '10') {
                $singleFrame['first'] = current($scores);
                $singleFrame['second'] = 0;
                next($scores);
            }

            if ($singleFrame['first'] === null) {
                $singleFrame['first'] = current($scores);
                next($scores);
            }

            if ($singleFrame['second'] === null && $singleFrame['first'] !== null) {
                $singleFrame['second'] = current($scores);
                next($scores);
            }

            if (array_key_exists('third', $singleFrame)) {
                $singleFrame['third'] = current($scores);
            }

            if ($singleFrame['first'] !== null && $singleFrame['second'] !== null) {
                $framesFilled[] = $singleFrame;
            }

        }

        return $framesFilled;
    }
}
