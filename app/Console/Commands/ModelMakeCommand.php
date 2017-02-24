<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

class ModelMakeCommand extends \Illuminate\Foundation\Console\ModelMakeCommand
{
    public function fire()
    {
        parent::fire();

        if ($this->option('presenter')) {
            $this->createPresenter();
        }
    }

    protected function createPresenter()
    {
        $presenter = Str::studly(class_basename($this->argument('name')));

        $modelName = $this->qualifyClass($this->getNameInput());

        $this->call('make:presenter', [
            'name' => "{$presenter}Presenter",
        ]);
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Models';
    }
    
    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        if ($this->option('presenter')) {
            return __DIR__ . '/stubs/model-with-presenter.stub';
        }
        return __DIR__ . '/stubs/model.stub';
    }

    protected function getOptions()
    {
        $options = parent::getOptions();
        
        $options[] = ['presenter', 'p', InputOption::VALUE_NONE, 'Create a new presenter for the model.'];
        return $options;

    }
}
