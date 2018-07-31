<?php

/**
 * Description of clsClienteDAO
 *
 * @author assparremberger
 */

include_once CAMINHO.'dao/clsConexao.php';
include_once CAMINHO.'model/clsCliente.php';
include_once CAMINHO.'dao/clsClienteDAO.php';

class ClienteDAO {
    
    public static function inserir($cliente){
        $sql = "INSERT INTO cliente "
                . " ( nome, telefone, cpf, email, senha, "
                . "   admin ) VALUES "
                . " ( '".$cliente->getNome()."' , "
                . "   '".$cliente->getTelefone()."' , "
                . "   '".$cliente->getCpf()."' , "
                . "   '".$cliente->getEmail()."' , "
                . "   '".$cliente->getSenha()."' , "
                . "    ".$cliente->getAdmin()
                . "  ); ";
        
        $conn = new Conexao();
        $retorno = $conn->executar( $sql );
        return $retorno;
    }
    
    public static function editar($cliente){
        $sql = "UPDATE cliente SET " 
                . " nome =  '".$cliente->getNome()."' , "
                . " telefone =  '".$cliente->getTelefone()."' , "
                . " cpf =  '".$cliente->getCpf()."' , "
                . " email =  '".$cliente->getEmail()."' , "
                . " senha =  '".$cliente->getSenha()."' , "
                . " admin = ".$cliente->getAdmin()
                . " WHERE id = ".$cliente->getId();
        
        $conn = new Conexao();
        $retorno = $conn->executar( $sql );
        return $retorno;
    }
    
    
    public static function excluir($cliente){
        $sql = "DELETE FROM cliente "
             . " WHERE id =  ".$cliente->getId();
        
        $conn = new Conexao();
        $retorno = $conn->executar( $sql );
        return $retorno;
    }
    
    public static function getCliente(){
        $sql = " SELECT c.id, c.nome, c.telefone, c.cpf,"
             . " c.email, c.admin "
             . " FROM cliente c "
             . " ORDER BY c.nome ";
        $conn = new Conexao();
        $result = $conn->consultar($sql);
        $lista = new ArrayObject();
        while( list( $cod, $nome, $fone, $cpf, $mail,
                $admin) = mysqli_fetch_row($result) ){
           
            $cliente = new Cliente();
            $cliente->setId($cod);
            $cliente->setNome($nome);
            $cliente->setTelefone($fone);
            $cliente->setEmail($mail);
            $cliente->setCpf($cpf);
            $cliente->setAdmin($admin);
            
            $lista->append($cliente);
        }
        
        return $lista;
    }
    
    
    public static function getClienteById($idCliente){
        $sql = " SELECT c.id, c.nome, c.telefone, c.cpf,"
             . " c.email, c.admin "
             . " FROM cliente c "
             . " WHERE c.id = ".$idCliente ;
        $conn = new Conexao();
        $result = $conn->consultar($sql);
   
        list( $cod, $nome, $fone, $cpf, $mail, $admin) 
                = mysqli_fetch_row($result) ;
        

        $cliente = new Cliente();
        $cliente->setId($cod);
        $cliente->setNome($nome);
        $cliente->setTelefone($fone);
        $cliente->setEmail($mail);
        $cliente->setCpf($cpf);
        $cliente->setAdmin($admin);
          
        return $cliente;
    }
    
    public static function getFotoByIdCliente($idCliente){
        
        $sql = "SELECT foto FROM cliente "
                . " WHERE id = ".$idCliente;
        $conn = new Conexao();
        $result = $conn->consultar($sql);
        $dados = mysqli_fetch_assoc($result);
        return $dados['foto'];
        
    }
    
    public static function logar($login, $senha){
        
        $senha = md5($senha);
        
        $sql = "SELECT id, nome, admin FROM cliente "
                . " WHERE senha = '".$senha."' AND  "
                . " ( cpf = '".$login."' OR         "
                . "   email = '".$login."' )        ";
		echo $sql;
  
      
        $conn = new Conexao();
        
        $result = $conn->consultar($sql);
        
        if( mysqli_num_rows($result) > 0 ){
            $dados = mysqli_fetch_assoc($result);
            $cliente = new Cliente();
            $cliente->setId( $dados['id'] );
            $cliente->setNome( $dados['nome'] );
            $cliente->setAdmin( $dados['admin'] );
            return $cliente;
        }  else {
            return NULL;
        }
        
    }
    
}












