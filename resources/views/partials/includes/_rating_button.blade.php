@if(auth()->guard('client')->check() && auth()->guard('client')->id() !=$client->id)
    <button type="button"
            data-url="{{route("client.post.rating.request",encryptId($client->id))}}"
            data-rating="{{ optional($client->myRating)->rating }}"
            data-comment="{{ optional($client->myRating)->comment }}"
            class="btn btn-sm btn-primary py-1 rounded-pill text-white px-4 btn-open-rating">
        {{ __('app.Write a Review') }}
    </button>

@endif


