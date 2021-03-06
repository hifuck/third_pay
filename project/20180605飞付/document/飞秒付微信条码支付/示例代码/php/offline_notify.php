<? header("content-Type: text/html; charset=UTF-8");?>
<?php
/* *
 *功能：异步通知接口
 *版本：3.0
 *日期：2016-07-10
 *说明：
 *以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,
 *并非一定要使用该代码。该代码仅供学习和研究智付接口使用，仅为提供一个参考。
 **/
	
//////////////////////////	接收智付返回通知数据  /////////////////////////////////
/**
获取订单支付成功之后，智付通知服务器以post方式返回来的订单通知数据，参数详情请看接口文档,
*/	
	

	$merchant_code	= $_POST["merchant_code"];	
	
	$notify_type = $_POST["notify_type"];
	
	$notify_id = $_POST["notify_id"];

	$interface_version = $_POST["interface_version"];

	$sign_type = $_POST["sign_type"];

	$dinpaySign = base64_decode($_POST["sign"]);
	
	$order_no = $_POST["order_no"];

	$order_time = $_POST["order_time"];	

	$order_amount = $_POST["order_amount"];
	
	$extra_return_param = $_POST["extra_return_param"];

	$trade_no = $_POST["trade_no"];

	$trade_time = $_POST["trade_time"];
		
	$trade_status = $_POST["trade_status"];

	$bank_seq_no = $_POST["bank_seq_no"];

	
/////////////////////////////   参数组装  /////////////////////////////////
/**
除了sign_type dinpaySign参数，其他非空参数都要参与组装，组装顺序是按照a~z的顺序，下划线"_"优先于字母
*/
	$signStr = "";
	
	if($bank_seq_no != ""){
		$signStr = $signStr."bank_seq_no=".$bank_seq_no."&";
	}

	if($extra_return_param != ""){
		$signStr = $signStr."extra_return_param=".$extra_return_param."&";
	}	

	$signStr = $signStr."interface_version=".$interface_version."&";	

	$signStr = $signStr."merchant_code=".$merchant_code."&";

	$signStr = $signStr."notify_id=".$notify_id."&";

	$signStr = $signStr."notify_type=".$notify_type."&";

    $signStr = $signStr."order_amount=".$order_amount."&";	

    $signStr = $signStr."order_no=".$order_no."&";	

    $signStr = $signStr."order_time=".$order_time."&";	

    $signStr = $signStr."trade_no=".$trade_no."&";	

    
	$signStr = $signStr."trade_status=".$trade_status."&";
		
	$signStr = $signStr."trade_time=".$trade_time;
	
/////////////////////////////   RSA-S验签  /////////////////////////////////
/**
1)dinpay_public_key，智付公钥，每个商家对应一个固定的智付公钥（不是使用工具生成的密钥merchant_public_key，不要混淆），
即为智付商家后台"公钥管理"->"智付公钥"里的绿色字符串内容,复制出来之后调成4行（换行位置任意，前面三行对齐），
并加上注释"-----BEGIN PUBLIC KEY-----"和"-----END PUBLIC KEY-----"
2)demo提供的dinpay_public_key是测试商户号1111110166的智付公钥，请自行复制对应商户号的智付公钥并且调整和替换；
3）调用openssl_verify函数进行验签,需要在php_ini文件里打开php_openssl插件
*/
		$dinpay_public_key = '-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCZDDIp0i3Ai7hskWs03M8n9QX
rz3FX+KXak/zhy+rO7IBCE2p7mqHgMzj2KTqPfeQyAJoF6WvNy9MT9Vf/MA1mcY
pYp9vVXRlLZ9oCFGUHtL2VJJHPzKlit46OGhyU7z/jtWwDuRXqcO76+VPi0/1XO
vsyR5lTDKB3LVQA4cPD3wIDAQAB
-----END PUBLIC KEY-----'; 
	
	$dinpay_public_key = openssl_get_publickey($dinpay_public_key);	
	
	$flag = openssl_verify($signStr,$dinpaySign,$dinpay_public_key,OPENSSL_ALGO_MD5);	
	
//////////////////////   异步通知必须响应“SUCCESS” /////////////////////////
/**
如果验签返回ture就响应SUCCESS,并处理业务逻辑，如果返回false，则终止业务逻辑。
*/	
	
			 
	if($flag){						
					echo "SUCCESS";				
					
			}else{
					echo "Signature error";  
				}
?>