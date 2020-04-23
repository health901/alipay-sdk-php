<img src="https://i.loli.net/2018/07/24/5b56e980b155e.png" width="40px" height="40px"> Alipay SDK for PHP
==========

> 原项目部更新了,fork过来
>
> 更新官方SDK,支持公钥证书加密,支持AES加密,支持PHP7.2

[原项目](https://github.com/wi1dcard/alipay-sdk-php)

## 主要目的

- [x] 集成 Composer。
- [x] 移除官方 SDK 内 [`lotusphp`](https://github.com/qinjx/lotusphp) 依赖。
- [x] 整理代码风格使其符合 `PSR-1`、`PSR-2`。
- [x] 增加单元测试。
- [x] 支持PHP 7.2，替换 MCrypt 为 OpenSSL。
- [x] 移除官方 API 文档内 `已弃用` 特性。
- [x] 移除难以拓展的调试、日志等特性，以便于集成第三方框架和扩展包。
- [x] 移除编码转换特性，统一使用 `UTF-8`。
- [ ] 其它优化，持续进行中 ...

目前，开源圈内已有不少质量不错的支付宝「[支付](https://gitee.com/explore/starred/payment-dev?lang=PHP)」相关扩展包；而支付宝「小程序」推出不久，目前仍处于公测阶段。此项目的初衷并不是 `Yet another`，而是填补小程序 API 的空缺，文档和示例也将会有所侧重。

## 小试牛刀

- [获取小程序用户信息](examples/alipay.system.oauth.token.md)

## 如何使用

1. Composer 安装。

    ```bash
    composer require vrobin/alipay-sdk
    ```

2. 创建 `AlipayKeyPair` 实例。

    ```php
    $keyPair = \Alipay\Key\AlipayKeyPair::create(
        '应用私钥',
        '支付宝公钥',
    );
    ```

    `AlipayKeyPair` 用于存储应用私钥、支付宝公钥；两份密钥将分别用于与支付宝服务器通信时，生成请求签名、验证响应签名等。

3. 创建 `AopClient` 实例。

    ```php
    $aop = new \Alipay\AopClient('APP_ID', $keyPair);
    ```

    `AopClient` 通常情况会贯穿整条业务，除非你须要在同一套代码内处理多个商户号/小程序，否则只需在初始化阶段创建一次即可。

4. 根据业务需要，创建 `AlipayRequest` 实例。

    ```php
    $request = (new \Alipay\AlipayRequestFactory)->create('点号连接的API名称', [
        '请求参数名' => '对应参数值',
        // ...
    ]);
    ```

    另外，你也可以不使用请求类工厂，就像官方文档那样，手动创建请求类。

    例如：

    ```php
    $request = new \Alipay\Request\AlipaySystemOauthTokenRequest();
    $request->setCode('authcode');
    ```

5. 发送请求，获得响应数据。

    ```php
    $result = $aop->execute($request)->getData();
    ```

    所有错误（包括但不限于网络通信异常、数据格式异常、支付宝服务器返回的错误）都会被转换为异常，请注意捕捉。

6. 使用AES加密 ( 某些接口默认强制开启AES加密,无需额外设置 )
    
   ```php
   $aop->encryptKey = 'AES秘钥';
   $request = new \Alipay\Request\AlipaySystemOauthTokenRequest(['needNeedEncrypt'=>true]);
   ```
   
   单独解密 ( 如小程序获取用户手机号 )
   ```php
   $decrypt_string = \Alipay\AopEncrypt::decrypt('秘文','秘钥');
   ```
     
7. 更多实例，请移步 [`examples`](examples/) 目录。

    最后，官方 SDK 内 `AopClient::pageExecute()` 被分离为 `pageExecuteUrl` 和 `pageExecuteForm`。
    `AopClient::sdkExecute()` 和 `AopClient::execute()` 方法名保持不变，参数和返回值有所改动。

## 注意事项

- 请不要依赖任何在官方 SDK 内被标注为 `private` 的属性，它们可能已在迭代中被修改或废弃。
- 请不要依赖任何在官方 API 文档内被标注为 `已废弃` 的特性，它们可能已在迭代中被废弃或移除。
- 本 SDK 已移除所有编码转换特性；请确保执行上传文件请求时，文件编码为 `UTF-8` 而非 `GBK`。

## 实用工具

可执行文件位于 [`bin`](bin/) 目录下，点此查看 [详细说明](bin/README.md)。

## 其它资源

- [支付宝开放平台 - API 文档](https://docs.open.alipay.com/api/)
- [支付宝开放平台 - 开发者社区](https://openclub.alipay.com/index.php)
- [支付宝小程序 - 开发文档](https://docs.alipay.com/mini/introduce)

## 已知 Issue

OpenSSL 在 Win32 平台需要配置 `openssl.cnf` 路径，参见 [OpenSSL 安装 - PHP 手册](http://php.net/manual/zh/openssl.installation.php)。

在本 SDK 内，也可通过自定义 `$configargs` 参数来自定义此文件路径，而不需要配置环境变量；参见 [examples/keys/generate.php](examples/keys/generate.php)。

目前已知以下方法依赖于此配置文件：

- 生成密钥对：`AlipayKeyPair::generate()`
- 将私钥资源转换为字符串：`AlipayPrivateKey::toString()`

## 感谢

- [支付宝开放平台 SDK][OfficialSDK]

## 感想

最后，一点感想。

作为一个名不见经传的小白，不敢妄言阿里的工程师技术欠佳；但可以确定的是，官方提供的 PHP SDK 绝对不是用心之作。

做开放平台，对待第三方开发者是这样的态度，怎能做到与微信比肩？

硬广，欢迎关注我们的产品：

[<img src="https://i.loli.net/2018/07/24/5b56dda76b2ba.png" width="30%" height="30%">](http://www.zjhejiang.com/)

[OfficialSDK]: https://docs.open.alipay.com/54/103419/