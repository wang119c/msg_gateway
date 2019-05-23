<?php
/**
 * Created by PhpStorm.
 * User: huizi
 * Date: 2019/5/22
 * Time: 14:38
 */

namespace app\gatewayapp\controller;


use GatewayWorker\Lib\Gateway;

class GwEvents
{
    /**
     * 当客户端连接时触发
     * 如果业务不需此回调可以删除onConnect     *
     * @param int $client_id 连接id
     */
    public static function onConnect($client_id)
    {
        // 向当前client_id发送数据
        // Gateway::sendToClient($client_id, sprintf('Hello %s',$client_id));
        Gateway::sendToClient($client_id, json_encode([
            'type' => 1,
            'client_id' => $client_id,
            'msg' => sprintf('Hello %s', $client_id)
        ]));
        // 向所有人发送
        // Gateway::sendToAll(sprintf('用户 %s 已登录！',$client_id));
    }

    /**
     * 当客户端发来消息时触发
     * @param int $client_id 连接id
     * @param mixed $message 具体消息
     */
    public static function onMessage($client_id, $message)
    {
        // 向所有人发送
        Gateway::sendToAll(json_encode([
            'type' => 1,
            'client_id' => $client_id,
            'msg' => sprintf('用户 %s 说：%s', $client_id, $message)
        ]));
    }

    /**
     * 当用户断开连接时触发
     * @param int $client_id 连接id
     */
    public static function onClose($client_id)
    {
        // 向所有人发送
        GateWay::sendToAll(sprintf('用户 %s 已退出！', $client_id));
    }
}