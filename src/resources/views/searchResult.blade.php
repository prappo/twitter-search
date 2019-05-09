<!-- MyVendor\contactform\src\resources\views\contact.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <title>Contact Us</title>
</head>
<body>

<div style="width: 500px; margin: 0 auto; margin-top: 90px;">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @endforeach
    @endif

    <h3>Search Tweets</h3>

    <form action="{{route('search')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Keyword</label>
            <input type="text" class="form-control" name="keyword" id="exampleFormControlInput" placeholder="#food">
        </div>


        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    @foreach($tweets->statuses as $tweet)
        <div style="background-color: white; padding:10px; margin-bottom:10px;border-radius: 5px">

            <img style="border-radius: 5px" width="30" height="30"
                 src="{{ $tweet->user->profile_image_url }}">
            <b><a href="https://twitter.com/{{$tweet->user->screen_name}}"
                  target="_blank"> {{ $tweet->user->name }} </a></b> @if($tweet->user->verified == 1)
                <i style="color:#1DA1F1" class="fa fa-check-circle"></i> @endif
            <br>
            {{ $tweet->text }} @if( isset($tweet->source))
                <span class="badge badge-default">{!! $tweet->source !!}</span> @endif
            <br>
            @foreach($tweet->entities->hashtags as $hashtag)
                <span class="badge badge-success">#{{ $hashtag->text }}</span>
            @endforeach
            <br>
            @foreach($tweet->entities->user_mentions as $user_mentions)
                <span class="badge badge-warning">@ {{ $user_mentions->screen_name }}</span>
            @endforeach
            <br>
            <br>
            {{ \Carbon\Carbon::parse($tweet->created_at)->diffForHumans() }}
            <br>
            <br>
            <table>
                <tr>
                    <td><i class="fa fa-retweet"></i> {{ $tweet->retweet_count }}</td>
                    <td></td>
                    <td></td>
                    <td><i class="fa fa-heart"></i> {{ $tweet->favorite_count }}</td>
                </tr>
            </table>
            <br>
            @if(isset($tweet->retweeted_status))

                <div style="border-radius: 5px; border: 1px solid whitesmoke;padding: 10px">
                    {{ $tweet->retweeted_status->text }}
                    <br>
                    @foreach($tweet->retweeted_status->entities->hashtags as $hashtag)
                        <span class="badge badge-success">#{{ $hashtag->text }}</span>
                    @endforeach
                    <br>
                    @foreach($tweet->retweeted_status->entities->user_mentions as $user_mentions)
                        <span class="badge badge-danger">@ {{ $user_mentions->screen_name }}</span>
                    @endforeach
                    <br>
                    <table>
                        <tr>
                            <td><i class="fa fa-retweet"></i> {{ $tweet->retweet_count }}</td>
                            <td></td>
                            <td></td>
                            <td><i class="fa fa-heart"></i> {{ $tweet->favorite_count }}</td>
                        </tr>
                    </table>
                    <br>


                </div>


            @endif
        </div>

    @endforeach

</div>
</body>
</html>
