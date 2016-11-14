<?php 
// powered by: testcs_dn  
// Blog: http://blog.csdn.net/testcs_dn  
// Create time: 2015/11/14
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
/*{
  "url": "https://gateway.watsonplatform.net/language-translator/api",
  "password": "DxroFiHZ7fv7",
  "username": "5a8d0999-b729-4484-a74e-ca718dd0b3a4"
{
  "url": "https://gateway.watsonplatform.net/language-translation/api",
  "password": "VMC5PB752Dho",
  "username": "b176da42-79a5-411c-a84c-d02806fcda67"
}
}*/
//服务URL  
//$url = "https://gateway.watsonplatform.net/language-translation/api/v2/translate?source=en&target=es&text=".$txt;
//$cookie_jar = tempnam('./tmp','cookie');
//$cookie_file = dirname(__FILE__).'/cookie.txt';
//$authUrl = "https://gateway.watsonplatform.net/language-translation/api"; 
//https://gateway.watsonplatform.net/language-translator/api 
//https://gateway.watsonplatform.net/language-translation/api/v2/translate?source=en&target=es&text=hello 
//curl -u "{username}":"{password}""https://gateway.watsonplatform.net/language-translation/api/v2/translate?source=en&target=es&text=hello"
/*<?php  
     $ch = curl_init();  
     curl_setopt($ch, CURLOPT_URL, "http://club-china");  
     /*CURLOPT_USERPWD主要用来破解页面访问控制的 
     *例如平时我们所以htpasswd产生页面控制等。*/ 
     /*//curl_setopt($ch, CURLOPT_USERPWD, '231144:2091XTAjmd=');  
     curl_setopt($ch, CURLOPT_HTTPGET, 1);  
     curl_setopt($ch, CURLOPT_REFERER, "http://club-china");  
     curl_setopt($ch, CURLOPT_HEADER, 0);  
     $result=curl_exec($ch);  
     curl_close($ch);  
     ?>
$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, 0); //不返回header部分  
curl_setopt($ch, CURLOPT_URL, $authUrl);  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  
//https请求必须设置以下两项  
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);  
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);  
  
//设置凭证  
curl_setopt($ch, CURLOPT_USERPWD, 'b176da42-79a5-411c-a84c-d02806fcda67:VMC5PB752Dho');  
 
curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_jar);
 
//执行请求 
curl_exec($ch);

//echo '{"ch":"'.$out.'"}'; 
curl_close($ch); */

//tranlator
$url = "https://gateway.watsonplatform.net/language-translation/api/v2/translate?source=en&target=es&text=".$txt;

$ch1 = curl_init();  
//curl_setopt($ch, CURLOPT_HEADER, 0); //不返回header部分
curl_setopt($ch1, CURLOPT_URL, $url);  
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);  
//https请求必须设置以下两项  
curl_setopt($ch1, CURLOPT_SSL_VERIFYHOST, 0);  
curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, FALSE);  
  
//设置凭证
//curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_jar);  
curl_setopt($ch, CURLOPT_USERPWD, 'b176da42-79a5-411c-a84c-d02806fcda67:VMC5PB752Dho');
  
//执行请求 
$output = curl_exec($ch1);  
  
if($output === false)  
{  
    echo curl_error($ch1);  
    //echo "<script>alert(\""."output:".$output."\")</script>";
}  
else  
{  
    //echo '操作完成没有任何错误<br />';  
    //打印获得的数据  
    echo '{"text":"'."apple+1+".$output.'"}';  
    //echo "<script>alert(\""."output:".$output."\")</script>";  
    //var_dump($output);  
    //var_dump($ch);  
    //$httpCode = curl_getinfo($ch,CURLINFO_HTTP_CODE);   
    //var_dump(curl_getinfo($ch));  
}  
  
// Close handle  
curl_close($ch1); 

?>