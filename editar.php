<?php
    require_once "config.php";
    $id = $_GET['id'];
    global $db;
    $informacoes = array();
    
    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $sql = $db->prepare($sql);
    $sql->execute();
    
    if ($sql->rowCount()>0){
        $informacoes= $sql->fetch();
    }else{
        echo "<h1>Usuario nao existe</h1>";
        exit;
    }
    if($_POST){
        $nome = $_POST['nome'];
        $sobrenome= $_POST['sobrenome'];
        $senha= $_POST ['senha'];
        $sql= "UPDATE usuarios SET nome='$nome',sobrenome= '$sobrenome',senha= '$senha' WHERE id = $id";
        $sql= $db->prepare($sql);
        $sql->execute();
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./estilo.css"/>
</head>
<body>
<div class="container">
    <fieldset>
    <legend>EDITAR USUÁRIO</legend>
    <form method="POST">
        <label>Nome</label>
        <input type="text" class="form-control" name="nome" value="<?php echo $informacoes['nome']?>"/>
        <label>Sobrenome</label>
        <input type="text" class="form-control" name="sobrenome" value="<?php echo $informacoes['sobrenome']?>"/>
        <label>Usuário</label>
        <input type="text" class="form-control" name="usuario" value="<?php echo $informacoes['usuario']?>"/>
        <label>Senha</label>
        <input type="password" class="form-control" name="senha" value="<?php echo $informacoes['senha']?>"/>
        <br/><a href="index.php" class="btn btn-warning">Voltar</a>
        <button type="submit" class="btn btn-warning">Salvar</button>
    </form>
    <fieldset>
</div>
</body>
</html>