<?php
setcookie('user',$user['login'], time() - 300,"/");
header('Location: /');
