<?php


use application\Run;

require_once __DIR__.'/../vendor/autoload.php';

require 'src/input/GetScores.php';
require 'src/result/Calculate.php';
require 'src/application/Run.php';
require 'src/frames/CreateGame.php';
require 'src/frames/CreateEmptyFrames.php';
require 'src/frames/SingleEmptyFrame.php';
require 'src/rules/IsStrike.php';
require 'src/rules/IsSpare.php';
require 'src/rules/IsAboveLast.php';
require 'src/rules/IsStrikeDouble.php';



$scores = new GetScores();

$framesEmpty = new frames\CreateEmptyFrames();
$singleFrameEmpty = new frames\SingleEmptyFrame();

$frames = new \frames\CreateGame($scores, $framesEmpty, $singleFrameEmpty);
$ruleStrike = new rules\IsStrike();
$ruleSpare = new rules\IsSpare();
$ruleLast = new rules\IsAboveLast();
$ruleStrikeDouble = new rules\IsStrikeDouble();
$result = new \result\Calculate($frames, $ruleStrike, $ruleSpare, $ruleLast, $ruleStrikeDouble);


$run = new Run($result);

$run->run();
