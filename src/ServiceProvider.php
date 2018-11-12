<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2018/11/12
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace Houdunwang\Uploader;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    protected $defer = true;

    /**
     * 服务引导方法
     *
     * @return void
     */
    public function boot(): void
    {
        //发布配置文件到项目的 config 目录中
        $this->publishes([
            __DIR__ . '/config/uploader.php' => config_path('uploader.php'),
        ]);
    }

    /**
     * 注册服务
     */
    public function register(): void
    {
        $this->app->singleton(Uploader::class, function () {
            return new Uploader();
        });
    }
}