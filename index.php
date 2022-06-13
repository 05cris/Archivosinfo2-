<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
	<script>
		$(document).on("click","#btn_publicaciones",()=>{
			const usuario=$("pub_usuario").val();
			const descripcion=$("pub_descripcion").val();
			const estado=$("pub_estado").val();

			$.ajax({
				url:'acciones_publicaciones.php',
				data:{usuario:usuario,descripcion:descripcion,estado:estado},
				type:'POST',
				dataType:'json',
				success:(data)=>{
					console.log(data);


					$("#estado").text(data[0].pub_usuario);
					$("#publicaciones").text(data[0].pub_descripcion);
					if(data[0].pub_estado=='Alegre'){
						$(".cont_publicaciones").removeClass("bg-primary");
						$(".cont_publicaciones").addClass("bg-warning");
						$(".cont_publicaciones").addClass("bg-success");
					}
					if(data[0].pub_estado=='Triste'){
						$(".cont_publicaciones").removeClass("bg-success");
						$(".cont_publicaciones").addClass("bg-warning");
						$(".cont_publicaciones").addClass("bg-primary");
					}
					if(data[0].pub_estado=='Molesto'){
						$(".cont_publicaciones").removeClass("bg-success");
						$(".cont_publicaciones").addClass("bg-primary");
						$(".cont_publicaciones").addClass("bg-warning");
				}

				},error:(des,estado)=>{
					//500 401 404 200
		        },

	            })

	});
	</script>
</head>
<body>
	<h1 class="bg-success">VN-book</h1>

	<div class="container">


    <div class="row">
    	<div class="col-md-6">
		<input type="text" placeholder="Usuario" class="form-control">
		<textarea name="" id="" rows="2" class="form-control"></textarea>
		<input type="file" class="form-control" >
		<select name="" id="" class="form-control bg-dark">
			<option value="">Elija una Opcion</option>
			<option value="Alegre">Alegre</option>
			<option value="Triste">Triste</option>
			<option value="Molesto">Molesto</option>
		</select>
		<div class="d-grid gap-2">
			
		<button class="btn btn-primary">Publicar</button>
	</div>
</div>
<div class="col-md-6">
	<img src="no-image.jpg" width="250px" alt="">
</div>
</div>


<div class="row">
	<div class="col-md-4">
		
		<div class="card cont_publicacion"  style="width: 10rem;">
			<img src="images.jpg" class="card-img-top" alt="...">
			<div class="card-body">
				<h3 id="estado">Estado</h3>
				<p class="card-text" id="publicacion">Descripcion</p>
			</div>
		</div>

	</div>
</div>

<div class="row">
	<div class="col-md-4">
		<h5 id="usuario"></h5>
	</div>
</div>



       </div>
</body>
</html>