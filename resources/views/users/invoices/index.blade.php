<html>
<head>
  <title>DR-Code // Bilfold</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-lg-12" style="margin-top: 15px ">
        <div class="pull-left">
          <h2></h2>
          <h4></h4>
        </div>
        <div class="pull-right">
        </div>
      </div>
    </div><br>
    <table class="table table-bordered">
      <tr>
        <th>Name</th>
        <th>Email</th>
      </tr>
      @foreach ($invoices as $invoice)
      <tr>
        <td>{{ $invoice->invoice_num }}</td>
        <td>{{ $invoice->amount }}</td>
      </tr>
      @endforeach
    </table>
  </div>
</body>
</html>
