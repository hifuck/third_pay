﻿
INSERT INTO `7k111data1_db`.`pay_list` (pay_name,pay_wyUrl,pay_wxUrl,pay_zfbUrl,is_wx,is_wy,is_zfb,wy_postUrl,wx_postUrl,zfb_postUrl,wy_returnUrl,wx_returnUrl,zfb_returnUrl,wy_synUrl,wx_synUrl,zfb_synUrl,is_direct,is_qq,qq_postUrl,qq_returnUrl,qq_synUrl)
 VALUES ('B4支付', '/pay/pay.php', '/pay/wxpay.php', '/pay/zfbpay.php', '1', '1', '1', '/pay/b4pay/post.php', '/pay/b4pay/wxpost.php', '/pay/b4pay/zfbpost.php', '/pay/b4pay/return_url.php', '/pay/b4pay/return_url.php', '/pay/b4pay/return_url.php', '/pay/b4pay/notify_url.php', '/pay/b4pay/notify_url.php', '/pay/b4pay/notify_url.php', '1', '1', '/pay/b4pay/qqpost.php', '/pay/b4pay/return_url.php', '/pay/b4pay/notify_url.php');

INSERT INTO `7k111data1_db`.`pay_set` (`pay_name`, `mer_id`, `mer_key`, `mer_account`, `pay_domain`, `pay_type`, `is_wy`, `is_wx`, `is_zfb`, `show_name`, `is_qq`)
 VALUES ('B4支付', '100000000000005', 'c33367701511b4f6020ec61ded352059', NULL, 'http://pay7.5566205.com', 'B4支付', '1', '1', '1', 'B4支付', '1');

INSERT INTO `testdata1_db`.`pay_list` (pay_name,pay_wyUrl,pay_wxUrl,pay_zfbUrl,is_wx,is_wy,is_zfb,wy_postUrl,wx_postUrl,zfb_postUrl,wy_returnUrl,wx_returnUrl,zfb_returnUrl,wy_synUrl,wx_synUrl,zfb_synUrl,is_direct,is_qq,qq_postUrl,qq_returnUrl,qq_synUrl)
 VALUES ('B4支付', '/pay/pay.php', '/pay/wxpay.php', '/pay/zfbpay.php', '1', '1', '1', '/pay/b4pay/post.php', '/pay/b4pay/wxpost.php', '/pay/b4pay/zfbpost.php', '/pay/b4pay/return_url.php', '/pay/b4pay/return_url.php', '/pay/b4pay/return_url.php', '/pay/b4pay/notify_url.php', '/pay/b4pay/notify_url.php', '/pay/b4pay/notify_url.php', '1', '1', '/pay/b4pay/qqpost.php', '/pay/b4pay/return_url.php', '/pay/b4pay/notify_url.php');

INSERT INTO `testdata1_db`.`pay_set` (`pay_name`, `mer_id`, `mer_key`, `mer_account`, `pay_domain`, `pay_type`, `is_wy`, `is_wx`, `is_zfb`, `show_name`, `is_qq`)
 VALUES ('B4支付', '100000000000005', 'c33367701511b4f6020ec61ded352059', NULL, 'http://paytest.7k111.com', 'B4支付', '1', '1', '1', 'B4支付', '1');
