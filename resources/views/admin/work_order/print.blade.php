<html>
    <head></head>
    <style>
        #parts {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 60%;
        }
    
        #parts td, #parts th {
            border: 1px solid #ddd;
            padding: 8px;
        }
    
        #parts tr:nth-child(even){background-color: #f2f2f2;}
    
        #parts tr:hover {background-color: #ddd;}
    
        #parts th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #FE980F;
            color: white;
        }
    </style>
    <body>
        <div width="50%">
            <div align="center">
                <img src="{{ asset('assets/logo-happypet.png') }}" width="100px" height="auto" alt="" />
                {{-- <h1>Happy Pets</h1> --}}
                <h3>Alam Sutera</h3>
                <hr>
            </div>
            <p align="center"><b><u>SURAT PERINTAH KERJA</u></b></p>
            <table style="margin-left:20%;margin-right:20%;">
                <tr>
                    <td>Work Order ID</td>
                    <td>:</td>
                    <td>{{ $workOrders->wo_number }}</td>
                </tr>
                <tr>
                    <td>Date</td>
                    <td>:</td>
                    <td>{{ date_format($workOrders->created_at, "d-m-Y") }}</td>
                </tr>
                <tr>
                    <td>Order ID</td>
                    <td>:</td>
                    <td>{{ $workOrders->order_id }}</td>
                </tr>
                <tr>
                    <td>Customer</td>
                    <td>:</td>
                    <td>{{ $order->user->name }}</td>
                </tr>
                    <tr>
                    <td>Address</td>
                    <td>:</td>
                    <td>{{ $order->alamat_order }}</td>
                </tr>
                </tr>
                    <tr>
                    <td>Notes</td>
                    <td>:</td>
                    <td>{{ $order->notes }}</td>
                </tr>
            </table>
            <h3 align="center"><b><u>List Order</u></b></h3>
            <table id="parts" align="center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Product</th>
                    </tr>
                </thead>
                <tbody>
                @php($no = 1)
                @foreach($orderDetails as $orderDetail)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $orderDetail->product->name }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <hr>
            <table style="margin-left:20%;margin-right:20%;">
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $workOrders->from->name }}</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <td>{{ $workOrders->from->position }}</td>
                </tr>
                <tr>
                    <td><b>Memerintahkan kepada</b></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{ $workOrders->to->name }}</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <td>{{ $workOrders->to->position }}</td>
                </tr>
            </table>
            <table style="margin-left:20%;margin-right:20%;width:100%;">
                <tr style="height:200px;">
                    <td>Pemberi Tugas</td>
                    <td>Penerima Tugas</td>
                </tr>
                <tr style="padding-top:100px;">
                    <td>{{ $workOrders->from->name }}</td>
                    <td>{{ $workOrders->to->name }}</td>
                </tr>
            </table>
        </div>
    </body>
</html>