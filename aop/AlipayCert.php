<?php

namespace Alipay;

use Alipay\Exception\AlipayCertException;
use Alipay\Exception\AlipayOpenSslException;
use Alipay\Key\AlipayPublicKey;

class AlipayCert
{
    /**
     * 应用公钥证书
     * @var
     */
    protected $appCert;

    /**
     * 支付宝根证书
     * @var
     */
    protected $alipayRootCert;

    protected $alipayCertPublicKey;

    public function __construct($appCertPath, $alipayRootCertPath, $alipayCertPublicKey = null)
    {
        if (!file_exists($alipayRootCertPath) || !file_exists($appCertPath)) {
            throw new AlipayCertException("cert not exist");
        }
        $this->appCert = $appCertPath;
        $this->alipayRootCert = $alipayRootCertPath;
        $this->alipayCertPublicKey = $alipayCertPublicKey;
    }

    public static function pair($appCertPath, $alipayRootCertPath, $alipayCertPublicKey = null)
    {
        return new self($appCertPath, $alipayRootCertPath, $alipayCertPublicKey);
    }

    /**
     * 获取应用公钥证书序列号
     * @return string
     * @throws AlipayOpenSslException
     */
    public function getCertSN()
    {
        $x509data = file_get_contents($this->appCert);
        if ($x509data === false) {
            throw new AlipayCertException('Alipay CertSN Error -- [getCertSN]');
        }
        $certdata = openssl_x509_parse($x509data);
        if (empty($certdata)) {
            throw new AlipayCertException('Alipay openssl_x509_parse Error -- [getCertSN]');
        }
        $issuer_arr = [];
        foreach ($certdata['issuer'] as $key => $val) {
            $issuer_arr[] = $key . '=' . $val;
        }
        $issuer = implode(',', array_reverse($issuer_arr));
        return md5($issuer . $certdata['serialNumber']);
    }

    /**
     * 获取根证书序列号
     * @return string
     * @throws AlipayOpenSslException
     */
    public function getRootCertSN()
    {
        $certPath = $this->alipayRootCert;
        $x509data = file_get_contents($certPath);
        if ($x509data === false) {
            throw new AlipayCertException('Alipay CertSN Error -- [getRootCertSN]');
        }
        $kCertificateEnd = "-----END CERTIFICATE-----";
        $certStrList = explode($kCertificateEnd, $x509data);
        $md5_arr = [];
        foreach ($certStrList as $one) {
            if (!empty(trim($one))) {
                $_x509data = $one . $kCertificateEnd;
                $_certdata = openssl_x509_parse($_x509data);
                if (in_array($_certdata['signatureTypeSN'], ['RSA-SHA256', 'RSA-SHA1'])) {
                    $issuer_arr = [];
                    foreach ($_certdata['issuer'] as $key => $val) {
                        $issuer_arr[] = $key . '=' . $val;
                    }
                    $_issuer = implode(',', array_reverse($issuer_arr));
                    if (strpos($_certdata['serialNumber'], '0x') === 0) {
                        $serialNumber = self::bchexdec($_certdata['serialNumber']);
                    } else {
                        $serialNumber = $_certdata['serialNumber'];
                    }
                    $md5_arr[] = md5($_issuer . $serialNumber);
                }
            }
        }
        return implode('_', $md5_arr);
    }

    /**
     * 0x转高精度数字
     * @param $hex
     * @return int|string
     */
    private static function bchexdec($hex)
    {
        $dec = 0;
        $len = strlen($hex);
        for ($i = 1; $i <= $len; $i++) {
            $dec = bcadd($dec, bcmul(strval(hexdec($hex[$i - 1])), bcpow('16', strval($len - $i))));
        }
        return $dec;
    }

    /**
     * 从支付宝公钥证书中获取公钥
     * @return mixed
     * @throws AlipayCertException
     */
    public function getPublickey()
    {
        $certPath = $this->alipayCertPublicKey;
        return AlipayPublicKey::create($certPath)->asResource();
    }

}