<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/main.css" />
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
<title>ユーザー登録</title>
</head>
<body>

<header>
  <nav class="navbar navbar-default">ユーザー登録</nav>
</header>

<!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
<form name="form1" action="bm_insert_user.php" method="post">
NAME:<input type="text" name="name" />
ID:<input type="text" name="lid" />
PW:<input type="password" name="lpw" />
管理者(管理者の場合は1、そうでない場合は0をインプット):<input type="text" name="kanri_flg" />
life_flg(0をインプット):<input type="text" name="life_flg" />
<input type="submit" value="REGISTER" />
</form>


</body>
</html>