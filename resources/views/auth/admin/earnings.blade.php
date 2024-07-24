@extends('voyager::master')
@section('css')
    <style>
        .mt-section {
            margin-top: 40px;
        }

        .table-head {
            border-top: 1px solid #888;
            border-bottom: 1px solid #888;
        }

        .table-head div {
            border-right: 1px solid #888;
        }

        .table-header {
            font-size: 16px;
            text-align: center;
            color: #888;

            padding: 10px;

        }

        .border-l-0 {
            border-right: 0px !important;
        }

        .mb-0 {
            margin-bottom: 0px !important;
        }

        .mt-mid {
            margin-top: 15px;
        }

        .list-group-item {
            display: flex;
            justify-content: space-between;
            border-left: 0;
            border-right: 0;
        }

        .list-group-item:first-child {
            border-top: 0;
        }

        .list-group-item span {
            font-weight: 700;
        }

        .total {
            text-align: end;
            font-size: 16px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            padding-top: 5px;
            margin: 0;
        }

        .total span {

            font-weight: 700;
        }

        .table th {
            padding: 20px 10px !important;
            background-color: #005EAE !important;
            color: white !important;
        }

        .shop-sec-border {
            border-bottom: 1px solid #ddd;
            padding-top: 10px;
        }
        .border-left{
            border-left: 1px solid #ddd;
        }
    </style>

@stop
@section('content')
    <div class="page-content browse container-fluid mt-section">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">


                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Date</th>
                                    <th scope="col" class="text-center">Information</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($earningsGrouped as $key => $earnings)
                                    {{-- @dd($earnings) --}}
                                    <tr>
                                        <td scope="row" class="text-center"> {{ $key }}</td>
                                        <td>
                                            @foreach ($earnings as $key2 => $items)
                                                <div class="{{ count($earnings) > 1 ? 'shop-sec-border' : '' }}">
                                                    <div class="row ">
                                                        <div class="col-md-6">
                                                            <h4>{{ $key2 }}</h4>
                                                        </div>
                                                        <div class="col-md-6 border-left">
                                                            <ul class="list-group">
                                                                @foreach ($items as $data)
                                                                    <li class="list-group-item"><a
                                                                            href="">{{ $data->order->product->name }}</a>
                                                                        <span> = {{ $data->order->quantity }} X
                                                                            {{ Sohoj::price($data->order->product_price) }}</span>
                                                                    </li>
                                                                @endforeach



                                                                <p class="total"><span>Shop Earn :</span> 1200 Tk</p>
                                                                <p class="total"><span>Admin Earn :</span> 1200 Tk</p>
                                                                <p class="total"><span>Retailer Earn :</span> 1200 Tk</p>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach





                                        </td>


                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
