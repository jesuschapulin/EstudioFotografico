<?php
if(isset($_POST["action"])||isset($_GET["action"]))
	{
		require_once('../models/photo_model.php');
		$photo=new photo();
		$action=(isset($_POST["action"]))?$_POST["action"]:$_GET["action"];	
	
		switch($action)
		{
			case 'combo1':
				$photo=new photo();
				$val=1;
				print_r($photo->get_all($val)); 
			break;
			case 'tabla':
				$photo=new photo();
				$val=2;
				print_r($photo->get_all($val)); 
			break;
			case 'categorias':
				$photo=new photo();
				$val=3;
				print_r($photo->get_all($val));
			break;
			case 'albumes':
				$dato_album=$_POST["dato"];
				$photo=new photo();
				$val=4;
				print_r($photo->get_all($val,$dato_album));
			break;

			case 'fotos':
				$foto_album=$_POST["alb"];
				$photo=new photo();
				print_r($photo->edit($foto_album));
			break;

			case 'insert2':
				$mcategoria=$_POST["mcategoria"];
				//$mcategoria=utf8_decode($mcategoria);
				if(!$photo->compara($mcategoria)) 
				{
					
					$photo->get($mcategoria);
					?>
					<script type="text/javascript">
					var mcategoria=$("#mcategoria").val(''); 
					toastr["success"]("Registro", "Listo");
              		location.reload();
					</script>
					<?php
				}
				else
				{
					?>
					<script type="text/javascript">
					toastr["error"]("La Categoria Ya existe", "Error");
					</script>
					<?php
				}
				
				break;
				case 'delete':
					$id=$_POST["id"];
					$photo=new photo();
					$dat=($photo->compara2($id));
					$dat=$dat[0];
					$ruta=$dat["foto"];
					$ruta=utf8_decode($ruta);
					unlink("../../".$ruta);

					?>
					<script type="text/javascript">
					toastr["success"]("Foto eliminada", "Listo");
					$("#modaleliminar").modal('hide');
					
					location.reload();
					</script>
					<?php
					$photo->delete($id);
					break;

			default:
				echo "esto no esta bien";
			break;
	    }
    }
?>