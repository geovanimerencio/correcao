<?php
include 'contatos.class.php';

$contato = new contato();

?>
<h1>Contatos</h1>

<a href="adicionar.php">[ ADICIONAR ]</a><br><br>

<table border="1" width="600">
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>E-MAIL</th>
        <th>ACOES</th>
    </tr>
    <?php
        $lista = $contato->getAll();
        foreach($lista as $item):
    ?>
    <tr>
        <td><?php echo $item['id'];?></td>
        <td><?php echo $item['nome'];?></td>
        <td><?php echo $item['email'];?></td>
        <td>
            <a href="editar.php?email=<?php echo $item['email']; ?>">[EDITAR]</a>
            <a href="excluir.php?email=<?php echo $item['email']; ?>">[EXCLUIR]</a>
        </td>
    </tr>
   <?php endforeach;?>
</table>
