# 上传组件

[![Build Status](https://travis-ci.org/houdunwang/uploader.svg?branch=master)](https://travis-ci.org/houdunwang/uploader)

方便的多网关上传组件，目前支持阿里云OSS，以后支持腾讯云等多平台上传处理。

开发作者：[向军大叔](http://www.aoxiangjun.com)

## 功能特点

  * 支持多网关处理
  * 提供provider与facade支持，完美集成Laravel框架
  * 测试全覆盖，保证代码健壮
  * 发布packagist.org
  * 使用简单可快速集成到项目中

## 软件安装

使用 composer 安装软件包

```
composer require houdunwang/uploader
```
## 组件配置

组件会自动发布配置文件 `uploader.php` 到项目的 `config` 目录中，需要先进行相应配置。

也可以使用以下方式手动发布配置：

```
$ laravel php artisan vendor:publish

Which provider or tag's files would you like to publish?:
  [0 ] Publish files from all providers and tags listed below
  [1 ] Provider: BeyondCode\DumpServer\DumpServerServiceProvider
  [2 ] Provider: Fideloper\Proxy\TrustedProxyServiceProvider
  [3 ] Provider: Illuminate\Mail\MailServiceProvider
  [4 ] Provider: Illuminate\Notifications\NotificationServiceProvider
  [5 ] Provider: Illuminate\Pagination\PaginationServiceProvider
  [6 ] Provider: Laravel\Tinker\TinkerServiceProvider
  [7 ] Tag: config
  [8 ] Tag: laravel-mail
  [9 ] Tag: laravel-notifications
  [10] Tag: laravel-pagination
 > 7

Publishing complete.
```

设置  `config/uploader.php` 文件中的上传配置项。

### 阿里云

1. 在 `访问控制` 中添加一个新帐号
2. 获得帐号的 `accessKeyId ` 与 `accessKeySecret`资料设置到配置文件中
3. 赋予新增的帐号 `oss` 使用权限。
4. 在 `oss` 服务中新增 `bucket`  块
5. 为新增的 `bucket` 块配置跨域访问权限
6. 设置块为 `公共读` 
7. 将 `外网访问` 配置项中的 `EndPoint` 设置到配置文件中的 `endpoint` 项

## 使用示例

下面以阿里云上传为例介绍使用方法。

使用`Facade` 调用

```
Route::get('/', function () {
	return Uploader::config(config('uploader'))->upload('index.php');
});
```

使用 `provider` 服务调用 

```
Route::get('/', function () {
	return app(\Houdunwang\Uploader\Uploader::class)->config(config('uploader'))->upload('index.php');
});
```