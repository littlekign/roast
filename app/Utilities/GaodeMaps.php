<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/27
 * Time: 16:58
 */

namespace App\Utilities;


use GuzzleHttp\Client;

class GaodeMaps
{
    public static function geocodeAddr($state,$city,$addr)
    {
//        https://restapi.amap.com/v3/geocode/geo?address=北京市朝阳区阜通东大街6号&output=XML&key=<用户的key>
        // 省、市、区、详细地址
        $addr = urlencode($state . $city . $addr);
        // Web 服务 API Key
        $apiKey = config('services.gaode.ws_api_key');
        // 构建地理编码 API 请求 URL，默认返回 JSON 格式响应
        $url = 'https://restapi.amap.com/v3/geocode/geo?addr='. $addr . '&key='. $apiKey;

        // 创建 Guzzle HTTP 客户端发起请求
        $client = new Client();
        $geoCodeRes = $client->get($url)->getBody();
        $getCodeData = json_decode($geoCodeRes);

        // 初始化地理编码位置
        $coordinates['lat'] = null;
        $coordinates['lng'] = null;

        
    }

}
