<?php

namespace CodeTests\QueryBuilder;

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
     public function testIfQueryBaseIsGeneratedWithSuccess(): void
     {
          $this->assertEquals('SELECT * FROM products', $this->select->getSql());
     }

     public function testIfQueryIsGeneratedWithWhereConditions()
     {
          $query = $this->select->where('name', '=', 'Produto 1');

          $this->assertEquals('SELECT * FROM products WHERE name = :name', $this->select->getSql());

     }
}
