<?php

namespace App\Console\Commands;

class AppModelCommand extends AppGeneratorCommand
{
    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Model';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:model {name : The name of the class}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Eloquent model class with attribute and relationship traits';

    /**
     * The methods available.
     *
     * @var array
     */
    protected function getMethods()
    {
        return ['all', 'paginated', 'find', 'create', 'update', 'delete'];
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/model.stub';
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (parent::handle() !== false) {
            $this->call('app:attribute', ['name' => $this->argument('name')]);
            $this->call('app:relationship', ['name' => $this->argument('name')]);
            $this->call('app:scope', ['name' => $this->argument('name')]);
        }
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Models' .'\\' . $this->argument('name');
    }
}
