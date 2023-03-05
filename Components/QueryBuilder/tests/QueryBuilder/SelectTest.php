<?php

namespace Code\QueryBuilder;

use PHPUnit\Framework\TestCase;
use Code\QueryBuilder\Select;

class SelectTest extends TestCase
{

    protected $select;

    //Para ser executada pelo menos tem que ter mais um teste.
   protected function assertPreConditions(): void
   {
        $class = class_exists(Select::class);
        $this->assertTrue($class);
   }

   // como fosse o create.
   protected function setUp(): void
   {
        $this->select = new Select('products');
   }

   //testa se está gerando a query corretamente.
   public function testIfQueryBaseIsGeneratedWithSuccess(){

        $query = $this->select->getSql();

        $this->assertEquals('SELECT * FROM products', $query);

   }
}