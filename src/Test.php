<?php

include_once("Api.php");

$appKey = "appKey";
$appSecret = "appSecret";
$serverHost = "http://serverHost";

$api = new Api($appKey, $appSecret, $serverHost);

echo "\ntest token\n";
echo $api->token();
echo "\ntest token\n";

echo "\ntest genreList\n";
print_r($api->genreList("1212", 0, 20));
echo "\ntest genreList\n";

echo "\ntest albumListByGenre\n";
print_r($api->albumListByGenre("1212", 0, 20, 1));
echo "\ntest albumListByGenre\n";

echo "\ntest trackListByGenre\n";
print_r($api->trackListByGenre("1212", 0, 20, 1));
echo "\ntest trackListByGenre\n";

echo "\ntest artistList\n";
print_r($api->artistList("1212", 0, 20));
echo "\ntest artistList\n";

echo "\ntest albumListByArtist\n";
print_r($api->albumListByArtist("1212", 0, 20, 1));
echo "\ntest albumListByArtist\n";

echo "\ntest trackListByArtist\n";
print_r($api->trackListByArtist("1212", 0, 20, 1));
echo "\ntest trackListByArtist\n";

echo "\ntest albumDetail\n";
print_r($api->albumDetail("1212", 1));
echo "\ntest albumDetail\n";

echo "\ntest trackListByAlbum\n";
print_r($api->trackListByAlbum("1212", 0, 20, 1));
echo "\ntest trackListByAlbum\n";

echo "\ntest trackDetail\n";
print_r($api->trackDetail("1212", 1));
echo "\ntest trackDetail\n";

echo "\n test searchArtist\n";
print_r($api->searchArtist("1212", 0, 20, "love"));
echo "\ntest searchArtist\n";

echo "\ntest searchAlbum\n";
print_r($api->searchAlbum("1212", 0, 20, "love"));
echo "\ntest searchAlbum\n";

echo "\ntest searchTrack\n";
print_r($api->searchTrack("1212", 0, 20, "love"));
echo "\ntest searchTrack\n";
