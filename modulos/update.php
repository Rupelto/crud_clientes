<?php

include("../conexion.php");

if (isset($_GET['id']))
    
    {
        $id=(isset($_GET['id'])?$_GET['id']:"");
        $stm=$conexion->prepare("SELECT * FROM clientes WHERE id=:id");
        $stm->bindParam(':id',$id);
        $stm->execute();
        $registro=$stm->fetch(PDO::FETCH_LAZY);
        $razon_social=$registro['razon_social'];
        $documento=$registro['documento'];
        $direccion=$registro['direccion'];
        $nombre_contacto=$registro['nombre_contacto'];
        $numero_doc_contacto=$registro['numero_doc_contacto'];
        $telefono=$registro['telefono'];
        $correo=$registro['correo'];
    }


    if($_POST){
        $id=(isset($_POST['id'])?$_POST['id']:"");
        $razon_social=(isset($_POST['razon_social'])?$_POST['razon_social']:"");
        $documento=(isset($_POST['documento'])?$_POST['documento']:"");
        $direccion=(isset($_POST['direccion'])?$_POST['direccion']:"");
        $nombre_contacto=(isset($_POST['nombre_contacto'])?$_POST['nombre_contacto']:"");
        $numero_doc_contacto=(isset($_POST['numero_doc_contacto'])?$_POST['numero_doc_contacto']:"");
        $telefono=(isset($_POST['telefono'])?$_POST['telefono']:"");
        $correo=(isset($_POST['correo'])?$_POST['correo']:"");

$stm=$conexion->prepare("UPDATE clientes SET 
    razon_social=:razon_social,
    documento=:documento,
    direccion=:direccion,
    nombre_contacto=:nombre_contacto,
    numero_doc_contacto=:numero_doc_contacto,
    telefono=:telefono,
    correo=:correo
WHERE 
    id=:id");

$stm->bindParam(":razon_social",$razon_social);
$stm->bindParam(":documento",$documento);
$stm->bindParam(":direccion",$direccion);
$stm->bindParam(":nombre_contacto",$nombre_contacto);
$stm->bindParam(":numero_doc_contacto",$numero_doc_contacto);
$stm->bindParam(":telefono",$telefono);
$stm->bindParam(":correo",$correo);
$stm->bindParam(":id",$id);
$stm->execute();

header("location:index.php");


}






?>


<?php include("../template/headers.php");?>



<form action="" method="post">


        <input type="hidden" class="form-control" name=id value="<?php echo $id;?>"><br>
      
        <label for=""><b>Razón social</b></label>
        <input type="text" class="form-control" name=razon_social value="<?php echo $razon_social;?>" required><br>
        <label for=""><b>Número de documento</b></label>
        <input type="text" class="form-control" name=documento value="<?php echo $documento;?>" required><br>
        <label for=""><b>Dirección</b></label>
        <input type="text" class="form-control" name=direccion value="<?php echo $direccion;?>" required><br>
        <label for=""><b>Persona contacto</b></label>
        <input type="text" class="form-control" name=nombre_contacto value="<?php echo $nombre_contacto;?>" required><br>
        <label for=""><b>Número doc. persona contacto</b></label>
        <input type="text" class="form-control" name=numero_doc_contacto value="<?php echo $numero_doc_contacto;?>" required><br>
        <label for=""><b>Telefono</b></label>
        <input type="number" class="form-control" name=telefono value="<?php echo $telefono;?>" required><br>
        <label for=""><b>Correo electronico</b></label>
        <input type="email" class="form-control" name=correo value="<?php echo $correo;?>" required><br>




        
      <div class="modal-footer">
        <a href="index.php" class="btn btn-danger">Cancelar</a>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
      </form>

      <?php include("../template/footer.php");?>