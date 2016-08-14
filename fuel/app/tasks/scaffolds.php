<?php 
namespace Fuel\Tasks;

class Scaffolds
{
    use \Fuelcreate\Scaffold\Scaffold;
    public function run()
    {
        return $this->fire();
    }
}