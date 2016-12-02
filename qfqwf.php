
        $result = mysqli_query($mysqli, $emailquery);
        $row_cnt = $result->num_rows;
        if ($row_cnt > 0){
          $query = "SELECT senha_adm FROM adm WHERE email_adm = '$username'";
          $result = mysqli_query($mysqli, $query);
          $getHash = mysqli_fetch_assoc($result);
          $gotHash = $getHash['senha_adm'];
          if ($result){
            if (password_verify($password, $gotHash)){
              header("location:painel.php");
            } else {
              echo "<script>alert('Usuário ou senha incorretos!');</script>";
            }
          } else {
            echo "<script>alert('ERRO INTERNO! Por favor tente novamente!');</script>";
          }
        } else {
          echo "<script>alert('Email não encontrado!');</script>";
        }
