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
                <h3>Alam Sutera</h3>
                <hr>
            </div>
            <p align="center"><b><u>Report Order By Date</u></b></p>
            <table id="parts" align="center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Status</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                @php($no = 1)
                @foreach($reports as $report)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $report->order_id }}</td>
                    <td>{{ $report->user->name }}</td>
                    <td>{{ $report->status }}</td>
                    <td>Rp. {{ number_format($report->total,0, ',' , '.') }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>