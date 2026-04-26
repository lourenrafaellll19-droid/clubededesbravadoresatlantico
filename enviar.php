<?php

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];

// Pasta onde a foto será salva
$diretorio = "uploads/";
if (!is_dir($diretorio)) {
    mkdir($diretorio, 0755, true);
}

// Upload da imagem
$nomeArquivo = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

$caminho = $diretorio . basename($nomeArquivo);

if (move_uploaded_file($tmp, $caminho)) {

    $mensagem = "Nome: $nome $sobrenome\n";
    $mensagem .= "Email: $email\n";
    $mensagem .= "Telefone: $telefone\n";
    $mensagem .= "Foto salva em: $caminho\n";

    // Email que vai receber
    $destino = "lourenrafaelll19@gmail.com";
    $assunto = "Especialidade";

    mail($destino, $assunto, $mensagem);

    echo "Cadastro enviado com sucesso!";

} else {
    echo "Erro ao enviar a foto.";
}
?>
