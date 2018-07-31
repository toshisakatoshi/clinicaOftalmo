
<?php

/**
 * Description of clsClienteDAO
 *
 * @author assparremberger
 */

include_once CAMINHO.'dao/clsConexao.php';
include_once CAMINHO.'dao/clsProdutoDAO.php';
include_once CAMINHO.'model/clsProduto.php';
include_once CAMINHO.'model/clsCategoria.php';

class ProdutoDAO {
    
    public static function inserir($produto){
        $sql = "INSERT INTO produto "
                . " ( nome, codigoBarras, preco, quantidade, codCategoria ) VALUES "
                . " ( '".$produto->getNome()."' , "
                . "   '".$produto->getCodigoBarras()."' , "
                . "    ".$produto->getPreco()." , "
                . "    ".$produto->getQuantidade()." , "
                . "    ".$produto->getCategoria()->getId()."  "
                . "  ); ";
        
        echo $sql;
        
        $conn = new Conexao();
        $retorno = $conn->executar( $sql );
        return $retorno;
    }
    
    public static function editar($produto){
        $sql = "UPDATE produto SET " 
                . " nome =  '".$produto->getNome()."' , "
                . " codigoBarras =  '".$produto->getCodigoBarras()."' , "
                . " preco =  ".$produto->getPreco()." , "
                . " quantidade =  ".$produto->getQuantidade()." , "
                . " codCategoria = ".$produto->getCategoria()->getId()."  "
                . " WHERE id = ".$produto->getId();
        
        $conn = new Conexao();
        $retorno = $conn->executar( $sql );
        return $retorno;
    }
    
    
    public static function excluir($produto){
        $sql = "DELETE FROM produto "
             . " WHERE id =  ".$produto->getId();
        
        $conn = new Conexao();
        $retorno = $conn->executar( $sql );
        return $retorno;
    }
    
    public static function getProdutos(){
        $sql = " SELECT p.id, p.nome, p.codigoBarras, p.preco, p.quantidade, "
             . " c.id, c.nome "
             . " FROM produto p "
             . " INNER JOIN categoria c "
             . " ON p.codCategoria = c.id "
             . " ORDER BY p.nome "; 
        $conn = new Conexao();
        $result = $conn->consultar($sql);
        $lista = new ArrayObject();
        while( list( $cod, $nome, $codigoBarras, $preco, $qtd, 
                    $codCat, $nomeCat) = mysqli_fetch_row($result) ){
            $categoria = new Categoria();
            $categoria->setId( $codCat );
            $categoria->setNome( $nomeCat );
            
            $produto = new Produto();
            $produto->setId($cod);
            $produto->setNome($nome);
            $produto->setCodigoBarras($codigoBarras);
            $produto->setPreco($preco);
            $produto->setQuantidade($qtd);
            $produto->setCategoria($categoria);
            
            $lista->append($produto);
        }
        
        return $lista;
    }
    
    
    public static function getProdutoById($idProduto){
         $sql = " SELECT p.id, p.nome, p.codigoBarras, p.preco, p.quantidade, "
             . " c.id, c.nome "
             . " FROM produto p "
             . " INNER JOIN categoria c "
             . " ON p.codCategoria = c.id "
             . " WHERE p.id = ".$idProduto ;
        $conn = new Conexao();
        $result = $conn->consultar($sql);
   
       list( $cod, $nome, $codigoBarras, $preco, $qtd, 
               $codCat, $nomeCat) = mysqli_fetch_row($result) ;
        $categoria = new Categoria();
        $categoria->setId( $codCat );
        $categoria->setNome( $nomeCat );

        $produto = new Produto();
        $produto->setId($cod);
        $produto->setNome($nome);
        $produto->setCodigoBarras($codigoBarras);
        $produto->setPreco($preco);
        $produto->setQuantidade($qtd);
        $produto->setCategoria($categoria);
          
        return $produto;
    
        
    }
}
