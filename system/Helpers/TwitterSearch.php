<?php
namespace Helpers;

/**
 * Twitter search helper
 *
 */

use Helpers\TwitterProxy;
use Helpers\GeoCode;


class TwitterSearch
{
    // Twitter OAuth Config options
    private $config = [
        'consumer_key' => "bE9YVVWXGJk6sH3kQhMOnl3cW",
        'consumer_secret' => "W0PXOKVMG5ed0JiBGmTk1rvmDHxxo36jId0FFG15KlMD1xD4rn",
        'oauth_access_token' => "728612800285708288-yW3tSw7diEA4KW6sEUrXDHU19AEYw6P",
        'oauth_access_token_secret' => "ZVI5uiKKuewRCmBKA5hysfptgL1VA8LxW7CedQgjRGBDI",
        'count' => 50,
        'twitter_url' => 'search/tweets.json',
        'radius' => '50km'
    ];

    public function __construct($city) {
        $this->config['city'] = $city;
        $coordinate = GeoCode::getLngLat(['', $city]);
        $this->config['twitter_url'] .= '?q='.$city.'&geocode='.$coordinate['lat'].','.$coordinate['lon'].','.$this->config['radius'].'&count='.$this->config['count'];
    }
    
    public function search(){
        //// Create a Twitter Proxy object from our twitter_proxy.php class
        $twitter_proxy = new TwitterProxy($this->config);

        //// Invoke the get method to retrieve results via a cURL request
        $tweets = $twitter_proxy->get($this->config['twitter_url']);
        return $tweets;
    }
}

