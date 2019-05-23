<?php

namespace app\index\controller;

use think\Controller;
use think\Loader;
use think\Request;

class Index extends  Controller
{

    public function _initialize()
    {

        Loader::import('GatewayWorker.Lib.Gateway');
    }

    public function index()
    {

    }


    public function test(){
        return $this->fetch();
    }

    public function bind(){
        \GatewayWorker\Lib\Gateway::$registerAddress = '127.0.0.1:1238';
        $uid      = 1;
        $group_id = 1;
        $client_id = $this->request->post("client_id");
        \GatewayWorker\Lib\Gateway::bindUid($client_id, $uid);
        \GatewayWorker\Lib\Gateway::joinGroup($client_id, $group_id);
    }


    public function sendMessage(){

    }

}
