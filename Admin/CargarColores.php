
 <?php 

 include "../conexion.php";
$sql= "select * from `Producto` where `id`= 97";

if(mysqli_query($conn, $sql)){
	$all_row = mysqli_query($conn, $sql);
	$row = $all_row ->fetch_assoc();
}


 $colores = explode(",", $row['Colores']);  ?>
        
        <?php 
        $coloresMostrar = array();
        $sql = "Select * from `Colores` ";
        if(mysqli_query($conn, $sql)){
            $all_row = mysqli_query($conn, $sql);
        }
         if(isset($all_row) && is_object($all_row) && count($all_row)): $i=0;
            foreach ($all_row as $key => $Colores) {
            for ($i = 0; $i < count($colores); $i++) {
                if ($Colores['id'] === $colores[$i]){
                    array_push($coloresMostrar, $Colores['nombre']);
                }
            }
            
            }
           
            endif;   
       ?>
