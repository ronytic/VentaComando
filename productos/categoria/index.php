<?php

$folder="../../";
$titulo="Registro de Nueva Categoria";
include_once($folder."cabecerahtml.php");
?>
<?php include_once($folder."cabecera.php");?>
<div class="col-lg-offset-2 col-lg-8 col-sm-8 col-xs-8 trans" >
    <div class="well with-header with-footer">
    <div class="header bordered-blue">Datos de la Categoria</div>
        <form action="guardar.php" method="post">
        <table class="table table-hover">
            <tr>
                <td class="der">Nombre de la Categoria:</td>
                <td><input type="text" name="nombre" class="form-control" placeholder="Ej: Guantes"></td>
            </tr>
             <tr>
                <td class="der">Descripción:</td>
                <td><input type="text" name="descripcion" class="form-control"></td>
            </tr>
             <tr>
                <td class="der"></td>
                <td><input type="submit" name="" class=" btn btn-blue" value="Guardar"></td>
            </tr>
        </table>
        </form>
    </div>
</div>
<?php include_once($folder."pie.php");?>