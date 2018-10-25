<?php
	function __autoload($class_name){
		require_once 'classes/' . $class_name . '.php';
}
?>

<!DOCTYPE HTML>
<html land="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
   <title>PHP OO</title>
  <meta name="description" content="PHP OO" />
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="css/style.css">
   <!--[if lt IE 9]>
      <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
   <![endif]-->
</head>
<body>

	<div class="container">

		<?php
		//instanciando o usuario
		$usuario = new Usuarios();

		//se tiver o post cadastrar, ele ira ja cadastrar
		if(isset($_POST['cadastrar'])):

			$nome  = $_POST['nome'];
			$email = $_POST['email'];
			/*pode serem feitas validacoes
			if($nome == ''){
			echo "digite um nome!";
		}
		*/

			$usuario->setNome($nome);
			$usuario->setEmail($email);

			# Insert
			if($usuario->insert()){
				echo "<span class = 'd-flex justify-content-center alert alert-primary'>" . "Inserido com sucesso!" . "</span>";
			}

		endif;

		?>


		<header class="masthead">
			<h1 class="text-muted d-flex justify-content-center">PHP OO</h1>
			<nav aria-label="Voltar para página inicial">
  <ul class="pagination justify-content-center">
    <li class="page-item"><a class="page-link" href="index.php">Página Inicial</a></li>
  </ul>
</nav>
		
		<?php 
		if(isset($_POST['atualizar'])):

			$id = $_POST['id'];
			$nome = $_POST['nome'];
			$email = $_POST['email'];

			$usuario->setNome($nome);
			$usuario->setEmail($email);

			if($usuario->update($id)){
				"<span class = 'd-flex justify-content-center alert alert-primary'>" . "Atualizado com sucesso!" . "</span>";
			}

		endif;
		?>
		
		
			
				
		<!-- mostra os dados por id no atualizar -->		
		<?php
		if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){

			$id = (int)$_GET['id'];
			$resultado = $usuario->find($id);
		?>
		<!-- Atualizar -->
		<form method="post" action="">
			<div class="row">
				<div class="col-md-6">
				<span class="add-on"><i class="icon-user"></i></span>
				<input class="form-control" type="text" name="nome" value="<?php echo $resultado->nome; ?>" placeholder="Nome:" />
			</div>
			<div class="col-md-6">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input class="form-control" type="text" name="email" value="<?php echo $resultado->email; ?>" placeholder="E-mail:" />
			</div>
		</div>
			<input type="hidden" name="id" value="<?php echo $resultado->id; ?>">
				<div class="btn-centralizado">
			<input type="submit" name="atualizar" class=" btn btn-primary" value="Atualizar dados">				
		</div>
		</form>

		<?php }else{ ?>


		<form method="post" action="">
			<div class="row">
				<div class="col-md-6">
				<span class="add-on"><i class="icon-user"></i></span>
				<input class="form-control" type="text" name="nome" placeholder="Nome:" />
			</div>
			<div class="col-md-6">
				<span class="add-on"><i class="icon-envelope"></i></span>
				<input class="form-control" type="text" name="email" placeholder="E-mail:" />
			</div>
			</div>
			<div class="btn-centralizado">
			<input type="submit" name="cadastrar" class="btn btn-primary" value="Cadastrar dados">		
			</div>			
		</form>

		<?php } ?>
		

		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				<?php echo $result; ?>
			</div>
			</div>

		<!-- Deletar -->
		<?php
		
		if(isset($_GET['acao']) && $_GET['acao'] == 'deletar'){

			$id = (int)$_GET['id'];
			if($usuario->delete($id)){
				'<div class = "alert alert-danger">' . "Deletado com sucesso!" . "</div>";
			}

		endif;
		?>

		<table class="table table-info table-hover table-bordered">
			
			<thead>
				<tr>
					<th class="text-muted">#</th>
					<th class="text-muted">Nome:</th>
					<th class="text-muted">E-mail:</th>
					<th class="text-muted">Ações:</th>
				</tr>
			</thead>
			<!--  Loop for each que mostrara todos os valores armazenados  -->
			<?php foreach($usuario->findAll() as $key => $value): ?>
	
			<tbody>
				<tr>
					<td><?php echo $value->id; ?></td>
					<td><?php echo $value->nome; ?></td>
					<td><?php echo $value->email; ?></td>

					 				<!-- Botões de açoes -->
					<td>
						<?php echo "<a class ='btn btn-warning'  href='index.php?acao=editar&id=" . $value->id . "'>Editar</a>"; ?>
						<?php echo "<a class ='btn btn-danger' href='index.php?acao=deletar&id=" . $value->id . "' onclick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?>
					</td>
				</tr>
			</tbody>

			<?php endforeach; ?>

		</table>

	</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>