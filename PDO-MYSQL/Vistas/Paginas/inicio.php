<?php

if(isset($_SESSION["loginValidate"])){

    if($_SESSION["loginValidate"] != "ok"){
        echo '<script>window.location = "index.php?pag=ingreso"</script>';
        return;
    }


}else{

    echo '<script>window.location = "index.php?pag=ingreso"</script>';
    return;
}
$users = controladorFormularios::ctrSeleccionarRegistros(null, null);


        

//echo '<pre>';  print_r($users); echo '</pre>';
?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>


    <?php foreach ($users as $key => $value): ?>
        <tr>
            <td><?php echo ($key + 1)?></td>
            <td><?php echo $value["name"];?></td>
            <td><?php echo $value["email"];?></td>
            <td><?php echo $value["fecha"];?></td>
            <td>
            <div class="btn-group">

                <div class="px-1">
                    <a href="index.php?pag=editar&token=<?php echo $value['token']; ?>" class="btn btn-warning"><img src="imagenes/edit.png"></a>
                </div>
                <div>
                    <form method="post">
                        <input type="hidden" value="<?php echo $value['token']; ?>" name="eliminarRegistro">
                        <button type="submit" class="btn btn-danger"><img src="imagenes/delete.png"></button>

                        <?php

                        $eliminar = new controladorFormularios();
                        $eliminar->ctrEliminarRegistro();
                        ?>
                    </form>
                </div>
            </div class="px-1">
            </td>
        </tr>
    <?php endforeach ?>
        
    </tbody>
    </table>