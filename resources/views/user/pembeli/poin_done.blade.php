<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Successful</title>
</head>
<body>
@include('main/navbar')
  <div style="margin-top:100px;" class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Payment Successful</h4>
          </div>
          <div class="card-body">
            <div class="alert alert-success" role="alert">
              <strong>Congratulations!</strong> Your payment has been successfully processed.
            </div>
            <p>Thank you for your purchase. A confirmation email has been sent to your registered email address.</p>
            <a href="../../" class="btn btn-primary">Back to Home</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
