<?php

namespace Code;

class Carrinho
{

    private $produtos = [];

    public function addProduto($produto, Log $log = null)
    {
        
        $this->produtos[] = $produto;
        if(!is_null($log))
            $log->log('Adicionando Produto no carrinho');
    }

    public function getProdutos(): array
    {
        return $this->produtos;
    }

    public function totalProduto()
    {
        return count($this->produtos);
    }

    public function totalCompra()
    {
        $totalCompra = 0;
        foreach ($this->produtos as $p) {
            $totalCompra += $p->getPrice();
        }

        return $totalCompra;
    }
}
