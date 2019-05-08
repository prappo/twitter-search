<?php
namespace prappo\twitter\Http\Controllers;

use App\Http\Controllers\Controller;
use DG\Twitter\Twitter;

class SearchController extends Controller
{
    public function index()
    {
        $twitter = new Twitter(
            config('twitter.consumer_key'),
            config('twitter.consumer_secret'),
            config('twitter.access_token'),
            config('twitter.access_token_key')
        );

        print_r($twitter->load(Twitter::ME));

    }
}