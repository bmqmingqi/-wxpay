<?php

/**
 * @filename alipay.php
 * @encoding UTF-8
 * @author sky
 * @link bmqmingqi@qq.com
 * @license http://www.gnu.org/licenses/
 * @datetime 2019-11-4  16:54:54
 * @version 3.0
 * @ * Description of alipay
 */
return [
    'dev' => [
        'appId' => 'wx5e042b6fd81a5530',
        'MerchantId' => '1500180242',
        'SignType'=>'HMAC-SHA256',
        'Key'=>'qwerfdsa10287593tyghbnrf08548392',
        'AppSecret'=>'2c3ebbd35d1a6b94e3ccca8118acd351',
        'NotifyUrl'=>'https://test.matchgo.com.cn/api/v1/weixin/callback',
        ], 
    'product' => [
        'appId' => 'wx5e042b6fd81a5530',
        'MerchantId' => '1500180242',
        'SignType'=>'HMAC-SHA256',
        'Key'=>'qwerfdsa10287593tyghbnrf08548392',
        'AppSecret'=>'2c3ebbd35d1a6b94e3ccca8118acd351',
        'NotifyUrl'=>'https://app.matchgo.com.cn/api/v1/weixin/callback',
        ]
];
