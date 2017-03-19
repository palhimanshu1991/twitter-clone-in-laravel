@foreach($tweets as $tweet)
    @include('tweets._tweet', ['tweet' => $tweet])
@endforeach