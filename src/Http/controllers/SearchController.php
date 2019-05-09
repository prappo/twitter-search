<?php
namespace prappo\twitter\Http\Controllers;

use App\Http\Controllers\Controller;
use DG\Twitter\Twitter;
use Illuminate\Http\Request;


class SearchController extends Controller
{
    public function index()
    {
        return view('twitter::search');

    }

    public function search(Request $request)
    {
        $request->validate([
            'keyword' => 'required',
        ]);

        $twitter = new Twitter(
            config('twitter.consumer_key'),
            config('twitter.consumer_secret'),
            config('twitter.access_token'),
            config('twitter.access_token_secret')
        );

        $tweets = $twitter
            ->request(
                'search/tweets',
                'GET',
                ['q' => $request->keyword]
            );

        return view(
            'twitter::searchResult',
            compact('tweets')
        )->withSuccess('Request complete');
    }
}