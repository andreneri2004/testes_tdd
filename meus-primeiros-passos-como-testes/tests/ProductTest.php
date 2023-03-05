<?php

namespace Code;

use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    private $product;

    public function setUp(): void
    {
        $this->product = new Product();
    }

    public static function setUpBeforeClass(): void
    {
        print __METHOD__;
    }

    public static function tearDownAfterClass(): void
    {
        print __METHOD__;
    }

    Public function testSeONomeDoProdutoESetadoCorretamente(){
        $product =$this->product;
        $product->setName('Carro');
        $this->assertEquals('Carro', $product->getName(), 'Valores não são iguais');
    }

    Public function testSeOValorDoProdutoESetadoCorretamente(){
        $product =$this->product;
        $product->setPrice(520.00);
        $this->assertEquals(520.00, $product->getPrice(), 'Valores não são iguais');
    }

    Public function testSeOSlugDoProdutoESetadoCorretamente(){
        $product =$this->product;
        $product->setSlug('carro');
        $this->assertEquals('carro', $product->getSlug(), 'Valores não são iguais');
    }

}