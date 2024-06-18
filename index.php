<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teste";

$conn = new mysqli($servername, $username, $password, $dbname);

$message = '';

if ($conn->connect_error) {
  die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST["nome"];
  $idade = $_POST["idade"];
  $cidade = $_POST["cidade"];
  $colegio = $_POST["colegio"];

  $sql = "INSERT INTO MyGuests (nome, idade, cidade, colegio)
  VALUES ('$nome', '$idade', '$cidade', '$colegio')";

  if ($conn->query($sql) === TRUE) {
    $message = "Novo registro criado com sucesso";
  } else {
    $message = "Erro: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="shortcut icon" href="cadastro.svg" type="image/x-icon">
	  <link rel="manifest" href = "manifest.json">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
</head>

<body id="corpo">
    <main>
        <div id="janela-flutuante">
            <section>
                <h1 class="fodase">FORMULÁRIO</h1>
                <form action="index.php" method="post">
                    <input id="nome" name="nome" type="text" required autocomplete="off" placeholder="Nome">
                    <input id="idade" name="idade" type="text" required autocomplete="off" placeholder="Idade">
                    <input id="cidade" name="cidade" type="text" required autocomplete="off" placeholder="Cidade">
                    <input id="colegio" name="colegio" type="text" required autocomplete="off" placeholder="Colégio">                    
                    <button type="submit">Cadastrar Pessoa</button>
                </form>
                <?php
                if ($message) {
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }
                ?>
            </section>
        </div>
</main>  
<script>
	if('serviceWorker' in navigator){
		navigator.serviceWorker.register('/service-worker.js').then(registration => {console.log('Serviço Iniciado - Service Start', registration.scope);}).catch(error => {console.log('Falha na inicialização do serviço - Service Fail'),error});
		}
		
</script> 
    
</body>

</html>

