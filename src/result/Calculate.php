<?php

declare(strict_types=1);

namespace result;

use frames\CreateGame;
use rules\IsAboveLast;
use rules\IsSpare;
use rules\IsStrike;
use rules\IsStrikeDouble;

final class Calculate
{

    public function __construct(
        private readonly CreateGame $createGame,
        private readonly IsStrike $isStrike,
        private readonly IsSpare $isSpare,
        private readonly IsAboveLast $isLast,
        private readonly IsStrikeDouble $isStrikeDouble
    ) {
    }

    public function calculate(): void
    {
        $result = 0;
        $frames = $this->createGame->create();

        for ($i = 0; $i <= 9; $i++) {

            $result += $frames[$i]['first'] + $frames[$i]['second'];

            if (!$this->isLast->doNothing($i)) {
                if ($this->isSpare->spare($frames[$i])) {
                    $result += $frames[$i + 1]['first'];
                }
                if ($this->isStrike->strike($frames[$i])) {
                    if ($this->isStrikeDouble->strike($frames[$i + 1])) {
                        $result += $frames[$i + 1]['first'] + $frames[$i + 2]['first'];
                    } else {
                        $result += $frames[$i + 1]['first'] + $frames[$i + 1]['second'];
                    }
                }
            }

            if (array_key_exists('third', $frames[$i])) {
                $result += $frames[$i]['third'];
            }
        }

        echo 'Result: ' . $result;

    }

}
