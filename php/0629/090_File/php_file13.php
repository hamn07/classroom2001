﻿<?php
$content = <<<useHTML
	<html>
	<head>
		<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
		<title>關於文淵閣工作室</title>
	</head>
	<body>
	<p>文淵閣工作室創立於1987年，第一本電腦叢書「快快樂樂學電腦」於該年底問世。工作室的創會成員－鄧文淵、李淑玲均為苦學出身，在學習電腦的過程中，一路顛簸走來，嚐遍人間冷暖。</p>
	<p>因此，決定整合自身的編輯、教學經驗及新生代的高手群，陸續推出 「快快樂樂全系列」 電腦叢書，冀望以輕鬆、深入淺出的筆觸、詳細的圖說，解決電腦學習者的徬徨無助，並搭配相關網站服務讀者。</p>
	<p>感謝您對文淵閣工作室的熱愛，也請您和我們在快快樂樂的氣氛中共同成長，突破極限、超越顛峰。謝謝大家！</p>
	</body>
	</html>
useHTML;
$filesize = file_put_contents("php_file13a.htm", $content);
echo "檔案寫入完成，大小為 $filesize bytes";
?>