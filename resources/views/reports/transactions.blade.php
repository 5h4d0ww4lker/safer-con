<?php header('Content-Type: text/html; charset=UTF-8'); ?>

<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        body {
            font-family: 'Tera-Regular'
        }
    </style>
    <title>Details</title>

    <style type="text/css">
        table {
            border-collapse: collapse
        }

        table,
        th,
        td {
            border: 1px solid black
        }

        td {
            padding: 3px 15px;
            font-size: 16px
        }

        /* container {
        page-break-after: always
    }*/
        .header {
            position: fixed;
            top: 0px;
            margin: 100px 0px
        }

        .footer {
            position: fixed;
            bottom: 0px
        }

        .pagenum:before {
            content: counter(page);
        }

        @page {
            size: 21cm 29.7cm;
            margin-top: 1.27cm;
            margin-left: 1.27cm;
            margin-right: 1.27cm;
        }

        .align {
            text-align: center;
            border-top-style: ridge;
            border-bottom-style: ridge;
            background-color: #ffffff;
        }

        .leftalign {
            text-align: left;
            color: #280ce9;

        }

        .centeralign {
            text-align: center;
            color: #280ce9;

        }

        .rightalign {
            text-align: right;
            color: #280ce9;



        }

        .footer3 {
            position: fixed;
            bottom: 15px;
            color: #280ce9;
        }

        .footer4 {
            position: fixed;
            bottom: 25px;
            color: #280ce9;
            font-size: bold;
        }

        .footer5 {
            position: fixed;
            bottom: 27px;
            color: #280ce9;
            font-size: bold;
        }

        .header4 {
            position: fixed;
            top: 107px;
            color: #280ce9;
            font-weight: bolder;
        }

        .header5 {
            position: fixed;
            top: 106px;
            color: #280ce9;
            font-size: bold;
        }

        .header6 {
            position: fixed;
            bottom: 105px;
            color: #280ce9;
            font-size: bold;
        }

        .header8 {
            position: fixed;
            top: 110px;
            color: #280ce9;
            font-size: bold;
        }


        .footer6 {
            position: fixed;
            bottom: 22px;
            color: #280ce9;
            font-size: bold;
        }

        .footer2 {
            position: fixed;
            bottom: 2px;
            color: #280ce9;
        }

        .column {
            float: left;
            width: 33.33%;
            color: #280ce9;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>

</head>

<body style="background-color:#ffffff;font-family: Tera-Regular;">

    <div class="footer">
        <p style="font-size: 14px;">Page: <span class="pagenum"></span></p>
    </div>
    <div class="container">




        <div class="row">

            <img src="{{ public_path("public/som2.png") }}" alt="" style="width: 50px; height: 50px; padding-left:45%;">





        </div>
        <div class="row">



            <h5 style="text-align:center">Arganon Ecomerce</h5>




        </div>



        <hr class="header4">


        <h5 class="align">Transactions Report</h5>

        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width="">SL#</th>
                    <th width="">From</th>
                    <th width="">To</th>
                    <th width="">Amount</th>
                    <th width="">Status</th>


                </tr>
            </thead>
            <tbody>
                {{ $sl = 1 }}
                @foreach($transactions as $transaction)

                <?php

                $from = \App\User::find($transaction->from);
                $to = \App\User::find($transaction->to);


                ?>

                <tr>
                    <td>{{ $sl++ }}</td>
                    <td>{{@$from->name}} &nbsp;{{@$from->father_name}}</td>
                    <td>{{@$to->name}} &nbsp;{{@$to->father_name}}</td>
                    <td>{{@$transaction->amount }}&nbsp;ETB</td>
                    <td>{{@$transaction->status }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
        <hr class="footer4">
        <hr class="footer5">
        <hr class="footer6">


        <p>
            <h5 class="footer2">www.Arganon.com</h5>
        </p>
    </div>
</body>

</html>