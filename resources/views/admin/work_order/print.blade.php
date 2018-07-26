<html>
    <head></head>
    <body>
        <div width="50%">
            <div align="center">
                <h1>Happy Pets</h1>
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