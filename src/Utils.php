<?php

class Utils {

    public static function GetSig($appSecret, $params) 
    {
        // 将除了 sig 以外的所有请求参数的原始值按照参数名的字典序排序
        ksort($params);

        // 将排序后的参数键值对用&拼接，即拼成 key1=val1&key2=val2&...
        $tmpL = array();
        foreach ($params as $k => $v) {
            array_push($tmpL, $k."=".$v);
        }
        $tmpStr = join("&", $tmpL);

        // 将第二步骤得到的字符串进行 Base64 编码
        $b64Str = base64_encode($tmpStr);

        // 将 app_secret 作为哈希 key 对第三步骤得到的 Base64 编码后的字符串进行 HMAC-SHA1 哈希运算得到字节数组
        $sha1Str = hash_hmac("sha1", $b64Str, $appSecret, True);

        // 对第四步骤得到的字节数组进行 MD5 运算得到 32 位字符串，即为 sig
        $sig = md5($sha1Str);

        return $sig;
    }

}
