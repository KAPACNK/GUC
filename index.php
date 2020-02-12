<?php
function GetValueByKey($fileName ,$key){
	//Открываем поток
	$handle = @fopen($fileName, "r");
	if ($handle) {
		//Построчно читаем из файлового указателя
	    while (($buffer = fgets($handle)) !== false) {
	    	//Ищим совпадение по регулярке
	    	if(preg_match('/('.$key.')\t(.*)\n/' ,$buffer, $match) != 0){
	    		//Если значение найдено, возвращаем
	    		return ($match[2]);
	    	}
	    }
	    //Если значение не найдено, возвращаем undefined
	    echo 'Не найдено значение по ключу '.$key;
	    return "undefined";
	    fclose($handle);
	}else{
		//Еслм не удалось открыть файловый поток, возвращаем undefined
		echo 'Не удалось открыть файл';
		return "undefined";
	}
}

//Проверка
$value = GetValueByKey('test.txt', "key___4");
echo("<br>Значение: " . $value);
echo "<br>";
echo "Памяти использовано:".memory_get_usage(true);
