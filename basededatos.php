<?php
$host="localhost";
$user="root";
$pass="";
$database="ventacomando";

date_default_timezone_set('America/La_Paz');
setlocale(LC_CTYPE, "es_ES");
setlocale(LC_ALL, 'sp'); 
setlocale(LC_ALL,"es_ES@euro","es_ES","esp");

$sqlserver=0;

if($sqlserver){
    //sqlserver
    mssql_connect($host,$user,$pass) or die("No se Pudo conectar a la BD");
    mssql_select_db($database) or die("No se Pudo Seleccionar la BD");
}else{
    //mysql
    $l=mysql_connect($host,$user,$pass) or die("No se Pudo conectar a la BD");
    mysql_select_db($database,$l) or die("No se Pudo Seleccionar la BD");
}

function consulta($sql){
    //echo $sql;
    global $sqlserver,$l;
    if($sqlserver){
        $res=mssql_query($sql);
        $resultado =array ();
        if ($res)
        {
            while ($consF =mssql_fetch_assoc ($res))
            array_push ($resultado, $consF);
        }
       
    }else{
        $res=mysql_query($sql,$l);    
        $resultado =array ();
        if ($res)
        {
            while (@$consF =mysql_fetch_assoc ($res))
            array_push ($resultado, $consF);
        }
        //echo print_r($resultado);
        return $resultado;
    }
}
function insertarRegistro($nombretabla,$Values,$Todo=1,$sw=1){
    if($Todo==1){
        $fecha=date("Y-m-d");
        $hora=date("H:i:s");
        $CodUsuario=$_SESSION['CodUsuarioLog'];
        $Nivel=$_SESSION['Nivel'];
        
        if(!isset($Values['nivel'])&& empty($Values['Nivel'])){
            $Values['nivel']="$Nivel";
            if($Values['nivel']==""){
                $Values['nivel']=1;    
            }
        }
        if(!isset($Values['fecharegistro'])&& empty($Values['fecharegistro'])){
            $Values['fecharegistro']="'$fecha'";
        }
        if(!isset($Values['horaregistro'])&& empty($Values['horaregistro'])){
            $Values['horaregistro']="'$hora'";
        }
        if(!isset($Values['codusuario'])&& empty($Values['codusuario'])){
            $Values['codusuario']="$CodUsuario";
             if($Values['codusuario']==""){
                $Values['codusuario']=1;    
            }
        }
        $Values['activo']=1;
    }else{//,array("Activo"=>1)
        $Values=array_merge	($Values);	
    }
    $data=$Values;
    //print_r($Values);
    $key=array();
    $val=array();
    foreach($data as $k => $v){
        $key[]=$k;
        $val[]=$v;
    }
    $campos=implode(",",$key);
    $datos= implode(",",$val);
    ////
    $nombretabla=mb_strtolower($nombretabla,"utf8");
    if($sw==0)
        $query ="INSERT INTO {$nombretabla} VALUES ($datos)";
    else
        $query ="INSERT INTO {$nombretabla} ($campos) VALUES ($datos)";
        
    //echo $query."<br>";
    //echo "NO ESTA HABILITADO EL REGISTRO";
    consulta($query);
}
function actualizarRegistro($nombretabla,$Values,$cod){
    $data=$Values;
    //print_r($Values);
    $key=array();
    $val=array();
    foreach($data as $k => $v){
        $key[]=$k."=".$v."";
        $val[]=$v;
    }
    $campos=implode(",",$key);
    $datos= implode(",",$val);
    ////
    $nombretabla=mb_strtolower($nombretabla,"utf8");
    $query ="UPDATE {$nombretabla} SET $campos WHERE cod$nombretabla=".$cod;
        
    //echo $query."<br>";
    //echo "NO ESTA HABILITADO EL REGISTRO";
    consulta($query);
}
function eliminar($nombretabla,$cod){
    $sql="UPDATE $nombretabla SET activo=0 WHERE cod$nombretabla=".$cod;
    //echo $sql;
    consulta($sql);
}
function ultimo(){
    global $l;
    return mysql_insert_id($l);	
}
?>