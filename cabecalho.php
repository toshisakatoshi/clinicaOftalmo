<header id="menu">
    <a href="index.php">
         <link href="estilo.css" rel="stylesheet" />
         <button class="inicio">Início</button></a>
    
    <a href="produto.php">
        <button class="cadprod">Produtos</button></a>
    
        <?php
       
    if(session_status() != PHP_SESSION_ACTIVE )
        session_start();
    
    if ( isset( $_SESSION['logado'] )  &&
           $_SESSION['logado'] == TRUE ){
        
      ?>
    
    
    <a href="categoria.php">
        <button>Categorias</button></a>
    
   
    <a href="cliente.php">
        <button class="cadclie">Clientes</button></a>
    
    
    
    <a href="pedido.php">
        <button class="baix">Baixas</button></a>
    
    <a href="sair.php">
        <button class="sair">Sair</button></a>
    
    
    <?php echo $_SESSION['nome'] ?>, seja bem-vindo
    
    
    <?php
    
        }  else {
          
    ?>
    
<!--    <form action="entrar.php" method="POST" >
        <input type="text" 
               placeholder="E-mail / CPF: "
               name="login" />
        
        <input type="password" 
               placeholder="Senha: "
               name="senha" />
        
        <input type="submit" value="Entrar" />
            
    </form>-->
    
    <a href="frmCliente.php">
        <button>Cadastre-se</button></a>
    
    <?php
        }
    ?>
    
</header>