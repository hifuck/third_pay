﻿<?php
include 'merchantProperties.php';

$reqURL_onLine = "http://www.master-egg.cn/Gateway/ReceiveWithdraw.aspx";


function getReqHmacString($p0_Cmd,$p1_MerId,$p2_BankCode,$p3_CardAcType,$p4_BankCardNo,$p5_CardHolder,$p6_BankName,$p7_BankBranchName,$p8_BankProvince,$p9_BankCity,$p10_PayAmount,$p11_OrderID,$p12_ReturnUrl,$p13_Cur,$p14_Channel)
{
	include 'merchantProperties.php';

	#进行签名处理，一定按照文档中标明的签名顺序进行
  $sbOld = "";
  $sbOld = $sbOld.$p0_Cmd;
  $sbOld = $sbOld.$p1_MerId;
  $sbOld = $sbOld.$p2_BankCode;
  $sbOld = $sbOld.$p3_CardAcType;
  $sbOld = $sbOld.$p4_BankCardNo;
  $sbOld = $sbOld.$p5_CardHolder;
  $sbOld = $sbOld.$p6_BankName;
  $sbOld = $sbOld.$p7_BankBranchName;
  $sbOld = $sbOld.$p8_BankProvince;
  $sbOld = $sbOld.$p9_BankCity;
  $sbOld = $sbOld.$p10_PayAmount;
  $sbOld = $sbOld.$p11_OrderID;
  $sbOld = $sbOld.$p12_ReturnUrl;
  $sbOld = $sbOld.$p13_Cur;
  $sbOld = $sbOld.$p14_Channel;
  //var_dump($sbOld);
  #加入支付金额
	//logstr($p11_OrderID,$sbOld,HmacMd5($sbOld,$merchantKey));
  return HmacMd5($sbOld,$merchantKey);

}

function getCallbackHmacString($r0_Cmd,$r1_Code,$r2_TrxId,$r3_Amt,$r4_Cur,$r5_Pid,$r6_Order,$r8_MP,$rb_PayStatus)
{

	include 'merchantProperties.php';

	#取得加密前的字符串
	$sbOld = "";
	#加入商家ID
	$sbOld = $sbOld.$p1_MerId;
	#加入消息类型
	$sbOld = $sbOld.$r0_Cmd;
	#加入业务返回码
	$sbOld = $sbOld.$r1_Code;
	#加入交易ID
	$sbOld = $sbOld.$r2_TrxId;
	#加入交易金额
	$sbOld = $sbOld.$r3_Amt;
	#加入货币单位
	$sbOld = $sbOld.$r4_Cur;
	#加入产品Id
	$sbOld = $sbOld.$r5_Pid;
	#加入订单ID
	$sbOld = $sbOld.$r6_Order;
	#加入商家扩展信息
	$sbOld = $sbOld.$r8_MP;
	#加入交易结果返回类型
	$sbOld = $sbOld.$rb_PayStatus;

	logstr($r6_Order,$sbOld,signRSA($sbOld,$privatekey));
	return signRSA($sbOld,$privatekey);

}


#	取得返回串中的所有参数
function getCallBackValue(&$r0_Cmd,&$r1_Code,&$r2_TrxId,&$r3_Amt,&$r4_Cur,&$r5_Pid,&$r6_Order,&$r8_MP,&$rb_PayStatus,&$hmac)
{
	$r0_Cmd		= $_REQUEST['r0_Cmd'];
	$r1_Code	= $_REQUEST['r1_Code'];
	$r2_TrxId	= $_REQUEST['r2_TrxId'];
	$r3_Amt		= $_REQUEST['r3_Amt'];
	$r4_Cur		= $_REQUEST['r4_Cur'];
	$r5_Pid		= $_REQUEST['r5_Pid'];
	$r6_Order	= $_REQUEST['r6_Order'];
	$r7_Uid		= $_REQUEST['r7_Uid'];
	$r8_MP		= $_REQUEST['r8_MP'];
	$rb_PayStatus	= $_REQUEST['rb_PayStatus'];
	$hmac			= $_REQUEST['hmac'];

	return null;
}

function CheckHmac($r0_Cmd,$r1_Code,$r2_TrxId,$r3_Amt,$r4_Cur,$r5_Pid,$r6_Order,$r8_MP,$rb_PayStatus,$hmac)
{
	if($hmac==getCallbackHmacString($r0_Cmd,$r1_Code,$r2_TrxId,$r3_Amt,$r4_Cur,$r5_Pid,$r6_Order,$r8_MP,$rb_PayStatus))
		return true;
	else
		return false;
}

function signRSA($data,$priKey){
        $priKey = file_get_contents($priKey);
        $res = openssl_get_privatekey($priKey);
        openssl_sign($data, $sign, $res);
        openssl_free_key($res);
        $sign = base64_encode($sign);
        //$sign = base64_encode($sign);
        return $sign;
    }


function HmacMd5($data,$key)
{
// RFC 2104 HMAC implementation for php.
// Creates an md5 HMAC.
// Eliminates the need to install mhash to compute a HMAC
// Hacked by Lance Rushing(NOTE: Hacked means written)

//需要配置环境支持iconv，否则中文参数不能正常处理
//$key = iconv("GB2312","UTF-8",$key);
//$data = iconv("GB2312","UTF-8",$data);

$b = 64; // byte length for md5
if (strlen($key) > $b) {
$key = pack("H*",md5($key));
}
$key = str_pad($key, $b, chr(0x00));
$ipad = str_pad('', $b, chr(0x36));
$opad = str_pad('', $b, chr(0x5c));
$k_ipad = $key ^ $ipad ;
$k_opad = $key ^ $opad;

return md5($k_opad . pack("H*",md5($k_ipad . $data)));
}

function logstr($orderid,$str,$hmac)
{
include 'merchantProperties.php';
$james=fopen($logName,"a+");
fwrite($james,"\r\n".date("Y-m-d H:i:s")."|orderid[".$orderid."]|str[".$str."]|hmac[".$hmac."]");
fclose($james);
}

?>
