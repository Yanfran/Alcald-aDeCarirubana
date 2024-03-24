<?php
include("../conexion/conexion.php");
include("../acceso/permisos.php");
$conexion=conexion();
if(getVerificar($conexion,"configuracion")){
	$nacionalidad=$_POST['nacionalidad'];
	$txtdocumento=$_POST['txtdocumento'];
	$txtnombre=$_POST['txtnombre'];
	$txtapellido=$_POST['txtapellido'];
	$txtfehca=$_POST['txtfecha'];
	$txttelefono=$_POST['txttelefono'];
	$txtcorreo=$_POST['txtcorreo'];
	$txtdireccion=$_POST['txtdireccion'];
	$txtuser=$_POST['txtuser'];
	$txtrol=$_POST['txtrol'];
	$txtclave=$_POST['txtclave'];

	function generador($longitud,$letras_min,$letras_may,$numeros,$simbolos)
	{
		
		$variacteres = $letras_min?'abdefghijklmnopqrstuvwxyz':'';
			//Hacemos lo mismo para letras mayúsculas,numeros y simbolos
		$variacteres .= $letras_may?'ABDCEFGHIJKLMNOPQRSTUVWXYZ':'';
			$variacteres .= $numeros?'0123456789':''; //NOTA: En el tutorial puse mal esta variable debe ser -numeros- y no -numero-.
			$variacteres .= $simbolos?'!#$%&/()?¡¿':'';

			//Inicializamos variable $i y $clv
			$i = 0;
			$clv = '';

			//repetimos el codigo segun la longitud
			while($i<$longitud)
			{
					//Generamos un numero aleatorio
				$numrad = rand(0,strlen($variacteres)-1);
					//Sacamos el la letra al azar
					//La función -substr()- se compone de substr($variable,posición_inicio,longitud de sub cadena);
				$clv .= substr($variacteres,$numrad,1);
					//Aumentamos a $i en 1 cada que entramos al while
				$i++;
			}

				//Mostramos la cadena generada por medio de -echo-
			return $clv;

		}

        // $clv=generador(10,true,true,true,false);
		$fecha= date('Y-m-d');
		if(empty($txtdocumento) || empty($nacionalidad) || empty($txtnombre) || empty($txtapellido) || empty($txtfehca) || empty($txttelefono) || empty($txtcorreo) || empty($txtdireccion) || empty($txtuser) || empty($txtclave)  || empty($txtrol)){
			?>
			<script>
				alert("Faltan datos por llenar");
			</script>
			<?php
			return;
		}else{
			$sql="SELECT * FROM usuario WHERE nombre='$txtuser' and status!='2'";
			$query=mysqli_query($conexion,$sql);
			$fila=mysqli_fetch_array($query);
			if(is_countable($fila)>0){
				echo 0;
			}else{
				$sql2="INSERT INTO usuario(nombre,clave,registro,id_rol,status) values('$txtuser','$txtclave','$fecha','$txtrol','1')";
				$query2=mysqli_query($conexion,$sql2);
				if($query2){
					$sql="SELECT * FROM usuario WHERE nombre='$txtuser' and status='1'";
					$query=mysqli_query($conexion,$sql);
					$id_user="";
					while($fila=mysqli_fetch_array($query)){
						$id_user=$fila[0];
					}
					$sql3="INSERT INTO detalle_usuario
					(documento,nombre,apellido,fecha_nac,telefono,correo,direccion,nacionalidad,id_usuario) 
					values
					('$txtdocumento','$txtnombre','$txtapellido','$txtfehca','$txttelefono','$txtcorreo','$txtdireccion','$nacionalidad','$id_user')";
					$query3=mysqli_query($conexion,$sql3);
					echo 1;
					
				}else{
					echo 2;
				}
			}
		}
	}
?>