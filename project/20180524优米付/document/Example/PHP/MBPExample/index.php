﻿	<?php
	/* *
 * 演示入口页面
 * 版本：1.0
 * 日期：2015-03-26
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码。
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
  <head>
    <title>支付系统商户接口范例-首页</title>
	<meta http-equiv="pragma" content="no-cache"/>
	<meta http-equiv="cache-control" content="no-cache"/>
	<meta http-equiv="expires" content="0"/>    
	<meta http-equiv="keywords" content="keyword1,keyword2,keyword3"/>
	<meta http-equiv="description" content="This is my page"/>
	<!--
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link href="css/mobaopay.css" type="text/css" rel="stylesheet" />
	-->
  </head>
  
  <body>
    <table width="50%" border="0" align="center" cellpadding="0" cellspacing="0" style="border: solid 1px #107929">
        <tr>
            <td>
                <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1">
                 
                    <tr>
                        <td height="30" colspan="2" bgcolor="#6BBE18">
                            <span style="color: #FFFFFF">感谢您使用支付系统平台</span>
                        </td>
                    </tr>
                    <tr>
                        <td width="30%" align="left" bgcolor="#CEE7BD">
                           支付系统产品通用支付接口演示：
                        </td>
                    </tr>
                    <tr>
                        <td height="30" align="left" bgcolor="#FFFFEF">
                            &nbsp;&nbsp;<a href="normalPay.php">网关支付</a>
                        </td>
                    </tr>
					 <tr>
                        <td height="30" align="left" bgcolor="#FFFFEF">
                            &nbsp;&nbsp;<a href="phishingPay.php">网关支付（防钓鱼）</a>
                        </td>
                    </tr>
                    <tr>
                        <td height="30" align="left" bgcolor="#FFFFEF">
                            &nbsp;&nbsp;<a href="queryOrd.php">查询订单</a>
                        </td>
                    </tr>
                    <tr>
                        <td height="30" align="left" bgcolor="#FFFFEF">
                            &nbsp;&nbsp;<a href="refundOrd.php">退款操作</a>
                        </td>
                    </tr>
					<tr>
                        <td height="30" align="left" bgcolor="#FFFFEF">
                            &nbsp;&nbsp;<a href="settlement.php">结算查询</a>
                        </td>
                    </tr>
					<tr>
                        <td height="30" align="left" bgcolor="#FFFFEF">
                            &nbsp;&nbsp;<a href="Entrusted.php">委托代付</a>
                        </td>
                    </tr>
				
                    <tr>
                        <td height="5" bgcolor="#6BBE18">
                        	&nbsp;&nbsp;
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

  </body>
</html>
