<a href="{{route("client.review.connection.request",["connection"=>encryptId($item->id),"choice"=>encryptId(2)])}}"
   type="button" class="btn btn-sm btn-light-danger rounded  font-weight-bolder btn-connect">
    {{--    <span class="svg-icon svg-icon-primary mr-0">
            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Navigation/Close.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                        <rect x="0" y="7" width="16" height="2" rx="1"/>
                        <rect opacity="0.3" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000) " x="0" y="7" width="16" height="2" rx="1"/>
                    </g>
                </g>
            </svg>
        </span>--}}
    {{ __("app.Cancel Request") }}
</a>
