<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
  <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-YMYs80fBW8i9gH3h"></script>
  <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
</head>

<body>
  @include('main/navbar')
  <div style="margin-top:100px;" class="container">
    <div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Make a Payment</h4>
            </div>
            <div class="card-body">

              <div class="mb-3">
                <label for="card-number" class="form-label">Total Pembayaran</label>
                <input disabled type="text" class="form-control" id="card-number" value="Rp20.000,00">
              </div>

              <div class="col-2" style="width:auto !important;">
                <button style="width:150px;padding: 15px;" class="btn btn-primary" id="pay-button">Bayar Sekarang!</button>
              </div>

            </div>
          </div>
        </div>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </div>
  </div>

  <script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function() {
      // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
      window.snap.pay('{{$snapToken}}', {
        onSuccess: function(result) {
          /* You may add your own implementation here */
          alert("payment success!");
          console.log(result);
          window.location.pathname = '../api/poin/done';
        },
        onPending: function(result) {
          /* You may add your own implementation here */
          alert("wating your payment!");
          console.log(result);
        },
        onError: function(result) {
          /* You may add your own implementation here */
          alert("payment failed!");
          console.log(result);
          window.location.pathname = '../api/poin/cencel';
        },
        onClose: function() {
          /* You may add your own implementation here */
          alert('you closed the popup without finishing the payment');
          window.location.pathname = '../api/poin/cencel';
        }
      })
    });
  </script>
</body>

</html>