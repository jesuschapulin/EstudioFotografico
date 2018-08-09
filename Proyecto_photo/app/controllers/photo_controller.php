<?php

		require_once('../models/photo_model.php');
		$photo=new photo();
		
				$nombre=$_POST["nombre"];
				$nombre=utf8_decode($nombre);
				
				$categoria=$_REQUEST["categoria"];
				$datos=($photo->compara1($categoria));
				$datos=$datos[0];
				$categor=$datos["descripcion"];
				$categor=utf8_decode($categor);
				mkdir("../../resources/fotos/".$categor."/".$nombre."/", 0700, true);
				$foto=$_FILES["foto"]["name"];
				$ruta=$_FILES["foto"]["tmp_name"];
				$nombre=$_POST["nombre"];
				$nombre=utf8_decode($nombre);
				$destino="resources/fotos/".$categor."/".$nombre."/".$foto;
				copy($ruta,"../../".$destino);
				$nombre=$_POST["nombre"];
				$destino=utf8_encode($destino);	
				$new_avion_data= array(
						'nombre'=>$nombre,
						'categoria'=>$categoria,
						'destino'=>$destino
						);
				$photo->set($new_avion_data);
				header("Location: ../../views/index.php");
	
?>