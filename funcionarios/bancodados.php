<?php
// Verifica se o formulário foi enviado
if (isset($_POST['funcionarios'])){

        // Dados de conexão ao banco de dados MySQL
        $servername = "localhost"; // Host do banco de dados (padrão: localhost)
        $username = "root"; // Nome de usuário do banco de dados (padrão: root)
        $password = ""; // Senha do banco de dados (deixe em branco se não tiver configurado)
        $dbname = "cadastro"; // Nome do banco de dados
        $tabela = "funcionarios"; // Nome da tabela no banco de dados
    
        // Conecta ao banco de dados
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        // Verifica a conexão
        if ($conn->connect_error) {
            die("Erro na conexão com o banco de dados: " . $conn->connect_error);
        }
    
        // Obtém os valores enviados do formulário
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $dataNascimento = $_POST['dataNascimento'];
        $profissao = $_POST['profissao'];
        $senha = $_POST['senha'];
    
    
        // Insere os dados na tabela
        $sql = "INSERT INTO $tabela (nome, email, dataNascimento, profissao, senha) VALUES ('$nome', '$email', '$dataNascimento', '$profissao', '$senha')";
    
        if ($conn->query($sql) === TRUE) {
            echo "<h2>Cadastro realizado com sucesso!</h2>";
            echo "<p>Obrigado por se cadastrar.</p>";
        } else {
            echo "Erro ao inserir dados no banco de dados: " . $conn->error;
        }
    
        // Fecha a conexão com o banco de dados
        $conn->close();
    } else {
        // Se o formulário não foi enviado, exibe uma mensagem de erro
        echo "<p>Erro: O formulário não foi enviado corretamente.</p>";
    }
}

?>
