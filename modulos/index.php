<?php

include("../conexion.php");


    $stm=$conexion->prepare("SELECT * FROM clientes");
    $stm->execute();
    $clientes=$stm->fetchAll(PDO::FETCH_ASSOC);

    if (isset($_GET['id']))
    
    {
        $id=(isset($_GET['id'])?$_GET['id']:"");
        $stm=$conexion->prepare("DELETE FROM clientes WHERE id=:id");
        $stm->bindParam(':id',$id);
        $stm->execute();
        header("location:index.php");
    }


?>


<?php include("../template/headers.php");?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#created">
  Agregar
</button>
<br><br><br>

<div class="table-responsive">
    <table class="table">
        <thead class="table table-dark">
            <tr>
                <th scope="col">N°</th>
                <th scope="col">Cliente</th>
                <th scope="col">Doc. Cliente</th>
                <th scope="col">Telefono</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($clientes as $cliente){?>
            <tr class="">
                <td scope="row"><?php echo $cliente['id'];?></td>
                <td><?php echo $cliente['razon_social'];?></td>
                <td><?php echo $cliente['documento'];?></td>
                <td><?php echo $cliente['telefono'];?></td>
                <td>
                <a href="update.php?id=<?php echo $cliente['id'];?>" class="btn btn-warning">Editar</a>
                <a href="index.php?id=<?php echo $cliente['id'];?>" class="btn btn-danger">Eliminar</a>

                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>
<?php include("created.php");?>



<?php include("../template/footer.php");?>