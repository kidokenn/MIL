<?php
//0. SESSION開始！！
session_start();

//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
$name =     $_POST["name"];
$url =      $_POST["url"];
$comment =  $_POST["comment"];


//2. DB接続します
include("funcs.php");
$pdo = db_conn();

//LOGINチェック
sschk();

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(name,url,comment,indate)VALUES(:name, :url, :comment, sysdate());");
$stmt->bindValue(':name',   $name,    PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':url',    $url,     PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment',$comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  sql_error($stmt);
  // $error = $stmt->errorInfo();
  // exit("SQL_ERROR:".$error[2]);
}else{
  if($_SESSION["kanri_flg"]=="1"){
    redirect("bm_view_list_for_manager.php");
  }
  if($_SESSION["kanri_flg"]=="0"){
    redirect("bm_view_list_for_user.php");
  }
  exit();
}
?>
