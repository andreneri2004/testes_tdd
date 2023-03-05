<?php

namespace Code;

use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{

    private $carrinho;
    private $produto;

    //como se fosse o construtor
    public function setUp(): void
    {
        $this->carrinho = new Carrinho();
    }

    //matas o processo
    public function tearDown(): void
    {
        unset($this->carrinho);
    }

    // public function testSeClasseCarrinhoExiste()
    // {
    //     $class = class_exists('\\Code\\Carrinho');
    //     $this->assertTrue($class);
    // }

    //nova funcionalidade
    public function assertPreConditions(): void
    {
        // Executada sempre antes dos testes e do método setUp();
        $class = class_exists('\\Code\\Carrinho');
        $this->assertTrue($class);
    }

    public function assertPostConditions(): void
    {
        // Executada sempre depois dos testes e do método tearDown();
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

        $carrinho = $this->carrinho;
        $carrinho->addProduto($produto1);
        $carrinho->addProduto($produto2);

        $this->assertIsArray($carrinho->getProdutos());
        $this->assertInstanceOf('\\Code\\Product', $carrinho->getProdutos()[0]);
        $this->assertInstanceOf('\\Code\\Product', $carrinho->getProdutos()[1]);
    }

    public function testSeValoresdoProdutoNoCarrinhoEstaCorretoConformePassado()
    {
        $produto1 = new Product();
        $produto1->setName('Mouse');
        $produto1->setPrice(500);
        $produto1->setSlug('mouse');


        $carrinho = $this->carrinho;
        $carrinho->addProduto($produto1);

        $this->assertEquals('Mouse', $carrinho->getProdutos()[0]->getName());
        $this->assertEquals('500', $carrinho->getProdutos()[0]->getPrice());
        $this->assertEquals('mouse', $carrinho->getProdutos()[0]->getSlug());
    }

    public function testSeValoresdoProdutoNoCarrinhoEstaCorretoConformePassadoComStubs()
    {

        //Produto esbolço ou stub, produto fake.
      
        $produtoStub = $this->getStubProduto();
        $carrinho = $this->carrinho;
        $carrinho->addProduto($produtoStub);

        $this->assertEquals('Produto 1', $carrinho->getProdutos()[0]->getName());
        $this->assertEquals(19.90, $carrinho->getProdutos()[0]->getPrice());
        $this->assertEquals('produto-1', $carrinho->getProdutos()[0]->getSlug());
    }

    public function testSeTotalDeProdutosEValorDaComporaEstaoCorretos()
    {
        $produto1 = new Product();
        $produto1->setName('Mouse');
        $produto1->setPrice(300);
        $produto1->setSlug('mouse');

        $produto2 = new Product();
        $produto2->setName('teclado');
        $produto2->setPrice(200);
        $produto2->setSlug('teclado');

        $carrinho = $this->carrinho;
        $carrinho->addProduto($produto1);
        $carrinho->addProduto($produto2);

        $this->assertEquals(2, $carrinho->totalProduto());
        $this->assertEquals(500, $carrinho->totalCompra());
    }

    //quando tem testes incompletos.
    public function testIncompleto()
    {
        $this->assertTrue(true);
        $this->markTestIncomplete('Teste Imcompleto');
    }

     /**
     * @requires PHP 9.2
     */
    public function testSeFeatureEspecificaParaVersaoPHPTrabalhaDeFormaEsperada()
    {
        //Modo padão,  acima via annotations
        // if(PHP_VERSION != '7.4.0'){
        //     $this->markTestSkipped('Este teste só roda para versão abaixo do PHP 7');
        // }

        $this->assertTrue(true);
    }

    //testar uma exeção versão antiga do phpunit

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Parâmetro inválido, informa um slug
     * @test
     */
    public function SeSetSlugLançaExceptionQuandoNãoInformada()
    {

        //Método apartir do phpUnit 9
        $this->expectException('\InvalidArgumentException');
        $this->expectExceptionMessage('Parâmetro inválido, informa um slug');

        $produto = new Product();
        $produto->setSlug('');
    }

    //Criando mock Objects(Objetos Falsos), problema ao passar o parametro $logMock

    public function testSeLogESalvoQaundoInformadoParaAAdiçãoProduto()
    {
        $carrinho = new Carrinho();

        $logMock = $this->getMockBuilder(Log::class)
                        ->onlyMethods(['log'])
                        ->getMock();

        $logMock->expects($this->once())
                ->method('log')
                ->with($this->equalTo('Adicionando produto no carrinho'));

                $this->markTestIncomplete('Teste Imcompleto');

        //$carrinho->addProduto($this->getStubProduto(), $logMock);
    }

    private function getStubProduto()
    {
        $produtoStub = $this->createMock(Product::class);
        $produtoStub->method('getName')->willReturn('Produto 1');
        $produtoStub->method('getPrice')->willReturn(19.90);
        $produtoStub->method('getSlug')->willReturn('produto-1');

        return $produtoStub;
    }

   
}
