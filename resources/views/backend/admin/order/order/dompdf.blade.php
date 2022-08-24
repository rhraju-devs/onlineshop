

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Order Invoice || OnlineShopingBD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>

    <div id="print">

        <div class="container bootdey">
            <div class="row invoice row-printable">
                <div class="col-md-10">
                    <!-- col-lg-12 start here -->
                    <div class="panel panel-default plain" id="dash_0">
                        <!-- Start .panel -->
                        <div class="panel-body p30">
                            <div class="row">
                                <!-- Start .row -->
                                <div class="col-lg-6">
                                    <!-- col-lg-6 start here -->
                                    @if ($settings->count()>0)
                                    <div class="invoice-logo"><img width="130" height="50"
                                            src="{{asset('/uploads/settings/'.$settings[0]->logo)}}" alt=""></div>
                                    @endif
                                </div>
                                <!-- col-lg-6 end here -->
                                <div class="col-lg-6">
                                    <!-- col-lg-6 start here -->
                                    <div class="invoice-from">
                                        <ul class="list-unstyled text-right">
                                            <li>{{env('APP_NAME')}}</li>
                                            <li>@if ($settings->count()>0){{$settings[0]->address}}@endif</li>
                                            <li>@if ($settings->count()>0){{$settings[0]->email}}@endif</li>
                                            <li>@if ($settings->count()>0){{$settings[0]->phone}}@endif</li>
                                            <li>@if ($settings->count()>0){{$settings[0]->tel_number}}@endif</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- col-lg-6 end here -->
                                <div class="col-lg-12">
                                    <!-- col-lg-12 start here -->
                                    <div class="invoice-details mt25">
                                        <div class="well">
                                            <ul class="list-unstyled mb0">
                                                <li><strong>Invoice</strong> #
                                                {{$orders->id}}
                                            </li>
                                                <li><strong>Invoice Date:</strong>
                                                    {{$orders->created_at->format('D, d F, Y')}}
                                                </li>

                                                <li><strong>Due Date:</strong> Thursday, December 1th, 2015</li>
                                                <li><strong>Status:</strong>
                                                    @if($orders->status=='pending')
                                                    <span
                                                        class="badge badge-primary text-uppercase">{{$orders->status}}</span>
                                                    @elseif($orders->status=='approved')
                                                    <span
                                                        class="badge badge-info text-uppercase">{{$orders->status}}</span>
                                                    @elseif($orders->status=='delivered')
                                                    <span
                                                        class="badge badge-success text-uppercase">{{$orders->status}}</span>
                                                    @elseif($orders->status =='cancel')
                                                    <span
                                                        class="badge badge-danger text-uppercase">{{$orders->status}}</span>
                                                    @elseif($orders->status == 'received')
                                                    <span
                                                        class="badge badge-success text-uppercase">{{$orders->status}}</span>
                                                    @endif
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="invoice-to mt25">
                                        <ul class="list-unstyled">
                                            <li><strong>Invoiced To :</strong></li>
                                            <li><strong>Customer Name : </strong><span
                                                    class="text-uppercase">{{auth()->user()->firstname}}
                                                    {{auth()->user()->lastname}}</span></li>
                                            <li><strong>Shipping Info : </strong></li>
                                            <li><strong>Name : </strong><span
                                                    class="text-uppercase">{{$orders->firstname}}
                                                    {{$orders->lastname}}</span></li>
                                            <li><strong>Address : </strong><span
                                                    class="text-uppercase">{{$orders->address}}</span></li>
                                        </ul>
                                    </div>
                                    <div class="invoice-items">
                                        <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="0">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="per70 text-center">S.L</th>
                                                        <th class="per70 text-center">Product</th>
                                                        <th class="per5 text-center">Qty</th>
                                                        <th class="per5 text-center">Unit Price</th>
                                                        <th class="per25 text-center">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $sum = 0;
                                                    @endphp
                                                   @foreach($orders->orderDetails as $key=>$data)
                                                  
                                                    <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td class="text-center">{{$data->getProduct->product_name}}</td>
                                                        <td class="text-center">{{$data->quantity}}</td>
                                                        <td class="text-center">{{$data->unit_price}}</td>
                                                        <td class="text-center">{{$data->subtotal}}</td>
                                                        @php
                                                            $sum = $sum + $data->subtotal;
                                                        @endphp
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="4" class="text-right">Sub Total:</th>
                                                        <th class="text-center">BDT {{number_format($sum, 2)}} Tk.</th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="4" class="text-right">10% VAT:</th>
                                                        @php
                                                        $invoice_vat = ((10*$sum)/100);
                                                        @endphp
                                                        <th class="text-center">BDT {{number_format($invoice_vat, 2)}} Tk.
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="4" class="text-right">Cuppon:</th>
                                                        <th class="text-center">BDT 0 Tk.</th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="4" class="text-right">Total:</th>
                                                        <th class="text-center">BDT {{$sum+$invoice_vat}} Tk.</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                                <!-- col-lg-12 end here -->
                            </div>
                            <!-- End .row -->
                        </div>
                    </div>
                    <!-- End .panel -->
                </div>
                <!-- col-lg-12 end here -->
            </div>
        </div>


        <div class="invoice-footer mt25">
                                        <p class="text-center">Generated on {{now()->format('D, d F, Y')}}  </p>
                                        <!-- <a href="#"
                                                class="btn btn-default ml15"><i class="fa fa-print mr5"
                                                   ></i> Print</a -->
                                        
                                    </div>
    </div>
    <style type="text/css">
        body {
            margin-top: 10px;
            background: #eee;
        }

    </style>

</body>

</html>

