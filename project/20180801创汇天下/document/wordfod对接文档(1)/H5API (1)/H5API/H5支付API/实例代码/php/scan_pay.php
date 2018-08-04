﻿<?php
	include ('phpqrcode.php');
/* *
 *功能：h5支付API接口
 *版本：3.1
 *日期：2017-10-31
 *说明：
 *以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,
 *并非一定要使用该代码。该代码仅供学习和研究接口使用，仅为提供一个参考。
 **/
	

///////////////////////////  初始化接口参数  //////////////////////////////
/**
接口参数请参考扫码支付文档，除了sign参数，其他参数都要在这里初始化
*/
	include_once("./merchant.php");
	
	$merchant_code = $_POST["merchant_code"];//商户号，Z800001001001是测试商户号，调试时要更换商家自己的商户号

	$service_type = $_POST["service_type"];

	$notify_url = $_POST["notify_url"];		

	$interface_version =$_POST["interface_version"];
	
	$client_ip = $_POST["client_ip"];
	
	$sign_type = $_POST["sign_type"];

	$order_no = $_POST["order_no"];

	$order_time = $_POST["order_time"];

	$order_amount =$_POST["order_amount"];

	$product_name =$_POST["product_name"];

	$product_code = $_POST["product_code"];
	
	$product_num = $_POST["product_num"];
		
	$product_desc = $_POST["product_desc"];

	$extra_return_param =$_POST["extra_return_param"];
	
	$extend_param = $_POST["extend_param"];
	
/////////////////////////////   参数组装  /////////////////////////////////
/**
除了sign_type dinpaySign参数，其他非空参数都要参与组装，组装顺序是按照a~z的顺序，下划线"_"优先于字母
*/

	$signStr = "";
	
	$signStr = $signStr."client_ip=".$client_ip."&";	
	
	if($extend_param != ""){
		$signStr = $signStr."extend_param=".$extend_param."&";
	}
	
	if($extra_return_param != ""){
		$signStr = $signStr."extra_return_param=".$extra_return_param."&";
	}
	
	$signStr = $signStr."interface_version=".$interface_version."&";	
	
	$signStr = $signStr."merchant_code=".$merchant_code."&";	
	
	$signStr = $signStr."notify_url=".$notify_url."&";		
	
	$signStr = $signStr."order_amount=".$order_amount."&";		
	
	$signStr = $signStr."order_no=".$order_no."&";		
	
	$signStr = $signStr."order_time=".$order_time."&";	

	if($product_code != ""){
		$signStr = $signStr."product_code=".$product_code."&";
	}	
	
	if($product_desc != ""){
		$signStr = $signStr."product_desc=".$product_desc."&";
	}
	
	$signStr = $signStr."product_name=".$product_name."&";

	if($product_num != ""){
		$signStr = $signStr."product_num=".$product_num."&";
	}	
	
	$signStr = $signStr."service_type=".$service_type;
	
/////////////////////////////   RSA-S签名  /////////////////////////////////



/////////////////////////////////初始化商户私钥//////////////////////////////////////

			
	$merchant_private_key= openssl_get_privatekey($merchant_private_key);
		
	openssl_sign($signStr,$sign_info,$merchant_private_key,OPENSSL_ALGO_MD5);
	
	$sign = base64_encode($sign_info);
	
/////////////////////////  提交参数到扫码支付网关  ////////////////////////

/**
curl方法提交支付参数到扫码网关https://api.wordfod.com/gateway/api/h5apipay，并且获取返回值
*/
	
	
	$postdata=array('extend_param'=>$extend_param,
	'extra_return_param'=>$extra_return_param,
	'product_code'=>$product_code,
	'product_desc'=>$product_desc,
	'product_num'=>$product_num,
	'merchant_code'=>$merchant_code,
	'service_type'=>$service_type,
	'notify_url'=>$notify_url,
	'interface_version'=>$interface_version,
	'sign_type'=>$sign_type,
	'order_no'=>$order_no,
	'client_ip'=>$client_ip,
	'sign'=>$sign,
	'order_time'=>$order_time,
	'order_amount'=>$order_amount,
	'product_name'=>$product_name);
		
	
	$ch = curl_init();	
	curl_setopt($ch,CURLOPT_URL,"https://api.wordfod.com/gateway/api/h5apipay");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postdata));  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
	$response=curl_exec($ch);
	
	//$res=simplexml_load_string($response);
	
	
	
	curl_close($ch);
	
	
   
	echo $response;
		
?>
