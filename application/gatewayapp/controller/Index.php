<?php
/**
 * Created by PhpStorm.
 * User: huizi
 * Date: 2019/5/22
 * Time: 14:39
 */

namespace app\gatewayapp\controller;


use GatewayWorker\Lib\Gateway;
use think\Controller;

class Index extends Controller
{
    public function index() {
        return $this->fetch();
    }

    public function sendMessage(){
        $msg = [
            'type' => 1 ,
            'msg' => 'oj',
            'cliend' => "这是一个实时的手法消息的复方"
        ];
        Gateway::sendToAll(  json_encode($msg)  );
    }


}