



    <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>

    <style>
        body {
            font-family: system-ui, system-ui, sans-serif;
        }

        table {
            border-spacing: 0;
        }

        table td,
        table th,
        p {
            font-size: 13px !important;
        }

        img {
            border: 3px solid #F1F5F9;
            padding: 6px;
            background-color: #F1F5F9;
        }

        .table-no-border {
            width: 100%;
        }

        .table-no-border .width-50 {
            width: 50%;
        }

        .table-no-border .width-70 {
            width: 70%;
            text-align: left;
        }

        .table-no-border .width-30 {
            width: 30%;
        }

        .margin-top {
            margin-top: 40px;
        }

        .product-table {
            margin-top: 20px;
            width: 100%;
            border-width: 0px;
        }

        .product-table thead th {
            background-color: #60A5FA;
            color: white;
            padding: 5px;
            text-align: left;
            padding: 5px 15px;
        }

        .width-20 {
            width: 20%;
        }

        .width-50 {
            width: 50%;
        }

        .width-25 {
            width: 25%;
        }

        .width-70 {
            width: 70%;
            text-align: left;
        }

        .product-table tbody td {
            background-color: #F1F5F9;
            color: black;
            padding: 5px 15px;
        }

        .product-table td:last-child,
        .product-table th:last-child {
            text-align: right;
        }

        .product-table tfoot td {
            color: black;
            padding: 5px 15px;
        }

        .footer-div {
            background-color: #F1F5F9;
            margin-top: 100px;
            padding: 3px 10px;
        }
    </style>
</head>

<body>

    <table class="table-no-border">
        <tr>
            <td class="width-70">
                <img src="{{ public_path('/storage/images/logo.png') }}" alt="" width="200" />
            </td>
            <td class="width-30">
                <h2>Factuurnummer: <span>#{{ $Order->id }}</span></h2>
                <h2>Factuurdatum:<br />
                    <span>#{{ $Order->date }}</span></h2>
            </td>
        </tr>
    </table>

    <div class="margin-top">
        <table class="table-no-border">
            <tr>
                <td class="width-50">
                    <div><strong>Factuur Naar:</strong></div>

                    <div>{{ $Order->billing_firstname }}{{ $Order->billing_lastname }}</div>
                        @if ($Order->billing_companyname)
                            <div>{{ $Order->billing_companyname }}</div>
                        @endif
                        <div>{{ $Order->billing_address }} {{ $Order->billing_housenumber }} <br />
                            {{ $Order->billing_zipcode }} {{ $Order->billing_city }} <br />
                            {{ $Order->billing_country }}
                        </div>
                        <div><strong>Phone:</strong> {{ $Order->billing_phonenumber }}</div>
                        <div><strong>Email:</strong> {{ $Order->billing_email }}</div>
                </td>
                <td class="width-50">
                    <div><strong>Bezorging Naar:</strong></div>
                    <div>{{ $Order->shipping_firstname }}{{ $Order->shipping_lastname }}</div>
                        @if ($Order->shipping_companyname)
                            <div>{{ $Order->shipping_companyname }}</div>
                        @endif
                        <div>{{ $Order->shipping_address }} {{ $Order->shipping_housenumber }} <br />
                            {{ $Order->shipping_zipcode }} {{ $Order->shipping_city }} <br />
                            {{ $Order->shipping_country }}
                        </div>
                        <div><strong>Phone:</strong> {{ $Order->shipping_phonenumber }}</div>
                        <div><strong>Email:</strong> {{ $Order->shipping_email }}</div>

                </td>

                <td class="width-50">
                    <div><strong>Factuur Van:</strong></div>
                    <div>IEAR</div>
                    <div>Sterrenlaan 10<br />
                        5631 KA  Eindhoven<br />
                        Nederland
                    </div>
                    <div><strong>Email:</strong> IEAR@mohmadyazansweed.nl</div>
                </td>
            </tr>
        </table>
    </div>

    <div>
        <table class="product-table">
            <thead>
                <tr>
                    <th class="width-50">
                        <strong>PRODUCT NAAM</strong>
                    </th>
                    <th class="width-50">
                        <strong>PRIJS</strong>
                    </th>
                    <th class="width-50">
                        <strong>AANTAL</strong>
                    </th>
                    <th class="width-50">
                        <strong>TOTALPRIJS</strong>
                    </th>

                </tr>
            </thead>
            <tbody>
                @php
                $total = 0;
            @endphp

                @foreach ($OrderItems as $OrderItem)

                    <tr>
                        <td class="width-70"  >
                            {{ $OrderItem->product->product_name }}
                        </td>
                        <td class="width-50">
                            {{ $OrderItem->product_price }}
                        </td>
                        <td class="width-50">
                            {{ $OrderItem->quantity }}
                        </td>
                        <td class="width-50">
                            {{ $OrderItem->price }}
                        </td>
                    </tr>
                    @php
                    $total += $OrderItem->price ;
                @endphp
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td class="width-50"></td>
                    <td class="width-50"></td>
                    <td class="width-50" >
                        <strong>Subtotaal:</strong>
                    </td>
                    <td class="width-50">
                        <strong>€ {{ number_format(( $total * 0.79), 2, '.', ',') }}</strong>
                    </td>
                </tr>
                <tr>
                    <td class="width-50"></td>
                    <td class="width-50"></td>
                    <td class="width-50" >
                        <strong>BTW</strong>(21%):
                    </td>
                    <td class="width-50">
                        <strong>€ {{ number_format(( $total * 0.21), 2, '.', ',') }}</strong>
                    </td>
                </tr>
                <tr>
                    <td class="width-50"></td>
                    <td class="width-50"></td>
                    <td class="width-50" >
                        <strong>Total:</strong>
                    </td>
                    <td class="width-50">
                        <strong>€ {{ number_format(($total), 2, '.', ',')}}</strong>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="footer-div">

    </div>

</body>

</html>
