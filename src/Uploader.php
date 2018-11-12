<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2018/11/12
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace Houdunwang\Uploader;

use Houdunwang\Uploader\Exceptions\InvalidParamException;
use Houdunwang\Uploader\Services\OssServer;

class Uploader
{
    protected $config;

    /**
     * 服务列表
     * @var array
     */
    protected $servers = [
        'oss' => OssServer::class,
    ];

    public function config(array $config): Uploader
    {
        $this->config = $config;
        return $this;
    }

    /**
     * 上传处理
     * @param string $file
     * @param string $service
     * @return string 文件
     * @throws InvalidParamException
     */
    public function upload(string $file, string $service='oss'): string
    {
        if (!is_string($file) || !is_file($file)) {
            throw new InvalidParamException('invalid file param');
        }
        if (!in_array($service, ['oss', 'local'])) {
            throw new ServerDisposeException('service dones not exists' . $service);
        }
        try {
            $serverInstance = new $this->servers[$service];
            return $serverInstance->config($this->config[$service])->upload($file);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode(), $e);
        }
    }
}