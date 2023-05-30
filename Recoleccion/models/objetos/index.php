<?php 
include ("../../controllers/objetos/index.php");
include ("../../views/layouts/header.php");
?>

<br>
<h2>Solidos</h2>

<div class="card">
    <div class="card-header">
        
        <a name="" id="" class="btn btn-primary" 
        href="create.php" role="button">
        Agregar reporte
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table" id="tabla_id">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Descrpcion</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha de reporte</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php foreach($list_tbl_objetos as $register){?>
                        <tr class="">
                            <td scope="row"><?php echo $register['ID'];?></td>
                            <td><?php echo $register['TIPO'];?></td>
                            <td>
                                <img width="50" 
                                src="<?php echo $register['IMAGEN']?>" 
                                class="img-fluid rounded" alt="" >
                            </td>
                            <td><?php echo $register['UBICACION'];?></td>
                            <td><?php echo $register['DESCRIPCION'];?></td>
                            <td><?php echo $register['ESTADO'];?></td>
                            <td><?php echo $register['FECHA'];?></td>
                            <td>
                            <a class="btn btn-warning" href="update.php?txtID=<?php echo $register['ID']?>" role="button">Editar</a> 
                            <a class="btn btn-danger" href="javascript:borrar(<?php echo $register['ID']?>)" role="button" role="button">Eliminar</a>
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
        
    </div>
    
</div>

<?php include ("../../views/layouts/footer.php");?>