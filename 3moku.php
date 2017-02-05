<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>PHPテスト</title>
</head>
<body>

<p>〇✕ゲームです</p>

<p>
<?php
//盤面の状態を記録する配列
//1で〇、-1で×
$b = array();

$b[]= 0;
$b[]= 0;
$b[]= 0;
$b[]= 0;
$b[]= 0;
$b[]= 0;
$b[]= 0;
$b[]= 0;
$b[]= 0;

$i = 0;
//どちらの番か判断するための変数
$side = -1;
//配列を保存しているファイル名
$filename1 = 'save.txt';

//選択された箇所に印をつける
if (isset($_POST["get"])) {
    $kbn = htmlspecialchars($_POST["get"], ENT_QUOTES, "UTF-8");
    switch ($kbn) {  	 
        case "1": $b = unserialize(file_get_contents($filename1));//ファイル読み込み
        $b[0] = $side;//配列に変数を代入して印をつける
        $str1 = serialize($b);//セーブするデータの指定
        file_put_contents($filename1, $str1);//データをファイルにセーブする
	 	 break;
	 	 
        case "2": $b = unserialize(file_get_contents($filename1));
        $b[1] = $side;
        $str1 = serialize($b);
        file_put_contents($filename1, $str1);
		 break;
		 
        case "3": $b = unserialize(file_get_contents($filename1));
        $b[2] = $side;
        $str1 = serialize($b);
        file_put_contents($filename1, $str1);
		 break;
		 
        case "4": $b = unserialize(file_get_contents($filename1));
        $b[3] = $side;
        $str1 = serialize($b);
        file_put_contents($filename1, $str1);
		 break;
		 
        case "5": $b = unserialize(file_get_contents($filename1));
        $b[4] = $side;
        $str1 = serialize($b);
        file_put_contents($filename1, $str1);
		 break;
		 
        case "6": $b = unserialize(file_get_contents($filename1));
        $b[5] = $side;
        $str1 = serialize($b);
        file_put_contents($filename1, $str1);
		 break;
		 
        case "7": $b = unserialize(file_get_contents($filename1));
        $b[6] = $side;
        $str1 = serialize($b);
        file_put_contents($filename1, $str1);
		 break;
		 
        case "8": $b = unserialize(file_get_contents($filename1));
        $b[7] = $side;
        $str1 = serialize($b);
        file_put_contents($filename1, $str1);
		 break;
		 
        case "9": $b = unserialize(file_get_contents($filename1));
        $b[8] = $side;
        $str1 = serialize($b);
        file_put_contents($filename1, $str1);
		 break;
		 
		 //テスト用のリセット処理
		 case "0": $b = unserialize(file_get_contents($filename1));
		 for($i = 0;$i<9;$i++)
		 {
		 	$b[$i] = 0;
		 }
        $str1 = serialize($b);
        file_put_contents($filename1, $str1);
		 break;
		 
        default:  echo "エラー"; exit;
    }
}

//〇×チェック
for ( $i=0; $i<9; $i++ ) {
	if ( $b[$i]==1 ) {
		print "○";
	} 
	elseif ( $b[$i]==-1 ) {
		print "×";
	} 
	else {
		print "　";
	}
	if ( ($i==2) || ($i==5) || ($i==8) ) {
		print "<br />";
	} 
}

//勝敗チェック用クラス
class test
{
	public function check_winner($b)
	{
		$i = 0;
		for ( $i=0; $i<3; $i++ ) {
			if ( $b[$i*3+0]+$b[$i*3+1]+$b[$i*3+2]==3 ) {
				return 1;
			} elseif ( $b[$i*3+0]+$b[$i*3+1]+$b[$i*3+2]==-3 ) {
				return -1;
			}
		}
		for ( $i=0; $i<3; $i++ ) {
			if ( $b[0+$i]+$b[3+$i]+$b[6+$i]==3 ) {
				return 1;
			} elseif ( $b[0+$i]+$b[3+$i]+$b[6+$i]==-3 ) {
				return -1;
			}
		}
		if ( $b[0]+$b[4]+$b[8]==3 ) {
			return 1;
		} elseif ( $b[0]+$b[4]+$b[8]==-3 ) {
			return -1;
		}
		if ( $b[2]+$b[4]+$b[6]==3 ) {
			return 1;
		} elseif ( $b[2]+$b[4]+$b[6]==-3 ) {
			return -1;
		}
		for($i = 0;$i<9;$i++)
		{
			if($b[$i] == 0){
			return 2;
			}
		}
		return 0;
	}
}

$pic = new test();

if ($pic->check_winner($b)==1) {
	print "○の勝ち！\n";
} elseif ($pic->check_winner($b)==-1) {
	print "×の勝ち！\n";
} elseif ($pic->check_winner($b)== 0){
	print "引き分け！\n";
}
?>
</p>
<p>
<form method="POST" action="">
<input type="submit" value="1[]" name="get">　
<input type="submit" value="2[]" name="get">　
<input type="submit" value="3[]" name="get">　<br/>
<input type="submit" value="4[]" name="get">　
<input type="submit" value="5[]" name="get">　
<input type="submit" value="6[]" name="get">　<br/>
<input type="submit" value="7[]" name="get">　
<input type="submit" value="8[]" name="get">　
<input type="submit" value="9[]" name="get">　<br/>
<input type="submit" value="0[]" name="get">　
</form>
</p>

</body>
</html>
