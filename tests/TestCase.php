<?php

declare(strict_types=1);

namespace Thinhnx\LaravelTablerUI\Tests;

use Illuminate\Foundation\Testing\Concerns\InteractsWithViews;
use Thinhnx\LaravelTablerUI\LaravelTablerUIProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class TestCase extends OrchestraTestCase
{
    use InteractsWithViews;

    protected function getPackageProviders($app): array
    {
        return [
            LaravelTablerUIProvider::class,
        ];
    }
}
