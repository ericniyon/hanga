<a href="{{route("client.my.messages",["client"=>encryptId($item->id??'0')])}}" type="button"
   class="btn btn-sm btn-light-info rounded  font-weight-bolder btn-connect">
    {{ __('app.Message') }}
</a>
