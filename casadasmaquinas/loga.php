<?php 
if ($_POST) {
  if ($_POST['segredo']==='iceman') {
    $cookie_name = "user";
    $cookie_value = "logado";
    $expiry_time = time() + (3600);
    $cookie_path = "/";
    setcookie($cookie_name, $cookie_value, $expiry_time, $cookie_path);
    $vai="<script>
window.location.href = 'controla.php';
</script>";
echo $vai;

  }else{
    $vai="<script>
window.location.href = 'controla.php';
</script>";
echo $vai;

  }
}
