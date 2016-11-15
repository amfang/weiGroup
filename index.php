<html>  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<title>Bluemix云端数据库服务使用示例———PHP投票程序 - 无知人生，记录点滴</title>  
<style>  
body {  
    margin:0; padding:0;  
}  
a{  
text-decoration:none;  
color:black;  
}  
  
div.div_id {  
    float:left;  
    clear:left;  
    width:60px;  
    height:27px;  
    border-bottom:solid 1px #808080;  
    text-align:center;  
    line-height:27px;  
}  
  
div.div_item {  
    float:left;  
    clear:none;  
    width:260px;  
    height:27px;  
    border-bottom:solid 1px #808080;  
    text-align:left;  
    line-height:27px;  
}  
  
div.div_radio {  
    float:left;  
    clear:none;  
    width:60px;  
    height:27px;  
    border-bottom:solid 1px #808080;  
    text-align:left;  
    line-height:27px;  
    display:none;  
}  
  
div.div_num {  
    float:left;  
    clear:right;  
    width:260px;  
    height:27px;  
    border-bottom:solid 1px #808080;  
    text-align:left;  
    line-height:27px;  
    display:none;  
}  
  
</style>  
<script src="jquery-1.4.2.min.js" type="text/javascript"></script>  
<SCRIPT language=javascript>  
  
$(document).ready(function(){  
    //判断是否已经投过票了，如果投过票了，就不再显示投票按钮，而是显示投票结果；  
    if (document.cookie == "" || document.cookie == "abc="){
    		var ck = document.cookie;
    		alert("cookie == " + ck +" null or abc=");	
        $("#button1").show();  
        $("div.div_radio").show();  
    }else{ 
    		alert("cookie == " + ck +" not null or abc= \\\\\ else"); 
        $("div.div_num").show();  
    }  
});  
  
//通过AJAX调用后台保存投票信息  
function execVote(){  
    var id = $('input[name="radio1"]:checked').val();  
    if (id == "" || id == undefined){  
        alert("请选择投票项！");  
        return;  
    }  
      
    $("#button1").hide();  
    $.ajax({  
       type: "POST",  
       url: "vote.php",  
       dataType:"html",  
       data: {"id":id},  
       success: function(data){  
         $("#div_num_" + id).text(parseInt($("#div_num_" + id).text()) + 1);  
         $("div.div_radio").hide();  
         $("div.div_num").show();  
         document.cookie = "abc=123";  
         console.log(data);  
       },  
       error: function(data){  
         console.log(data);  
         alert( "投票失败: " + data.responseText );  
       }  
    });  
} 

//通过AJAX调用后台翻译程序  
function doExecTrans(){  
	alert("cliecked！");
    var txt = $("#InputText").val(); 
    alert("input！"+txt); 
    if (txt == ""){  
        alert("请输入要翻译的文本！");  
        return;  
    }  
      
    //$("#ProgressDiv").show();  
    $.ajax({  
       type: "GET",  
       url: "trans.php",  
       dataType:"text",  
       data: {"txt":txt},  
       success: function(data){  
         //$("#ProgressDiv").hide();  
         console.log(data);
         alert("data: "+data); 
         if (data.error){  
            alert(data.error);  
         }else{  
            $("#OutputText").text(data.text); 
            alert("data: "+data); 
         }  
       },  
       error: function(data){  
         console.log(data);  
         alert( "Error Msg: " + data );  
         //$("#ProgressDiv").hide();  
       }  
    });  
}   
</SCRIPT>  
</head>  
  
<body>  
	<div>  
		<a href="http://blog.csdn.net/testcs_dn" target="_blank" title="无知人生，记录点滴 不积硅步，无以至千里；不积小流，无以成江海……">  
			<img src="" border=0 />  
		</a>  
	</div>  
	<div style="width:640px; height:0px; border-bottom:solid 1px #808080;text-align:center;">  
	<a href="http://blog.csdn.net/testcs_dn/article/details/49965993"><h3>Watson Translator</h3></a>  
	</div>  
	<div id="Wrapper" style="padding: 0px; margin: 0px; min-height:300px; text-align: center; background-color: rgb(255, 255, 255);">  
		<form>   
			<div style="width:640px; height:100px; border-bottom:solid 1px #808080;text-align:center; float:left; clear:both; margin-top:15px;"> 
				<textarea class="textarea" id="InputText" style="height:40px;">输入</textarea> 
				<input type="button" id="button1" name="button1" value="翻译" onclick="doExecTrans()" /> 
				<textarea class="textarea" id="OutputText" data-height="140px" style="height:40px;"></textarea>
			</div>  
		</form>
	</div>   
	<div style="margin:auto; text-align:center; line-height:28px;">云服务器：
		<a href="https://console.ng.bluemix.net/home/" target="_blank" title="IBM Bluemix 数字创新平台" style="">  
	    IBM Bluemix 数字创新平台  
		</a><br />  
			服务提供：
		<a href="https://www.ibm.com/smarterplanet/us/en/ibmwatson/developercloud/language-translation/api/v2/#introduction" target="_blank" title="IBM Watson Developer Cloud" style="">  
	    IBM Watson Language Translator  
		</a>  
	</div>  
	
	<div style="margin:auto; text-align:center; line-height:28px;">  
		<a href="http://blog.csdn.net/testcs_dn" target="_blank" title="无知人生，记录点滴 不积硅步，无以至千里；不积小流，无以成江海……" style="">  
		    Powered by:amfang<br />无知人生，记录点滴 不积硅步，无以至千里；不积小流，无以成江海……  
		</a>  
	</div>  
</body>  
</html>