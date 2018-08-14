<?php
namespace xl\app\Common\Lib;
//long2ip
Class TaobaoIP
{
    public static $country='';                                                                                          //国
    private static $region='';                                                                                          //省
    private static $city='';                                                                                            //市
    public static $county='';                                                                                           //县
    public static $isp='';                                                                                              //电信_联通_移动
    public static $ip='';                                                                                               //ip地址
    private static $_requestURL = 'http://ip.taobao.com/service/getIpInfo.php';
    public static function getIPInfo($ip)
    {
        $long = ip2long($ip);
        if ($long === 0) return ['IP address error', 5];
        $ip = long2ip($long);
        $result = self::queryIPInfo($ip);
        return self::parseJSON($result);
    }

    private static function queryIPInfo($ip)
    {
        $query = http_build_query(['ip' => $ip]);
        $ch = curl_init();
        $options = [CURLOPT_URL => sprintf('%s?%s', self::$_requestURL, $query), CURLOPT_RETURNTRANSFER => true, CURLOPT_AUTOREFERER => false, CURLOPT_FOLLOWLOCATION => false, CURLOPT_HEADER => false, CURLOPT_TIMEOUT => 5,];
        curl_setopt_array($ch, $options);
        $content = curl_exec($ch);
        curl_close($ch);
        return $content;
    }

    private static function parseJSON($json)
    {
        $O = json_decode($json, true);
        if (false === is_null($O)) return $O;

        if (version_compare(PHP_VERSION, '5.3.0', '>=')) {
            $errorCode = json_last_error();
            if (isset(self::$_JSONParseError[$errorCode])) return [self::$_JSONParseError[$errorCode], 5];

        }
        return ['JSON parse error', 5];
    }

    private static $_JSONParseError = array(
        JSON_ERROR_NONE => 'No error has occurred',
        JSON_ERROR_DEPTH => 'The maximum stack depth has been exceeded',
        JSON_ERROR_CTRL_CHAR => 'Control character error, possibly incorrectly encoded',
        JSON_ERROR_STATE_MISMATCH => 'Invalid or malformed JSON',
        JSON_ERROR_SYNTAX => 'Syntax error',
        JSON_ERROR_UTF8 => 'Malformed UTF-8 characters, possibly incorrectly encoded',
    );


    public static function getAddress($ip)
    {
        static::$ip=$ip;
       // $ip = long2ip($ip);
        $data = self::getIPInfo($ip);
        if (!isset($data['code']) )          return static::$ip;                                                              //code
        if ($data['code'] != 0)               return static::$ip;
            $data = $data['data'];                                                                 //code != 0
        if ($data['city_id']=='local')       return static::$ip;                                                           //city_id='local'

        static::$country =self::getParam($data, 'country', '-', ' ');
        static::$region  =self::getParam($data, 'region', '-', '省');
        static::$city    =self::getParam($data, 'city', '-', '市') ;
        static::$county  =self::getParam($data, 'county', '-', '县');
        static::$isp     = self::getParam($data, 'isp', '-') . ' - ' . $ip . '';
        return static::$country.static::$region.static::$city.static::$county.static::$isp;
    }

    private static function getParam($data, $key, $default = '', $Suffix = '')
    {
        if ($data == null) return $default;
        return !isset($data[$key]) ? $default . $Suffix : $data[$key] . $Suffix;
    }
}
