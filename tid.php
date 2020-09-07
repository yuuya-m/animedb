<?php
if($_SERVER["REQUEST_METHOD"] != "POST"){
    // POSTがない場合
    $TID = "1";
}else{
    // フォームからPOSTによって要求された場合
    $TID = $_POST['tid'];
}

//print_r($TID);
$urla ="http://cal.syoboi.jp/json.php?Req=TitleFull&TID=";
$url = $urla . $TID;
$json = file_get_contents($url);
$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
?>

<html>
<head>

<meta charset="UTF-8">

<title>アニメデータベース(仮)</title>

</head>
<body>
<h1><a href="index.html">アニメデータベース(仮)</a></h1>
<h2>ここは、グローバルナビゲーションになる予定</h2>

<a>タイトルID(TID)</a>
<form action = "tid.php" method ="post">
<input type = "text" name = "tid" >
<input type = "submit" value ="検索">
</form>

<a>本サイトは　しょぼいカレンダー(https://cal.syoboi.jp/)　のAPIを使用しております。</a>
<br>
<br>
<h3>作品データ</h3>

<?php
$str = $json;

$result = preg_match_all('/"(.*?)"/', $str, $matches);


//print_r($matches[1][5]);


$ti = json_encode($matches);
?>

 <div class="container">
<table border="1" width="800">
<script>
	var ti = <?php echo $ti; ?>;
j = 1;
	for(var i = 0; i < ti[1].length; i++ ){
		if(i % 2 == 0){
			//表の左側
			switch(i){
				case 0:
					
					break;
				case 2:
					document.write("<tr><td style=\"width: 20%; word-break: break-all;\">タイトルID</td>");;
					break;
				case 4:
					document.write("<tr><td style=\"width: 20%; word-break: break-all;\">タイトル</td>");;
					break;
				case 6:
					
					break;
				case 8:
					document.write("<tr><td style=\"width: 20%; word-break: break-all;\">タイトルよみがな</td>");;
					break;
				case 10:
					document.write("<tr><td style=\"width: 20%; word-break: break-all;\">英語タイトル</td>");;
					break;
				case 12:
					
					break;
				case 14:
					
					break;
				case 16:
					document.write("<tr><td style=\"width: 20%; word-break: break-all;\">放送開始　年</td>");;
					break;
				case 18:
					document.write("<tr><td style=\"width: 20%; word-break: break-all;\">放送開始　月</td>");;
					break;
				case 20:
					document.write("<tr><td style=\"width: 20%; word-break: break-all;\">放送終了　年</td>");;
					break;
				case 22:
					document.write("<tr><td style=\"width: 20%; word-break: break-all;\">放送終了　月</td>");;
					break;
				case 24:
					
					break;
				case 26:
					
					break;
				case 28:
					
					break;
				case 30:
					
					break;
				case 32:
					
					break;
				case 32:
					
					break;
				case 34:
					document.write("<tr><td style=\"width: 20%; word-break: break-all;\">詳細情報</td>");;
					break;
				case 36:
					document.write("<tr><td style=\"width: 20%; word-break: break-all;\">サブタイトル<br>(各話タイトル)</td>");;
					break;
			default:
				document.write("<tr><td style=\"width: 20%; word-break: break-all;\">" + ti[j][i] + "</td>");
			}
		}else{
				//表の右側
			switch(i){
				case 1:
					
					break;
				case 7:
					
					break;
				case 13:
					
					break;
				case 15:
					
					break;
				case 25:
					
					break;
				case 27:
					
					break;
				case 29:
					
					break;
				case 31:
					
					break;
				case 33:
					
					break;
			default:
				if(ti[j][i] == null || ti[j][i] == ''){
					document.write("<td>" + "値がありません</td></tr>");
				}else{
					const text = ti[j][i];
					
					

					if(text.indexOf("\\u") != -1){
						if(text.indexOf("\\r\\n") != -1){
							
							const replaced1 = text.replace(/\\u/g, '%u')
							
							const replaced2 = replaced1.replace(/\\r\\n/g, '<br>')
							replaced = unescape( replaced2 )
							
							document.write("<td style=\"width: 70px; word-break: break-all;\"><div style=\"height:320px; overflow-x:scroll;\">"  + replaced + "</td></tr>");
						}else{
							const replaced1 = text.replace(/\\u/g, '%u')
							replaced = unescape( replaced1 )
							
							document.write("<td style=\"width: 70px; word-break: break-all;\">" + replaced + "</td></tr>");
						}
					}else{
						if(text.indexOf("\\r\\n") != -1){
							const replaced = text.replace(/\\r\\n/g, '<br>')
							document.write("<td style=\"width: 70px; word-break: break-all;\">" + replaced + "</td></tr>");
						}else{
							document.write("<td style=\"width: 70px; word-break: break-all;\">" + ti[j][i] + "</td></tr>");
						}
					}
				}
			}
		}	
	}


</script>
</table>
</div>

<br>
<br>



<br>
<br>

</body>
</html>