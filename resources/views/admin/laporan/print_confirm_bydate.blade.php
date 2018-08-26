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
            <p align="center"><b><u>Report Confirm Payment By Date</u></b></p>
            <table id="parts" align="center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Customer</th>
                        <th>Bank Account</th>
                        <th>Account Number</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Photo</th>
                    </tr>
                </thead>
                <tbody>
                @php($no = 1)
                @foreach($reports as $report)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $report->name }}</td>
                    <td>{{ $report->bank_account }}</td>
                    <td>{{ $report->account_number }}</td>
                    <td>Rp. {{ number_format($report->amount,0, ',' , '.') }}</td>
                    <td>{{ $report->status }}</td>
                    <td>
                        <img src="data:image/png;base64, {{ $report->photo }}" width="100px" height="100px" alt="" />
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>