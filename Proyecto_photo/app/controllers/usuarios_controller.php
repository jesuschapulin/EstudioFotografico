<?php session_start();

	if(isset($_POST["action"])||isset($_GET["action"]))
	{
		require_once('../models/usuarios_model.php');
		$usua=new Usuario();

		$action=(isset($_POST["action"]))?$_POST["action"]:$_GET["action"];
		switch ($action) {
				case 'sesion':
				$user=$_POST["user"];
				$password=$_POST["password"];

				if ($usua->get_all($user,$password))
				{
					$_SESSION["sesion_ok"]=true;
					$_SESSION["id_usuario"]=$datos_usuario["id_usuario"];
					
					?>
						<script type="text/javascript">
							toastr["success"]("Bienvenido", "¡Ok!");
							window.location.assign("../")
						</script>
					<?php
				} 
				else
				{
					?>
						<script type="text/javascript">
							toastr["error"]("Datos no encontrados", "¡Error!");
						</script>
					<?php
				}
			break;
		
		}
	}
	else
	{
		echo "Error";
	}
?>