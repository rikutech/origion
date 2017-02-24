<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class PresenterMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:presenter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new presenter class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Presenter';

    public function fire()
    {
        if (parent::fire() === false) {
            return;
        }
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Presenters';
    }

    protected function getStub()
    {
        return __DIR__ . '/stubs/presenter.stub';
    }
}
