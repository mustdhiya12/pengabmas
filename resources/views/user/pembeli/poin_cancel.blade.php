<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Cancelled</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
  @include('main/navbar')
  <div style="margin-top:100px;" class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Payment Cancelled</h4>
          </div>
          <div class="card-body">
            <div class="alert alert-danger" role="alert">
              <strong>Oops!</strong> Your payment was not processed.
            </div>
            <p>We're sorry, but your payment was cancelled or unsuccessful. Please try again later or contact customer support for assistance.</p>
            <a href="../../" class="btn btn-primary">Back to Home</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>