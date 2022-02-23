<?php
    include 'contatos.class.php';

    $contato = new Contato();
    if(!empty($_GET['id'])) {
        $id = $_GET['id'];

        $info = $contato->getInfo($id);

        if(empty($info['email'])) {
            header("Location: index.php");
        }
    }else{
        header("Location: index.php");
        exit;
    }
?>

<h1>EDITAR</h1>

<form method="POST" action="editar_submit.php">
    <label>Nome: </label><br><br>
    <input type="text" name="nome" value="<?php echo $info['nome']; ?>" ><br><br>
    <label>E-mail: </label><br><br>
    <?php echo $info['email']; ?><br><br>
    <input type="submit" value="Salvar">
</form>