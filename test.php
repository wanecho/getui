<?php

use Getui\Config;

include_once "vendor/autoload.php";

# 配置
$config = (new Config())
            ->setAppId('HUBpW7nrRH8UOH1z114zT9')
            ->setAppKey('1PozrW4YUt6AwIviDBIDE2')
            ->setMasterSecret('cnpOrcV0sr6GzO5beyywt9');
# 缓存
$cache = new Doctrine\Common\Cache\RedisCache();
$redis = new \Redis();
$redis->connect('127.0.0.1',6379,5);
$cache->setRedis($redis);
# Token As String

//$token = (new \Getui\Authorization($config))->withCacheDriver($cache)->getTokenAsString();

# Authorization

$authorization = (new \Getui\Authorization($config))->withCacheDriver($cache);
try {
    
    // $Push = (new \Getui\Push())
    //     ->withConfig($config)
    //     ->withAuth($authorization)
    //     ->toSingleCid(
    //         ['ed54966c232dd03f446d2fca4f8045ea'],
    //         (new \Getui\Message\NotificationMessage())->
    //             setTitle('test')->
    //             setBody('testtesttest')->
    //             setClickType('startapp')
    //     );
    // var_dump($Push);

    $Push = (new \Getui\Push())
        ->withConfig($config)
        ->withAuth($authorization)
        ->toSingleCid(
            ['ed54966c232dd03f446d2fca4f8045ea'],
            (new \Getui\Message\NotificationMessage())->
                setTitle('testurl')->
                setBody('www.baidu.com')->
                setClickType('url')->
                setUrl("https://www.baidu.com")
        );
    var_dump($Push);

} catch (\Throwable $th) {
    echo $th->getMessage();
}

