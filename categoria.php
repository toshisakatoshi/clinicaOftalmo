
<?php

    session_start();
    
    if( ! isset( $_SESSION['logado']) ||  
            !$_SESSION['logado']  ) {
        header("Location: index.php");
    }  else {

    define("CAMINHO", $_SERVER['DOCUMENT_ROOT']."/clinicaOftalmo/" );
    include_once CAMINHO.'dao/clsCategoriaDAO.php';
    include_once CAMINHO.'model/clsCategoria.php';
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Clinica Oftalmo - Categoria</title>
        <link href="estilo.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <?php
            require_once 'cabecalho.php';
        ?>
        <h1 align="center">Categoria</h1>
        
        <br><br>
        <form action="controller/salvarCategoria.php?inserir" method="POST">
            <legend>Cadastrar nova Categoria</legend>
            <label>Nome: </label>
            <input type="text" name="nome" required />
            <input type="submit" value="Salvar" class="catsalva" />
        </form>
        
        <hr>
        
        <?php   
            
            
           $lista = CategoriaDAO::getCategoria();
            
           if( $lista->count() == 0 ){
               echo '<h2><b>Nenhuma categoria cadastrada</b></h2>';
           } else {
               
           
        ?>
        
        
        <table border="1">
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Excluir</th>
            </tr>
            
        <?php
            foreach ($lista as $categoria) {
                echo '<tr>
                        <td>'.$categoria->getId().'</td>
                        <td>'.$categoria->getNome().'</td>
                        <td>
                            <a href="controller/salvarCategoria.php?excluir&idCategoria='.$categoria->getId().'">             
                            <button class="btnExluir">Excluir</button></a>
                        </td>
                      </tr> ';     
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