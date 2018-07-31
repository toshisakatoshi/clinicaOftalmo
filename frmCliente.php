<?php
    define("CAMINHO", $_SERVER['DOCUMENT_ROOT']."/clinicaOftalmo/");
    include_once CAMINHO.'dao/clsClienteDAO.php'; 
    include_once CAMINHO.'model/clsCliente.php'; 
    
    
    
   
    $action = "inserir";
    
    $nome = "";
    $telefone = "";
    $email = "";
    $cpf = "";
    
    if( isset($_REQUEST['editar']) ){
        $idCliente = $_REQUEST['idCliente'];
        
        $cliente = ClienteDAO::getClienteById($idCliente);
    
        $nome = $cliente->getNome();
        $telefone = $cliente->getTelefone();
        $email = $cliente->getEmail();
        $cpf = $cliente->getCpf();
        
        $action = "editar&idCliente=".$idCliente;
        
        
    }
    
    
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Clinica Oftalmo</title>
    </head>
    <body>
        <?php
            require_once 'cabecalho.php';
        ?>
        <h1 align="center">Usuário</h1>
        
        <br><br>
        
        <form action="controller/salvarCliente.php?<?php echo $action; ?>" method="POST"
              enctype="multipart/form-data">
            <label>Nome: </label>
            <input type="text" name="nome" value="<?php echo $nome; ?>" /> 
            
             <?php 
                if( isset( $_SESSION['admin']) && $_SESSION['admin']  ){
                    echo '<input type="checkbox" name="admin" />Administrador'; 
                    
                }
            ?>
            
            
            <br><br>
            
            <label>Telefone: </label>
            <input type="tel" name="telefone" value="<?php echo $telefone; ?>" /><br><br>     
            
            <label>CPF: </label>
            <input type="text" name="cpf" value="<?php echo $cpf; ?>" /> <br><br> 
                       
            </select> 
            
            <label>E-mail: </label>
            <input type="email" name="email" value="<?php echo $email; ?>" /> <br><br>     
            
            <label>Senha: </label>
            <input type="password" name="senha" /> <br><br>     
            
            <label>Confirme sua Senha: </label>
            <input type="password" name="senha2" /> <br><br>
            
            <input type="submit" value="Salvar" />
            <input type="reset" value="Limpar" />
            
        </form>
        
        
        
        
        
        <?php
            require_once 'rodape.php';
        ?>
    </body>
</html>
