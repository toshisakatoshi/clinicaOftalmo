<?php
/**
 * Description of clsCidadeDAO
 *
 * @author assparremberger
 */


include_once CAMINHO.'dao/clsConexao.php';
include_once CAMINHO.'model/clsCategoria.php';

class CategoriaDAO {
    
    public static function inserir($categoria){
        $sql = "INSERT INTO categoria "
                . " ( nome ) VALUES "
                . " ( '".$categoria->getNome()."' ) ; ";
        
        $conn = new Conexao();
        $retorno = $conn->executar( $sql );
        return $retorno;
    }
    
    public static function excluir($categoria){
        $sql = "DELETE FROM categoria "
             . " WHERE id =  ".$categoria->getId();
        
        $conn = new Conexao();
        $retorno = $conn->executar( $sql );
        return $retorno;
    }
    
    
    public static function getCategoria(){
        $sql = "SELECT id, nome FROM categoria "
             . " ORDER BY nome ";
        $conn = new Conexao();
        $result = $conn->consultar($sql);
        
        $lista = new ArrayObject();
        
        while( list( $cod, $nome) = mysqli_fetch_row($result) ){
            $categoria = new Categoria();
            $categoria->setId( $cod );
            $categoria->setNome( $nome );
            $lista->append($categoria);
        }
        
        return $lista;
    }
    
    
}





