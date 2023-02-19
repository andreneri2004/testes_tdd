<?php

namespace Code;

use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    Public function testSeONomeDoProdutoESetadoCorretamente(){
        $product = new Product();
        $product->setName('Carro');
        $this->assertEquals('Carro', $product->getName(), 'Valores não são iguais');
    }

    Public function testSeOValorDoProdutoESetadoCorretamente(){
        $product = new Product();
        $product->setPrice(520.00);
        $this->assertEquals(520.00, $product->getPrice(), 'Valores não são iguais');
    }

    Public function testSeOSlugDoProdutoESetadoCorretamente(){
        $product = new Product();
        $product->setSlug('carro');
        $this->assertEquals('carro', $product->getSlug(), 'Valores não são iguais');
    }

}