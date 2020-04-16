<?php

/**
 * @filename WxPayTest.php
 * @encoding UTF-8
 * @author sky
 * @link bmqmingqi@qq.com
 * @license http://www.gnu.org/licenses/
 * @datetime 2020-4-16  9:26:33
 * @version 3.0
 * @ * Description of WxPayTest
 */
require '../vendor/autoload.php';
use WxPay\WxPayClient;
class WxPayTest {
    static public function wxpay() {
        $order['info']="商品信息";
        $order['name']="商品名称";
        $order['orderid']= self::createOrderId();
        $order['amount']=11;
        $order['starttime']=date("YmdHis");
        $order['expiretime']=date("YmdHis", time() + 600);
        $order['tag']='';
        $order['tradetype']='APP';
        $order['signtype']='MD5';
        $order['pid']=1111;
        $wxpayclient=new WxPayClient();
        $result=$wxpayclient->wxpay($order);
        var_dump($result);
    }
    static public function callback() {
        $wxpayclient=new WxPayClient();
        $result=$wxpayclient->WxPayCallBack();
        var_dump($result);
    }
    /**
     * 生成订单id
     * @return type
     */
    static public function createOrderId() {
       return date("Ymd").hexdec(substr(uniqid(),7));
    }
}
//WxPayTest::wxpay();
WxPayTest::callback();