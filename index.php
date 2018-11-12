<?php
include 'vendor/autoload.php';

use Houdunwang\Uploader\Uploader;
use Houdunwang\Uploader\Services\OssServer;

$uploader = new Uploader();
$config = [
    'accessKeyId' => 'LTAIas3KPVv9g6xw',
    'accessKeySecret' => '7uvA1eKh6l6w2iqBCVENzqTg0Qnjrb',
    'bucket' => 'test-xj',
    'endpoint' => 'http://oss-cn-beijing.aliyuncs.com',
];
echo $uploader->upload('index.php', new OssServer($config));
