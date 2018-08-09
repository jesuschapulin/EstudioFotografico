<?php session_start();

  if (!isset($_SESSION["sesion_ok"])) 
  {
    ?>
    <script type="text/javascript">
		window.location.assign("../")
	</script>
    <?php
  }
  else
  {
    $id_usuario=$_SESSION["id_usuario"];
  } 
  ?>		

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Admon</title>
	<link type="text/css" rel="stylesheet" href="../assets/css/buttons.dataTables.min.css">
    <link type="text/css" rel="stylesheet" href="../assets/css/jquery.dataTables.min.css"/>
    <link type="text/css" rel="stylesheet" href="../assets/css/dataTables.bootstrap.min.css"/>
    <link type="text/css" rel="stylesheet" href="../assets/css/responsive.dataTables.min.css"/>
    <link rel="stylesheet" href="../resources/css/toastr.min.css" />
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" />
	<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="../images/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="../assets/style.css">

	<link rel="stylesheet" href="login/style.css">
	
	<script src="../assets/js/jquery.js"></script>
	<script src="../assets/bootstrap/js/bootstrap.js" type="text/javascript" ></script>
	<script src="../assets/mobile/touchSwipe.min.js"></script>
	<script src="../assets/respond/respond.js"></script>
	<script src="../assets/gallery/jquery.blueimp-gallery.min.js"></script>
	<script type="text/javascript" src="../assets/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../assets/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="../assets/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="../assets/js/buttons.html5.min.js"></script>
	<script src="../resources/js/toastr.min.js"></script>
	<script src="../resources/js/bootstrap-confirmation.js"></script>
	
	<style>
	.tooltip .tooltip-inner {
    background-color:black;}
  </style>
	
