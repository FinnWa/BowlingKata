<?php

declare(strict_types=1);

final class GetScores
{

    public function scores(): array
    {
        $scoresString = readline('Enter a scores divided by , : ');
        return explode(',', $scoresString);
    }

}
