<%
	/* *
	 *功能：科诺支付网站支付接口调试入口页面
	 *说明：
	 *以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
	 */
%>
<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
	<head>
	<title>科诺支付网站支付接口</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style>
   *{margin:0;padding:0;font-family: Arial,microsoft yahei,"微软雅黑";}
	.header{height:26px;line-height:26px;background:#8F8F8F;color:#FFF;}
	.header p{width:1200px;margin:0 auto;text-align:right;font-size:14px;}
	.logo-box{margin:20px auto;width:1200px;}
	.logo-box span{height:36px;line-height:36px;color:#666;font-size:18px;padding-left:20px;}
	.pay-box{margin:30px auto;width:1200px;background:#F8F8F8;border-radius:20px;text-align:center;padding-top:30px;}
	.pay-box .goods-name{padding:30px 0;color:#232323;text-align:center;font-size:22px;}
	.pay-box .goods-price{padding:30px 0;color:#FF6600;text-align:center;font-size:22px;}
	.pay-box .box{padding-top:40px;}
	.pay-box .box label{font-size:15px;color:#232323;width:120px;display:inline-block;text-align:right;}
	.pay-box .box input{width:250px;padding:7px 10px;}
	.pay-box .submit input{width:180px;height:40px;line-height:40px;color:#FFF;margin:80px auto;background:#52e2c6;text-align:center;cursor:pointer;border:0;}
</style>
</head>
<body>
	<div class="header">
		<p>你好，欢迎使用科诺支付</p>
	</div>
	
	<div class="logo-box">
		<img src="http://pingtai.chinaxiangqiu.com:8098/testpay/images/logo.png" height="36px">
		<span>科诺支付测试Demo</span>
	</div>
	
	<div class="pay-box">
		<form action="selPayType.jsp" method="post">
			<div class="box">
				<label>商户订单号：</label>
				<input type="text" id="orderId" name="orderId">
			</div>
			<div class="box">
				<label>商品名称：</label>
				<input type="text" id="goodsName" name="goodsName">
			</div>
			<div class="box">
				<label>付款金额：</label>
				<input type="text" id="price" name="price">
			</div>
			<div class="box">
				<label>商品展示网址：</label>
				<input type="text" name="showUrl">
			</div>
			<div class="box">
				<label>商品描述：</label>
				<input type="text" name="goodsDesc">
			</div>
			<div class="submit">
				<input type="submit" value="确 认">
			</div>
		</form>
	</div>
</body>
<script language="javascript">
	function GetDateNow() {
		var vNow = new Date();
		var sNow = "";
		sNow += String(vNow.getFullYear());
		sNow += String(vNow.getMonth() + 1);
		sNow += String(vNow.getDate());
		sNow += String(vNow.getHours());
		sNow += String(vNow.getMinutes());
		sNow += String(vNow.getSeconds());
		sNow += String(vNow.getMilliseconds());
		document.getElementById("orderId").value =  sNow;
		document.getElementById("goodsName").value = "测试";
		document.getElementById("price").value = "1";
	}
	GetDateNow();
</script>
</html>