<?php

include_once("Utils.php");
include_once("Client.php");


class Api {

    private $appKey;
    private $appSecret;
    private $serverHost;
    private $token;

    function __construct($appKey, $appSecret, $serverHost) {
        $this->appKey = $appKey;
        $this->appSecret = $appSecret;
        $this->serverHost = $serverHost;
    }

    function token() {
        $url = $this->serverHost."/v1/token";
        $now = time()*1000;

        if (!$this->token) {
            $params = array("app_key"=>$this->appKey,
                            "timestamp"=>$now);
            $sig = Utils::GetSig($this->appSecret, $params);
            $params['sig'] = $sig;

            $tmpToken = Client::Get($url, $params);
            $tmpToken->expires_at = $now + $tmpToken->expires_in * 1000;

            $this->token = $tmpToken;
        }

        if ($this->token->expires_at && $this->token->expires_at > $now + 10*1000) {
            $params = array("app_key"=>$this->appKey,
                            "timestamp"=>$now);
            $sig = Utils::GetSig($this->appSecret, $params);
            $params['sig'] = $sig;

            $tmpToken = Client::Get($url, $params);
            $tmpToken->expires_at = $now + $tmpToken->expires_in * 1000;

            $this->token = $tmpToken;
        }

        return $this->token->access_token;
    }

    function genreList($device_id, $page, $count) {
        $url = $this->serverHost."/v1/genre";
        $token = $this->token();

        $params = array("app_key"=>$this->appKey,
                        "access_token"=>$token,
                        "device_id"=>$device_id,
                        "page"=>$page,
                        "count"=>$count);

        $sig = Utils::GetSig($this->appSecret, $params);
        $params['sig'] = $sig;

        return Client::Get($url, $params);
    }

    function albumListByGenre($device_id, $page, $count, $genreId) {
        $url = $this->serverHost."/v1/genre/".$genreId."/album";
        $token = $this->token();

        $params = array("app_key"=>$this->appKey,
                        "access_token"=>$token,
                        "device_id"=>$device_id,
                        "page"=>$page,
                        "count"=>$count);

        $sig = Utils::GetSig($this->appSecret, $params);
        $params['sig'] = $sig;

        return Client::Get($url, $params);
    }

    function trackListByGenre($device_id, $page, $count, $genreId) {
        $url = $this->serverHost."/v1/genre/".$genreId."/track";
        $token = $this->token();

        $params = array("app_key"=>$this->appKey,
                        "access_token"=>$token,
                        "device_id"=>$device_id,
                        "page"=>$page,
                        "count"=>$count);

        $sig = Utils::GetSig($this->appSecret, $params);
        $params['sig'] = $sig;

        return Client::Get($url, $params);
    }

    function artistList($device_id, $page, $count) {
        $url = $this->serverHost."/v1/artist";
        $token = $this->token();

        $params = array("app_key"=>$this->appKey,
                        "access_token"=>$token,
                        "device_id"=>$device_id,
                        "page"=>$page,
                        "count"=>$count);

        $sig = Utils::GetSig($this->appSecret, $params);
        $params['sig'] = $sig;

        return Client::Get($url, $params);
    }

    function albumListByArtist($device_id, $page, $count, $artistId) {
        $url = $this->serverHost."/v1/artist/".$artistId."/album";
        $token = $this->token();

        $params = array("app_key"=>$this->appKey,
                        "access_token"=>$token,
                        "device_id"=>$device_id,
                        "page"=>$page,
                        "count"=>$count);

        $sig = Utils::GetSig($this->appSecret, $params);
        $params['sig'] = $sig;

        return Client::Get($url, $params);
    }

    function trackListByArtist($device_id, $page, $count, $artistId) {
        $url = $this->serverHost."/v1/artist/".$artistId."/track";
        $token = $this->token();

        $params = array("app_key"=>$this->appKey,
                        "access_token"=>$token,
                        "device_id"=>$device_id,
                        "page"=>$page,
                        "count"=>$count);

        $sig = Utils::GetSig($this->appSecret, $params);
        $params['sig'] = $sig;

        return Client::Get($url, $params);
    }

    function albumDetail($device_id, $albumId) {
        $url = $this->serverHost."/v1/album/".$albumId;
        $token = $this->token();

        $params = array("app_key"=>$this->appKey,
                        "access_token"=>$token,
                        "device_id"=>$device_id);

        $sig = Utils::GetSig($this->appSecret, $params);
        $params['sig'] = $sig;

        return Client::Get($url, $params);
    }

    function trackListByAlbum($device_id, $page, $count, $albumId) {
        $url = $this->serverHost."/v1/album/".$albumId."/track";
        $token = $this->token();

        $params = array("app_key"=>$this->appKey,
                        "access_token"=>$token,
                        "device_id"=>$device_id,
                        "page"=>$page,
                        "count"=>$count);

        $sig = Utils::GetSig($this->appSecret, $params);
        $params['sig'] = $sig;

        return Client::Get($url, $params);
    }

    function trackDetail($device_id, $trackId) {
        $url = $this->serverHost."/v1/track/".$trackId;
        $token = $this->token();

        $params = array("app_key"=>$this->appKey,
                        "access_token"=>$token,
                        "device_id"=>$device_id);

        $sig = Utils::GetSig($this->appSecret, $params);
        $params['sig'] = $sig;

        return Client::Get($url, $params);
    }

    function searchArtist($device_id, $page, $count, $keyword) {
        $url = $this->serverHost."/v1/search/artist";
        $token = $this->token();

        $params = array("app_key"=>$this->appKey,
                        "access_token"=>$token,
                        "device_id"=>$device_id,
                        "page"=>$page,
                        "count"=>$count,
                        "keyword"=>$keyword);

        $sig = Utils::GetSig($this->appSecret, $params);
        $params['sig'] = $sig;

        return Client::Get($url, $params);
    }

    function searchAlbum($device_id, $page, $count, $keyword) {
        $url = $this->serverHost."/v1/search/album";
        $token = $this->token();

        $params = array("app_key"=>$this->appKey,
                        "access_token"=>$token,
                        "device_id"=>$device_id,
                        "page"=>$page,
                        "count"=>$count,
                        "keyword"=>$keyword);

        $sig = Utils::GetSig($this->appSecret, $params);
        $params['sig'] = $sig;

        return Client::Get($url, $params);
    }

    function searchTrack($device_id, $page, $count, $keyword) {
        $url = $this->serverHost."/v1/search/track";
        $token = $this->token();

        $params = array("app_key"=>$this->appKey,
                        "access_token"=>$token,
                        "device_id"=>$device_id,
                        "page"=>$page,
                        "count"=>$count,
                        "keyword"=>$keyword);

        $sig = Utils::GetSig($this->appSecret, $params);
        $params['sig'] = $sig;

        return Client::Get($url, $params);
    }
}