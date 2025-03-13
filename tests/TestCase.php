<?php

declare(strict_types=1);

namespace Lucifer\LaravelTablerUi\Tests;

use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use Lucifer\LaravelTablerUi\LaravelTablerUiProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class TestCase extends OrchestraTestCase
{
    use InteractsWithViews;

    protected function getPackageProviders($app): array
    {
        return [
            LaravelTablerUiProvider::class,
        ];
    }
}
