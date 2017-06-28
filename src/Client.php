<?php

class Client {

    public static function Get($url, $params) 
    {

        $tmpL = array();
        foreach ($params as $k => $v) {
            array_push($tmpL, $k."=".$v);
        }
        $tmpStr = join("&", $tmpL);

        $data = file_get_contents($url."?".$tmpStr);
        $jsonData = json_decode($data);

        return $jsonData;
    }

}
