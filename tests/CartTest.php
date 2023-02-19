<?php 

namespace Code;

use PHPUnit\Framework\TestCase;

class CartTest extends TestCase {

    public function testSeClasseCarrinhoExiste()
    {
        $class = class_exists('\\Code\\Carrinho');
        $this->assertTrue($class);
    }

    public function testAdicaoDeProdutosNoCarrinho()
    {
        $produto1 = new Product();
        $produto1->setName('Mouse');
        $produto1->setPrice(500);
        $produto1->setSlug('mouse');

        $produto2 = new Product();
        $produto2->setName('teclado');
        $produto2->setPrice(300);
        $produto2->setSlug('teclado');

        $carrinho = new Carrinho();
        $carrinho->addProduto($produto1);
        $carrinho->addProduto($produto2);

        $this->assertIsArray($carrinho->getProdutos());
        $this->assertInstanceOf('\\Code\\Product', $carrinho->getProdutos()[0]);

    }

    public function testSeValoresdoProdutoNoCarrinhoEstaCorretoConformePassado()
    {
        $produto1 = new Product();
        $produto1->setName('Mouse');
        $produto1->setPrice(500);
        $produto1->setSlug('mouse');

        $carrinho = new Carrinho();
        $carrinho->addProduto($produto1);

        $this->assertEquals('Mouse', $carrinho->getProdutos()[0]->getName());
        $this->assertEquals('500', $carrinho->getProdutos()[0]->getPrice());
        $this->assertEquals('mouse', $carrinho->getProdutos()[0]->getSlug());
    }

    public function testSeTotalDeProdutosEValorDaComporaEstaoCorretos()
    {
        $produto1 = new Product();
        $produto1->setName('Mouse');
        $produto1->setPrice(500);
        $produto1->setSlug('mouse');

        $produto2 = new Product();
        $produto2->setName('teclado');
        $produto2->setPrice(300);
        $produto2->setSlug('teclado');

        $carrinho = new Carrinho();
        $carrinho->addProduto($produto1);
        $carrinho->addProduto($produto2);

        $this->assertEquals(2, $carrinho->totalProduto());
        $this->assertEquals(800, $carrinho->totalCompra());
    }
}