<?php

namespace App\Providers\Macros;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\ServiceProvider;

class BlueprintMacroServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerColumnMacros();
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    protected function registerColumnMacros()
    {
        $this->money();
        $this->nullableTimestamp();
    }

    protected function money()
    {
        Blueprint::macro('money', function (string $fieldName) {
            return $this->decimal($fieldName, 14, 2)->default(0);
        });
    }

    protected function nullableTimestamp()
    {
        Blueprint::macro('nullableTimestamp', function (string $fieldName, int $precision = 0) {
            return $this->timestamp($fieldName, $precision)->nullable();
        });
    }
}
