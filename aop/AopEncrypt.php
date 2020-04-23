<?php
/**
 *   加密工具类
 *
 * User: jiehua
 * Date: 16/3/30
 * Time: 下午3:25
 */

namespace Alipay;

class AopEncrypt
{
    public static function encrypt($str, $secret_key)
    {
        $iv = str_repeat("\0", 16);
        $data = openssl_encrypt($str, 'AES-128-CBC', base64_decode($secret_key), OPENSSL_RAW_DATA, $iv);
        return base64_encode($data);
    }

    public static function decrypt($str, $secret_key)
    {
        return openssl_decrypt(base64_decode($str), 'AES-128-CBC', base64_decode($secret_key), OPENSSL_RAW_DATA);
    }
}