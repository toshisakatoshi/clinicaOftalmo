<?php

    session_start();
    
    if( ! isset( $_SESSION['logado']) ||  
            !$_SESSION['logado']  ) {
        header("Location: index.php");
    }  else {
        

    define("CAMINHO", $_SERVER['DOCUMENT_ROOT']."/clinicaOftalmo/");
    include_once CAMINHO.'model/clsCliente.php';
    include_once CAMINHO.'dao/clsClienteDAO.php';  
    
    
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Clinica Oftalmo - Cliente</title>
        <link href="estilo.css" type="text/css" rel="stylesheet" />
    </head>
    <body onload="erro()">
        
        <?php
            require_once 'cabecalho.php';
            
            if( isset($_REQUEST['erroInserir'])){
                echo '<script> '
                   . '    function erro(){'
                   . '       alert("Erro ao inserir"); '
                   . '    } '
                   . '</script>  ';
            }
            
            if( isset($_REQUEST['erroEditar'])){
                echo '<script> '
                   . '    function erro(){'
                   . '       alert("Erro ao editar"); '
                   . '    } '
                   . '</script>  ';
            }
            
        ?>
        <h1 align="center">Cliente</h1>
        
        <a href="frmCliente.php">
            <button>Cadastrar Cliente</button></a>
        
        <br>
        <br>
        
        <?php
        
        $lista = ClienteDAO::getCliente();
         
        if( $lista->count() == 0 ){
            echo '<h2><b>Nenhum cliente cadastrado</b></h2>';
        }  else {
            

          
        ?>
        
        <table border="1" width="100%">
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Telefone</th>                
                <th>E-mail</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
            
            <?php
            
            foreach ($lista as $cliente) {  
            ?>
           
                <td><?php echo $cliente->getId(); ?></td>
                <td><?php echo $cliente->getNome(); ?></td>
                <td><?php echo $cliente->getCpf(); ?></td>
                <td><?php echo $cliente->getTelefone(); ?></td>
                <td><?php echo $cliente->getEmail(); ?></td>
                <td> <a href="frmCliente.php?editar&idCliente=<?php echo $cliente->getId(); ?>"><button class="btnEditar">Editar</button></a>  </td>
                <td> <a href="controller/salvarCliente.php?excluir&idCliente=<?php echo $cliente->getId(); ?>"><button class="btnExluir">Excluir</button></a> </td>
            </tr>
            <?php  
            }
            ?>
           
            
            
        </table>
        
       
        <?php
        }
        
        
        
        
            require_once 'rodape.php';
        ?>
    </body>
</html>

<?php
    }