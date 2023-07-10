<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/sample.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php

// ファイルを開く
$file = fopen('data/data.txt', 'r'); 

// tableのHTMLを作成
echo "<table>
        <tr>
            <th>日時</th>
            <th>名前</th>
            <th>EMAIL</th>
            <th>会社名</th>
        </tr>";

// ファイルから読み込んだデータを配列に変換し、HTMLに埋め込んでいる
while ($str = fgetcsv($file)) {
    echo "<tr>";
    for ($i=0; $i<count($str); $i++) {
        echo "<td>".$str[$i]."</td>";
    }
    echo "</tr>";
}
echo "</table>";


// ファイル内容を1行ずつ読み込んで出力
// while ($str = fgets($file)) {
//     $myarray = explode(",", $str);
//     print "<tr> \n";

//     foreach ($myarray as $substr) {
//         print "<td>$substr</td>";
//         // echo nl2br($str); // nl2br() ... 改行文字//を追加
//     }
//     print "<tr> \n";

// }

// while ($str = fgets($file)) {
//     $myarray = explode(",", $str);

//         echo nl2br($str); // nl2br() ... 改行文字//を追加
//     }
// var_dump ($myarray);

fclose($file); // ファイルを閉じる


?>