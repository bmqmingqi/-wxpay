<?php

/**
 * @filename WxPayClient.php
 * @encoding UTF-8
 * @author sky
 * @link bmqmingqi@qq.com
 * @license http://www.gnu.org/licenses/
 * @datetime 2020-4-16  9:07:25
 * @version 3.0
 * @ * Description of WxPayClient
 */

namespace WxPay;
use WxPay\lib\WxPayApi;
use WxPay\Example\WxPayConfig;
$basepath= dirname(__FILE__);
require_once $basepath.'/lib/WxPay.Data.php';
class WxPayClient {
    protected $config;
     /**
     * 微信支付接口
     * @param type $request
     */
    public function wxpay($order) {
            //模式二
            /**
             * 流程：
             * 1、调用统一下单，取得code_url，生成二维码
             * 2、用户扫描二维码，进行支付
             * 3、支付完成之后，微信服务器会通知支付成功
             * 4、在支付成功通知中需要查单确认是否真正支付成功（见：notify.php）
             */
            $input = new \WxPayUnifiedOrder();
            $input->SetBody($order['info']);
            $input->SetAttach($order['name']);
            $input->SetOut_trade_no($order['orderid']);
            $input->SetTotal_fee($order['amount']);
            $input->SetTime_start($order['starttime']);
            $input->SetTime_expire($order['expiretime']);
            $input->SetGoods_tag($order['tag']);
            $input->SetTrade_type($order['tradetype']);
            $input->SetSignType($order['signtype']);
            $input->SetProduct_id($order['pid']);
            $config = new WxPayConfig($this->config);
           return $result = WxPayApi::unifiedOrder($config, $input);
           
    }
    /***
     * 支付宝回调
     */
    public function WxPayCallBack() {
        $xml = file_get_contents('php://input');
        try {
            $config = new WxPayConfig();
            $result = \WxPayNotifyResults::Init($config, $xml);
            if (is_object($result)) {
                $values = $result->GetValues();
                return $values;
            }
            return false;
        } catch (\WxPayException $ex) {
            return $ex->errorMessage();
        }
    }
    public function __construct($config='',$env='dev') {
        if(!$config){
            $config = include_once(__DIR__.'/config/weixinpay.php');
        }
        if ($env == 'dev') {
            $this->config = $config['dev'];
        } else {
            $this->config = $config['product'];
        }
    }
}
