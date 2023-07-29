<?php
//0. SESSION開始！！
session_start();

//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
$name =     $_POST["name"];
$lid =     $_POST["lid"];
$lpw =      $_POST["lpw"];
$kanri_flg =      $_POST["kanri_flg"];
$life_flg =      $_POST["life_flg"];
$pw = password_hash($lpw, PASSWORD_DEFAULT);


//2. DB接続します
include("funcs.php");
$pdo = db_conn();

//LOGINチェック
sschk();

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_user_table(name,lid,lpw,kanri_flg,life_flg)VALUES(:name, :lid, :lpw, :kanri_flg, :life_flg);");
$stmt->bindValue(':name',     $name,      PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid',      $lid,       PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw',      $pw,        PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kanri_flg',$kanri_flg, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':life_flg', $life_flg,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  sql_error($stmt);
  // $error = $stmt->errorInfo();
  // exit("SQL_ERROR:".$error[2]);
}else{
    redirect("bm_view_user.php");
  exit();
}
?>
