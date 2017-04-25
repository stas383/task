<?php
include('simple_html_dom.php');

$url_list = array('http://midexpress.com.ua/smartfony-i-telefony.html', 'http://midexpress.com.ua/smartfony-i-telefony.html?start=12', 'http://midexpress.com.ua/zashchishchennyye-smartfony.html');
$out = '';
foreach($url_list as $urlsItem){	
			$output = curl_init();	
			curl_setopt($output, CURLOPT_URL, $urlsItem);	
			curl_setopt($output, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($output, CURLOPT_HEADER, 0);
			$out .= curl_exec($output);		
			curl_close($output);	
		}

$html = new simple_html_dom();	//создаем объект
		$html->load($out);	//помещаем наш контент
		$collection = $html->find('div[class=prodtitle] a'); 	
		foreach($collection as $collectionItem) 
		{
			$articles[] = $collectionItem->title;   //массив всех атрибутов, href в том числе
		}
		for ($i=0; $i <count($articles) ; $i++) { 

			echo $articles[$i]."<br>";

		}