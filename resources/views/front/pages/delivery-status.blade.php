@extends('front.layouts.default')

@section('custom-head')
<link href="{{ URL::asset('css/front/deliveryStatus.css') }}" rel="stylesheet" />
@stop

@section('content')
<div id="content" class="p-3 ">
    <div class="container py-5">
        <h2 class="fw-bold pb-3">Delivery Status</h2>
        <div class="deliveryOrder">
            <table>
                <tr>
                    <td>
                        @switch($order->status)
                            @case(1)
                                Your order is created.
                                @break
                            @case(2)
                                A driver is assigned.
                                @break
                            @case(3)
                                Your order is on its way.
                                @break
                            @case(4)
                                The order has arrived.
                                @break
                        @endswitch
                    </td>
                    <td style="width:600px;">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: {{($order->status-1)*33.33}}%"></div>
                        </div>
                    </td>
                    <td>
                        <img src="{{ URL::asset('img/ReceiveParcel.jpg') }}" alt="Info" class="deliveryLogo">
                    </td>
                </tr>
            </table>
        </div>

        <div class="shippingInfo">
            <table>
                <tr>
                    <td>
                        <img src="{{ URL::asset('img/delivery.png') }}" alt="Delivery">
                    </td>
                    <td>
                        <h3>Shipping Information:</h3>
                        Doorstep Delivery
                        <br />
                        SPX Express (West Malaysia)
                    </td>
                    <td class="rightText">
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="{{ URL::asset('img/location.png') }}" alt="Location">
                    </td>
                    <td>
                        <h3>Delivery Address:</h3>
                        {{$order->customer->name}}
                        <br />
                        {{$order->customer->address}}<br>
                        {{$order->customer->postcode}} {{$order->customer->city}}<br>
                        {{$order->customer->state}}.
                    </td>
                    <td class="rightText">
                        
                    </td>
                </tr>
            </table>
        </div>

        <div class="itemList">
            <h4 class="mb-0">TerraByte</h4>
            <br />

            <table>
                @foreach($order->orderItems as $item)
                <tr class="black-line">
                    <td class="orderItem">
                        <img id="ImageProduct" src="{{ Storage::disk('products')->url($item->product->img_src1) }}" alt="iPhone" />
                    </td>
                    <td>
                        {{$item->title}}
                    </td>
                    <td>
                        Quantity : {{$item->quantity}}
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td>
                        Order Total
                    </td>
                    <td></td>
                    <td>
                        RM {{number_format($order->total, 2, '.', ',')}}
                    </td>
                </tr>
            </table>

        </div>

        <div class="itemList">
            <h4 class="mb-0">TerraByte</h4>
            <br />

            <table>
                <tr>
                    <td>
                        Order ID
                    </td>
                    <td class="rightText">
                        #{{$order->id}} 
                    </td>
                </tr>
                <tr>
                    <td>
                        Order Time
                    </td>
                    <td class="rightText">
                        {{$order->created_on}}
                    </td>
                </tr>
            </table>

            <br />

            <div class="d-grid gap-2 d-md-block col-2 mx-auto">
                <a class="btn btn-primary" href="{{route('front.order_hist')}}">Back</a>
            </div>

        </div>
    </div>
</div>
@stop