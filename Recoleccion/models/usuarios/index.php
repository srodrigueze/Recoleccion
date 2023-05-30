<?php include ("../../controllers/usuarios/index.php")?>
<?php  include ("../../views/layouts/header.php"); ?>


<br>
<h2>Usuarios</h2>
<div class="card">
    
    <div class="card-header">
    <a name="" id="" class="btn btn-primary" 
        href="create.php" role="button">
        Crear usuario
        </a>
    </div>
    <div class="card-body">
    <div class="table-responsive-sm">
    <table class="table" id="tabla_id">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre completo</th>
                <th scope="col">Correo</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($list_tbl_usuarios as $register){?>
                <tr class="">
                <td scope="row"><?php echo $register['ID'];?></td>
                <td><?php echo $register['NOMBRE'];?></td>
                <td><?php echo $register['CORREO'];?></td>
                <td>
                    <a class="btn btn-warning" href="update.php?txtID=<?php echo $register['ID']?>" role="button">Editar</a> 
                    <a class="btn btn-danger" href="javascript:borrar(<?php echo $register['ID']?>)" role="button">Eliminar</a>
                </td>
            </tr>
                <?php }?>
            
        </tbody>
    </table>
</div>
    </div>

</div>



<?php include ("../../views/layouts/footer.php");?>