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
                        Your order is on the way.
                        <br />
                        Delivery attempt should be made by
                        <br>
                        <a href="">02-04-2024</label>
                    </td>
                    <td style="width:600px;">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
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
                        View
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="{{ URL::asset('img/location.png') }}" alt="Location">
                    </td>
                    <td>
                        <h3>Delivery Address:</h3>
                        Wong
                        <br />
                        123, Jalan ABC, Kuala Lumpur.
                    </td>
                    <td class="rightText">
                        Copy
                    </td>
                </tr>
            </table>
        </div>

        <div class="itemList">
            <h4 class="mb-0">Shop XYZ</h4>
            <br />

            <table>
                <tr class="black-line">
                    <td class="orderItem">
                        <img id="ImageProduct" src="{{ URL::asset('img/iphone.jpg') }}" alt="iPhone" />
                    </td>
                    <td>
                        iPhone 15 Pro Max
                    </td>
                    <td>
                        X1
                    </td>
                </tr>
                <tr>
                    <td>
                        Order Total
                    </td>
                    <td></td>
                    <td>
                        RM 7,000.00
                    </td>
                </tr>
            </table>

        </div>

        <div class="itemList">
            <h4 class="mb-0">Shop XYZ</h4>
            <br />

            <table>
                <tr>
                    <td>
                        Order ID
                    </td>
                    <td class="rightText">
                        25621GGD723819 <a href="copy">Copy</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        Order Time
                    </td>
                    <td class="rightText">
                        29-03-2023 22:42
                    </td>
                </tr>
                <tr>
                    <td>
                        Payment Time
                    </td>
                    <td class="rightText">
                        29-03-2023 22:45
                    </td>
                </tr>
                <tr>
                    <td>
                        Ship Time
                    </td>
                    <td class="rightText">
                        30-03-2023 15:44
                    </td>
                </tr>
                <tr>
                    <td>
                        Complete Time
                    </td>
                    <td class="rightText">
                        31-03-2023 18:45
                    </td>
                </tr>
            </table>

            <br />

            <div class="d-grid gap-2 d-md-block col-2 mx-auto">
                <button id="ButtonMainPage" class="btn btn-primary" type="button" onclick="ButtonMainPage_Click">Back to Main Page</button>
            </div>

        </div>
    </div>
</div>