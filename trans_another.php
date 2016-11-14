// powered by: testcs_dn  
// Blog: http://blog.csdn.net/testcs_dn  
// Create time: 2015/11/14  

<?php 
require 'vendor/autoload.php';

//获取get请求携带的参数  
function get($paramName){  
    if(is_array($_GET)&&count($_GET)>0)//判断是否有Get参数   
    {   
        if(isset($_GET[$paramName]))//判断所需要的参数是否存在，isset用来检测变量是否设置，返回true or false   
        {   
            return $_GET[$paramName];//存在   
        }   
    }  
    return "";  
}  
  
//要翻译的文本  
$txt=get("txt");  
if ($txt == ""){  
    exit('{"error":"请输入要翻译的文本！"}');  
}  
  

//设置凭证 
$username = '896aa01c-ba0a-4ae8-84fc-8a9c555dd75b';
$password = 'YDZ4ns7bWme7';
 
//curl_setopt($ch, CURLOPT_USERPWD, '896aa01c-ba0a-4ae8-84fc-8a9c555dd75b:YDZ4ns7bWme7');  
 
//执行请求  
//$output = curl_exec($ch); 
$translator = TranslatorFactory::getTranslator($username, $password); 
$testToTranslate = $txt;
$targetLangeCode = 'en';

$output = $translator->simpleTranslate($testToTranslate, $targetLangeCode);
echo '{"text":"'.$output.'"}';
echo "<script>alert(\""."output:".$output."\")</script>";
//echo PHP_EOL; 
/*if($output === false)  
{  
    echo curl_error($ch);  
}  
else  
{  
    //echo '操作完成没有任何错误<br />';  
    //打印获得的数据  
    echo '{"text":"'.$output.'"}';  
    echo "<script>alert(\""."output:".$output."\")</script>";  
    //var_dump($output);  
    //var_dump($ch);  
    //$httpCode = curl_getinfo($ch,CURLINFO_HTTP_CODE);   
    //var_dump(curl_getinfo($ch));  
}*/ 
  
// Close handle  
//curl_close($ch); 

?>