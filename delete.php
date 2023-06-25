<?php
function inval($num){
    return (int)$num;
}
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $tabla=$_POST["table_name"];
        $reg_size=$_POST["register_size"];
        $valores_str=$_POST["numbers_list"];
        $valoresstr=explode(',',$valores_str);
        $valores_numericos=array_map('inval',$valoresstr);
        $url_=$_POST["url"];
        $band=false;
        for($i=0; $i<count($valores_numericos);$i++){
            if($id==$valores_numericos[$i]){
                $band=true;
                break;
            }
        }

        if(!$band){
            header("Location: ".$url_."?resultado=2");
            return 0;
        }
    
    require 'conection.php';
        if (!is_numeric($id)) {
            header("Location: ".$url_."?resultado=2");
            return 0;
        }
        $Squery='DELETE FROM '.$tabla.' where id_contacto='.$id;
        if(mysqli_query($conexion,$Squery)){
            mysqli_close($conexion);
            header("Location:".$url_."?resultado=1");
            return 0;
        }
    }
?>
