<!-- 下列 StrFind() 函式可取出以「特定文字開頭、特定文字結尾」的字串， -->
<!-- 不過，改用下列程式測試資料: -->
<!-- $sTest = "...<table>table1</table>...<table>table2</table>...<table>ooo<table>table3</table>ooo</table>..."; -->

<!-- 卻發現遇到巢套資料時，取出的標籤並不對稱: -->
<!-- echo StrFind ( $sTest, "<table>", "</table>", 3, TRUE ); -->


<!-- 家庭作業: -->

<!-- 1. 請協助修正上述 Bug。 -->

<!-- 2. 請幫忙加上註解。 -->

<!-- 3. 有辦法重構程式，將之改得好讀好維護一些嗎? -->

<?php
/**
 * 
 * @param String $sSource =>欲拆解的字串
 * @param String $sBeginWith =>起始字串
 * @param String $sEndWith => 結束字串
 * @param number $iTh => 第$iTh個出現起始字串的字元位置
 * @param string $bIncludeBeginEnd => 輸出網頁是否包含起始/結束字串
 * @return string
 */
function StrFind($sSource, $sBeginWith, $sEndWith, $iTh = 1, $bIncludeBeginEnd = TRUE) {
	$result = "";
	$iStartPosition = - 1;
	// 找到符合第$iTh個出現起始字串的字元位置
	for($i = 1; $i <= $iTh; $i ++) {
		$iStartPosition = strpos ( $sSource, $sBeginWith, $iStartPosition + 1 );
	}
	// 若沒有符合起始字串的樣式，則直接回傳空值
	if ($iStartPosition < 0)
		return $result;
	// 由起始字串的字元位置往後找, 找出符合結束字串的字元位置
	$iEndPosition = strpos ( $sSource, $sEndWith, $iStartPosition );
	// 若沒有符合結束字串的樣式，則直接回傳空值
	if ($iEndPosition < 0)
		return $result;
	// 計算 $iStartPosition <-> $iEndPosition之間有幾個起始字串($sBeginWith)
	$iCountBetweenBeginEnd=substr_count($sSource, $sBeginWith, $iStartPosition, $iEndPosition-$iStartPosition);
	// 再由$iEndPosition往後找到第幾個結束字串即為真正的結束字串字元位置
	for($i = 1; $i <= $iCountBetweenBeginEnd-1; $i ++) {
		$iEndPosition = strpos ( $sSource, $sEndWith, $iEndPosition+1 );
	}
	// 輸出網頁是否包含起始/結束字串
	if ($bIncludeBeginEnd) {
		$result = $sBeginWith . substr ($sSource, $iStartPosition + strlen ( $sBeginWith ), $iEndPosition - $iStartPosition - strlen ( $sBeginWith ) ) . $sEndWith;
	} 
	else
		$result = substr ( $sSource, $iStartPosition + strlen ( $sBeginWith ), $iEndPosition - $iStartPosition - strlen ( $sBeginWith ) );
	return $result;
}

$sTest = "...<table>table1</table>...<table>table2</table>...<table>ooo<table>table3</table>ooo</table>...";

echo StrFind ( $sTest, "<table>", "</table>", 1, TRUE );
echo "<hr>";
echo StrFind ( $sTest, "<table>", "</table>", 2, TRUE );
echo "<hr>";
echo StrFind ( $sTest, "<table>", "</table>", 3, TRUE );
?>