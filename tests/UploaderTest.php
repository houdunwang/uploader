<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2018/11/12
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

use PHPUnit\Framework\TestCase;
use Houdunwang\Uploader\Exceptions\InvalidParamException;

class UploaderTest extends TestCase
{
    public function testUploadParamException()
    {
        $uploader = new \Houdunwang\Uploader\Uploader([]);
        $this->expectException(InvalidParamException::class);
        $this->expectExceptionMessage('invalid file param');
        $uploader->upload('test.php', 'oss');

        $this->fail('server param exception');

    }
}
