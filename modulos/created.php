<?php
    if($_POST){
            $razon_social=(isset($_POST['razon_social'])?$_POST['razon_social']:"");
            $documento=(isset($_POST['documento'])?$_POST['documento']:"");
            $direccion=(isset($_POST['direccion'])?$_POST['direccion']:"");
            $nombre_contacto=(isset($_POST['nombre_contacto'])?$_POST['nombre_contacto']:"");
            $numero_doc_contacto=(isset($_POST['numero_doc_contacto'])?$_POST['numero_doc_contacto']:"");
            $telefono=(isset($_POST['telefono'])?$_POST['telefono']:"");
            $correo=(isset($_POST['correo'])?$_POST['correo']:"");

    $stm=$conexion->prepare("INSERT INTO clientes(
        id,
        razon_social,
        documento,
        direccion,
        nombre_contacto, 
        numero_doc_contacto,
        telefono, 
        correo)
        VALUES
        (NULL,:razon_social, :documento,:direccion,:nombre_contacto,
        :numero_doc_contacto,:telefono,:correo)");

    $stm->bindParam(":razon_social",$razon_social);
    $stm->bindParam(":documento",$documento);
    $stm->bindParam(":direccion",$direccion);
    $stm->bindParam(":nombre_contacto",$nombre_contacto);
    $stm->bindParam(":numero_doc_contacto",$numero_doc_contacto);
    $stm->bindParam(":telefono",$telefono);
    $stm->bindParam(":correo",$correo);
    $stm->execute();

    header("location:index.php");


    }
?>

<!-- CREAR CLIENTE -->
<div class="modal fade" id="created" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
      <div class="modal-body">
        <label for=""><b>Razón social</b></label>
        <input type="text" class="form-control" name=razon_social value="" required><br>
        <label for=""><b>Número de documento</b></label>
        <input type="text" class="form-control" name=documento value="" required><br>
        <label for=""><b>Dirección</b></label>
        <input type="text" class="form-control" name=direccion value="" required><br>
        <label for=""><b>Persona contacto</b></label>
        <input type="text" class="form-control" name=nombre_contacto value="" required><br>
        <label for=""><b>Número doc. persona contacto</b></label>
        <input type="text" class="form-control" name=numero_doc_contacto value="" required><br>
        <label for=""><b>Telefono</b></label>
        <input type="number" class="form-control" name=telefono value="" required><br>
        <label for=""><b>Correo electronico</b></label>
        <input type="email" class="form-control" name=correo value="" required><br>




        
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>