<?php

$username = $_POST['username'];
$nome = $_POST['nome'];
$email = $_POST['username'];
$password = MD5($_POST['senha']);
$connect = mysql_connect('185.211.7.103','u792717350_bruno','Mamute12@');
$db = mysql_select_db('u792717350_DB_Isekai_Game');
$query_select = "SELECT username FROM users WHERE username = '$username'";
$select = mysql_query($query_select,$connect);
$array = mysql_fetch_array($select);
$logarray = $array['username'];

  if($login == "" || $login == null){
    echo"<script language='javascript' type='text/javascript'>
    alert('O campo login deve ser preenchido');window.location.href='
    cadastro.html';</script>";

    }else{
      if($logarray == $login){

        echo"<script language='javascript' type='text/javascript'>
        alert('Esse login já existe');window.location.href='
        cadastro.html';</script>";
        die();

      }else{
        $query = "INSERT INTO users (nome,username,password,email) VALUES ('$nome','$username','$password','$email')";
        $insert = mysql_query($query,$connect);

        if($insert){
          echo"<script language='javascript' type='text/javascript'>
          alert('Usuário cadastrado com sucesso!');window.location.
          href='index.html'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>
          alert('Não foi possível cadastrar esse usuário');window.location
          .href='cadastro.html'</script>";
        }
      }
    }
?>