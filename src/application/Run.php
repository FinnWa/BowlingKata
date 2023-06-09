<?php

declare(strict_types=1);

namespace application;

use frames\CreateGame;
use result\Calculate;

final readonly class Run
{

    public function __construct(private Calculate $calculate)
    {
    }

    public function run(): void
    {
        echo $this->calculate->calculate();
    }

}
