<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ $model->company_name }} One Pager</title>
</head>

<body style="padding: 1rem; border:1px solid;">
    <center style="margin-bottom:3rem">
        <span style="font-weight:bold; font-size:18px;text-transform:uppercase">
            {{ $model->company_name }} - One Pager
            <hr width="350">
        </span>
    </center>
    <table width="100%" border="0">

        <tr>
            <td colspan="6">
                <center>
                    @if ($model->logo)
                        <img src="{{ Storage::disk('logos')->url($model->logo) }}" style="width: 3rem;"
                            alt="" />
                        {{-- <img src="https://img.freepik.com/premium-vector/mb-logo-design_731343-151.jpg?w=360"
                        style="width: 3rem;" alt="" /> --}}
                        {{-- {{-- @else --}}
                        <span>No logo</span>
                    @endif
                </center>
            </td>
            <td rowspan="14" style="border-right:1px solid"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td colspan="7">
                <span style="font-weight: 700;">About</span>
                <hr>
                <p class="text-justify text-xs">
                    {{ $model->bio }}
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="12"></td>
        </tr>
        <tr>
            <td colspan="6">
                <div style="font-weight: 700;">
                    {{ $model->company_name }}
                </div>
                {{-- <div class="mt-4 flex flex-col">
                    <span class="font-semibold uppercase">location</span>
                    <span class="text-sm">location, Name</span>
                </div> --}}
            </td>
            <td colspan="7">
                <span style="font-weight: 700;">Mission</span>
                <hr>
                <p class="text-justify text-xs">
                    {{ $model->mission }}
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="10"></td>
        </tr>
        <tr>
            <td colspan="6">
                <div class="mt-4 flex flex-col">
                    <span style="font-weight: 700;">Contact</span><br>
                    <span style="font-size: 12px !important">{{ $model->phone }}</span><br>
                    <span style="font-size: 12px !important">{{ $model->email }}</span><br>
                    <span style="font-size: 12px !important">{{ $model->website }}</span><br>
                </div>
            </td>
            <td colspan="7">
                <span style="font-weight: 700;">Problem</span>
                <hr>
                <p class="text-justify text-xs">
                    {{ $model->problem }}
                </p>
            </td>
        </tr>
        <tr colspan="10"></tr>
        <tr>
            <td colspan="6">
                <span style="font-weight: 700;">products</span>
                <ul>
                    @foreach ($products as $item)
                        <li class="text-sm">{{ $item->name }}</li>
                    @endforeach
                </ul>
            </td>
            <td colspan="7">
                <span style="font-weight: 700;">Revenue Stream</span>
                <hr>
                <p class="text-justify text-xs">
                    {{ $model->revenue_stream }}
                </p>
            </td>
        </tr>
        <tr colspan="10"></tr>
        <tr>
            <td colspan="6">
                <span style="font-weight: 700;">Team</span>
                <ul>
                    @foreach ($team as $item)
                        <li style="font-size: 12px !important">{{ $item->team_firstname }} {{ $item->team_lastname }}
                            ({{ $item->team_position }})
                        </li>
                    @endforeach
                </ul>
            </td>
            <td colspan="7">
                <span style="font-weight: 700;">Target Customers</span>
                <hr>
                <p class="text-justify text-xs">
                    {{ $model->target_customers }}
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="5"></td>
            <td>&nbsp;</td>
            <td colspan="3">
                <div
                    style="
              background-color: #06affd;
              color: white;
              border-radius: 0.4rem;
              padding: 1rem; 
            ">
                    <table>
                        <tr>
                            <td>
                                <span style="font-weight: 700;">Anual Revenue: </span>
                            </td>
                            <td style="text-align: right;">${{ $model->anual_recuring_revenue }}</td>
                        </tr>
                        <tr>
                            <td>
                                <span style="font-weight: 700;">Previous Investment: </span>
                            </td>
                            <td style="text-align: right;">${{ $model->previous_investment_type }}</td>
                        </tr>
                        <tr>
                            <td>
                                <span style="font-weight: 700;">TAM: </span>
                            </td>
                            <td style="text-align: right;">{{ $model->market_size_tam }}</td>
                        </tr>
                        <tr>
                            <td>
                                <span style="font-weight: 700;">SAM: </span>
                            </td>
                            <td style="text-align: right;">{{ $model->market_size_sam }}</td>
                        </tr>
                        <tr>
                            <td>
                                <span style="font-weight: 700;">SOM: </span>
                            </td>
                            <td style="text-align: right;">{{ $model->market_size_som }}</td>
                        </tr>
                    </table>
                </div>
            </td>
            <td colspan="4">
                <!-- <span>Acheivement</span> -->
                <div>
                    <div class="w-1/2 rounded bg-red-400 p-2"></div>
                    <div class="w-1/2 bg-green-400 p-2 rounded">
                        <div
                            style="
                  background-color: #06affd;
                  color: white;
                  border-radius: 0.4rem;
                  padding: 1rem;
                ">
                            <table>
                                <tr>
                                    <td>
                                        <span style="font-weight: 700;">Business Model: </span>
                                    </td>
                                    <td style="text-align: right;">{{ $model->business_model }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <span style="font-weight: 700;">Target Investor: </span>
                                    </td>
                                    <td style="text-align: right;">{{ $model->target_investors }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <span style="font-weight: 700;">Current Stage: </span>
                                    </td>
                                    <td style="text-align: right;">{{ $model->current_startup_stage }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <span style="font-weight: 700;">Paying Customers: </span>
                                    </td>
                                    <td style="text-align: right;">{{ $model->paying_customers }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <span style="font-weight: 700;">Growth rate: </span>
                                    </td>
                                    <td style="text-align: right;">{{ $model->customer_growth_rate }}%</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="10"></td>
        </tr>
        <tr>
            <td colspan="10"></td>
        </tr>
        <tr>
            <td colspan="6"></td>
            <td colspan="7">
                <span style="font-weight: 700;">Fund Raising <span
                        style="color: #004e71;">${{ number_format($model->target_investment_size) }}</span></span>
                <hr>
                <p class="text-justify text-xs mt-3">
                    {{ $model->fundraising_breakdown }}
                </p>
            </td>
        </tr>
    </table>
</body>

</html>