</head>
<body>
	<div class="topbar animated fadeInLeftBig"></div>
	<div class="navbar">
      <div class="container">

        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="top-nav">
          <div class="container">
            <div class="navbar-header">
              <!-- Logo Starts -->
              <a class="navbar-brand" ><img src="../images/logo3.png" alt="logo"></a>
              <!-- #Logo Ends -->


              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
              <ul class="nav navbar-nav navbar-right scroll">
                 <li class="active"><a href="#Admon">Admon</a></li>
                 
                 <li ><a href="../" data-toggle="confirmation" data-placement="bottom" data-title="¿Pagina Principal?">Salir</a></li>

                 <li ><a href="login/" data-toggle="confirmation" data-placement="bottom" data-title="¿Regresar al login?">Regresar</a></li>
              </ul>
            </div>
            <!-- #Nav Ends -->

          </div>
        </div>

      </div>
    </div>
    <br>
    
   
	<div class="conteiner col-xs-12 col-md-4">
		<form action="../app/controllers/photo_controller.php" method="POST" enctype="multipart/form-data">
				<h3><b><i>Agregar Fotografias</i></b></h3>
				<div class="form-group">	 
				    <label for="nombre">Nombre Álbum</label>
				    <input type="text" class="form-control validate" name="nombre"  placeholder="Nombre Álbum" required>
				  </div>
			 	 <label for="categoria">Categoria</label>
				  	<div class="row">
					  <div class="form-group col-xs-7 col-md-7 " id="comboc" >
							    
					  </div>
					  <div class="form-group col-xs-5 col-md-5 ">
					  	<button type="button" class="btnn btn-warning" data-toggle="modal" data-target="#modalnueva">Nueva</button>
					  </div>
					</div>
				  <div class="form-group">
				    <label >Archivo</label>
				    <input type="file" name="foto" required>
				    
				  </div>
				  <div class="form-group">
				    <input type="submit" class="btn btn-warning" name="enviar" value="Agregar">
				  </div>
		</form>
	</div>
	<br>
	
	<div class="conteiner col-xs-12 col-md-8">
		<table class="table table-hover responsive" id="tab" cellspacing="0" width="100%">
			<thead>
	            <tr class="center">
	                <th data-field="nombre">No.</th>
	                <th data-field="nombre">Nombre Álbum</th>
	                <th data-field="price">Categoria</th>
	                <th data-field="price">Foto</th>
	                <th data-field="price">Eliminar</th>
	                <th data-field="price">Modificar</th>
	                <th data-field="price">Agregar</th>  
	            </tr>
	        </thead>
	        <tbody>
			 
			</tbody>
		</table>
	</div>
	<div class="modal fade" id="modalnueva">
	<form id="modall">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title"><b><i>Agregar Categoria</i></b></h4>
	        
	      </div>
	      <div class="modal-body">
	        	  <div class="form-group">	 
				    <label for="mcategoria">Nombre Categoria</label>
				    <input type="text" class="form-control validate" name="mcategoria" id="mcategoria"  placeholder="Nombre Categoria"  data-error=".error_mcategoria">
				  </div>
				<div class=" error_mcategoria" style="color: red;"></div>
	      </div>
	      <div class="modal-footer">
		      <div class="row col-md-offset-2">
		      <center>			
			     <div class="col-xs-12  col-md-5">
			        <button type="button" class="btn btn-warning" id="aceptar">Aceptar</button>
			      </div>
		        <div class="col-xs-12 col-md-2">
		        	<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
		        </div>
		        </center>
	       	 </div>
	      </div>
	    </div>
	  </div>
	  </form>
	</div>

	<div class="modal fade" id="modaleliminar">
	<form class="center">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h2 class="modal-title"><b><i>¿Seguro que desea eliminar?</i></b></h2>
	        
	      </div>

	      <div class="modal-footer">
		      <div class="row col-md-offset-2">
		      <center>			
			     <div class="col-xs-12  col-md-5">
			        <button type="button" class="btn btn-warning" id="aceptare">Aceptar</button>
			      </div>
		        <div class="col-xs-12 col-md-2">
		        	<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
		        </div>
		        </center>
	       	 </div>
	      </div>
	    </div>
	  </div>
	  </form>
	</div>

	<div class="modal fade" id="modalagregar">
	 <form action="../app/controllers/photo_controller.php" method="POST" enctype="multipart/form-data">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title"><b><i>Agregar Otra Foto</i></b></h4>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	     
	      <div class="conteiner col-xs-12 col-md-8 col-md-offset-2" id="agreg">
				<div class="form-group">	 
				    <label for="nombre">Nombre Álbum</label>
				   
				    <input type="text" class="form-control  nombre" name="nombre"  placeholder="Nombre Álbum">
				  </div>
			 	
				  	<div class="form-group">
					  <input type="text" style="display:none;"  class="form-control  categoria" name="categoria"  placeholder="categoria">
					</div>
				  <div class="form-group">
				    <label >Archivo</label>
				    <input type="file" name="foto" required>
				    
				  </div>
			</div>
		</form>
	      <div class="modal-footer">
		      <div class="row col-md-offset-2">
		      		
			     <div class="col-xs-12  col-md-5">
				    <input type="submit" class="btn btn-warning" name="enviar" value="Aceptar">
			      </div>
		        <div class="col-xs-12 col-md-2">
		        	<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
		        </div>
		      
	       	 </div>
	      </div>
	    </div>
	  </div>
	  
	</div>

	<div class="modal fade" id="modalmodificar">
	 <form action="../app/controllers/photo_controller.php" method="POST" enctype="multipart/form-data">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title"><b><i>Modificar Foto</i></b></h4>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	     
	      <div class="conteiner col-xs-12 col-md-8 col-md-offset-2" id="modificar">
				<div class="form-group">	
				<input type="text" style="display:none;" class="form-control  cat"  placeholder="categoria"> 
				    <label for="nombre">Nombre Álbum</label>
				   	
				    <input type="text" class="form-control  nombre" name="nombre"  placeholder="Nombre Álbum">
				  </div>
			 	
				  	<div class="form-group">
					  <input type="text" style="display:none;"  class="form-control  categoria" name="categoria"  placeholder="categoria">
					</div>
				  <div class="form-group">
				    <label >Archivo</label>
				    <input type="file" name="foto" required>
				    
				  </div>
			</div>
		</form>
	      <div class="modal-footer">
		      <div class="row col-md-offset-2">
		      		
			     <div class="col-xs-12  col-md-5">
				    <input type="submit" class="btn btn-warning modifica" name="enviar" value="Aceptar">
			      </div>
		        <div class="col-xs-12 col-md-2">
		        	<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
		        </div>
		      
	       	 </div>
	      </div>
	    </div>
	  </div>
	  
	</div>
	<div id="cont_request" style="display:none"></div>

	<div class="modal fade" tabindex="-1" role="dialog" id="modal-carro">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Modificar Carrusel</h4>
	      </div>
	      <div class="modal-body">
	        <div class="card-group">
	        <div class="row">
	          <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
	          	 <div class="card">
				    <img class="card-img-top img-responsive" src="../images/15ale.png" alt="Card image cap">
				    <div class="card-block">
				      <h4 class="card-title">Carrusel 1</h4>
				      <a href="#" class="btn btn-danger" id="edita-carro">Editar</a>
				    </div>
				  </div>
	          </div>
	          <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
	          	 <div class="card">
				    <img class="card-img-top img-responsive" src="../images/15ale.png" alt="Card image cap">
				    <div class="card-block">
				      <h4 class="card-title">Carrusel 1</h4>
				      <a href="#" class="btn btn-danger" id="edita-carro">Editar</a>
				    </div>
				  </div>
	          </div>
	          <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
	          	 <div class="card">
				    <img class="card-img-top img-responsive" src="../images/15ale.png" alt="Card image cap">
				    <div class="card-block">
				      <h4 class="card-title">Carrusel 1</h4>
				      <a href="#" class="btn btn-danger" id="edita-carro">Editar</a>
				    </div>
				  </div>
	          </div>
	        </div>
	      </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal" id="cerrar">Cerrar</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->




	<script type="text/javascript">

	$(document).ready(function() 
	{	
		$('[data-toggle=confirmation]').confirmation({
		  rootSelector: '[data-toggle=confirmation]',
		  // other options
		});
		$('[data-toggle="tooltip"]').tooltip(); 
		combo();
	     function combo()
	     {
	     	$.post("../app/controllers/combo_controller.php",{action:"combo1"},function(res)
            {
              datos = JSON.parse(res);
              var html="<select class='form-control' name='categoria' required>";
                html+="<option value='' disabled selected>Elige Categoria</option>";
              for(var i=0;i<datos.length;i++)
              {
                var dat=datos[i];
               html+="<option value="+dat['id_categoria']+">"+dat['descripcion']+"</option>";
              }

              html+="</select>";

              $("#comboc").html(html);
             
            });
            $.get("../app/controllers/combo_controller.php",{action:"tabla"},function(res){
              res = JSON.parse(res);
              var html="";
              $.each(res, function(i, item)
              {
                
                var btn_eliminar='<button class="btn_eliminar  btn btn-danger" data-position="left" data-delay="50" data-tooltip="Eliminar" data-id="'+item.codigo+'">Eliminar</button>';

                 var btn_modificar='<button class="btn_modificar btn btn-success" data-position="left" data-delay="50" data-tooltip="Modificar" data-nombre="'+item.nombre+'" data-id_categoria="'+item.id_categoria+'" data-id="'+item.codigo+'">Modificar</button>';
                 var btn_agregar='<button class="btn_agregar btn btn-warning" data-position="left" data-delay="50" data-tooltip="Agregar" data-nombre="'+item.nombre+'" data-id_categoria="'+item.id_categoria+'" data-id="'+item.codigo+'">Agregar</button>';



               html+="<tr><td>"+(i+1)+"</td><td>"+item.nombre+"</td><td>"+item.descripcion+"</td><td><img src='../"+item.foto+"' width='100' heigth='100'></td><td>"+btn_eliminar+"</td><td>"+btn_modificar+"</td><td>"+btn_agregar+"</td></tr>";
                //o puede ser numeros al azar y no el id (i+1) <td>"+item.descripcion"</td>
              });
              var f=new Date();
              var fecha_actual=f.getDate()+"/"+(f.getMonth()+1)+"/"+f.getFullYear();
              $("#tab tbody").html(html);
              
              $("#tab").DataTable();
            });
	     }
		    $("#tab").on("click","button.btn_eliminar",function()
	        {
	          var id=$(this).data("id");
	           $("#modaleliminar").modal('show');
	           $("#aceptare").click(function(event)
	           {
	            $.post("../app/controllers/combo_controller.php",{id:id,action:"delete"},function(request){
	            	$("#cont_request").html(request);
	            	
	            });
	             
	            
	          });
	         });
	       
	        $(".modifica").click(function(event)
	        {
	          	id=$("#modificar .cat").val();
	            $.post("../app/controllers/combo_controller.php",{id:id,action:"delete"});
				toastr["success"]("Foto Modificada", "Listo");

	        });
	      

	        $("#tab").on("click","button.btn_agregar",function()
	        {
	          var id=$(this).data("id");
	          var nombre=$(this).data("nombre");
	          var categoria=$(this).data("id_categoria");
	           $("#modalagregar").modal('show');
	          	$("#agreg .nombre").val(nombre);
	          	$("#agreg .categoria").val(categoria);
	        });
	        $("#tab").on("click","button.btn_modificar",function()
	        {
	          var id=$(this).data("id");
	          var nombre=$(this).data("nombre");
	          var categoria=$(this).data("id_categoria");
	           $("#modalmodificar").modal('show');
	           $("#modificar .cat").val(id);
	          	$("#modificar .nombre").val(nombre);
	          	$("#modificar .categoria").val(categoria);
	        });

	     $("#aceptar").click(function(event){
	     	$("#modall").submit();
	     });

	     $("#modall").validate({
        ignore:[],
        rules:{
          mcategoria: "required"
        },
        messages:{
          mcategoria:"Ingresa Categoria"
          
        },
        errorElement:"div",
        errorPlacement:function(error,element){
          var placement=$(element).data("error");
          if(placement)
            $(placement).append(error);
          else
            error.insertAfter(error);
        },
        submitHandler:function(form)
        {
        	var mcategoria=$("#mcategoria").val();       
              $.post('../app/controllers/combo_controller.php',{mcategoria:mcategoria,action:"insert2"},function(request){
                $("#cont_request").html(request);
              });

 		}

      });



	     
	   


	});
	</script>
	
</body>
</html>