<?php

/** @phpstan-ignore-next-line */
LaravelKahlan4\Config::bootstrap($this);

/** @phpstan-ignore-next-line */
$commandLine = $this->commandLine();
$commandLine->option('ff', 'default', 1);
$commandLine->option('src', 'default', 'app');
$commandLine->option('spec', 'default', 'app');
$commandLine->option('grep', 'default', '*.spec.m.php');
$commandLine->option('no-header', 'default', true);
