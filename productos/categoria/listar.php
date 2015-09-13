<?php

$folder="../../";
$titulo="Categorias";
include_once($folder."cabecerahtml.php");
?>
<?php include_once($folder."cabecera.php");?>
<div class="col-lg-offset-2 col-lg-8 col-sm-8 col-xs-8 trans" >
    <div class="well with-header with-footer">
    <div class="header bordered-blue">Búsqueda de Categorias</div>
        <form action="buscar.php" method="post" class="formulario" rel="respuestaformulario">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Nombre de la Categoria:</th>
                </tr>
            </thead>
            <tr>
                <td><input type="text" name="nombre" class="form-control" placeholder="Ej: Guantes"></td>
                <td><input type="submit" name="" class=" btn btn-blue" value="Buscar"></td>
            </tr>
        </table>
        </form>
    </div>
</div>
</div>
<div class="row">
<div class=" col-lg-12 col-sm-12 col-xs-12 trans" >
    <div class="well with-header with-footer" id="respuestaformulario">
    
     </div>
</div>
<?php include_once($folder."pie.php");?>