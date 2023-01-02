<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">

  <!-- CSS Custom -->
  <link rel="stylesheet" href="{{asset('assets_user/checkout.css')}}">
</head>

<body>

  <main class="page payment-page">
    <section class="payment-form dark">
      <div class="container">
        <div class="block-heading">
          <h2 class="pt-4">Payment</h2>
        </div>
        <form>
          <div class="products">
            <h3 class="title">Checkout</h3>
            <div class="item">
              <span class="price">$200</span>
              <p class="item-name">Product 1</p>
              <p class="item-description">Lorem ipsum dolor sit amet</p>
            </div>
            <div class="total">Total<span class="price">$320</span></div>
          </div>
          <div class="card-details">
            <h3 class="title">Credit Card Details</h3>
            <div class="row">
              <div class="form-group col-sm-7">
                <label for="card-holder">Card Holder</label>
                <input id="card-holder" type="text" class="form-control" placeholder="Card Holder" aria-label="Card Holder" aria-describedby="basic-addon1">
              </div>
              <div class="form-group col-sm-5">
                <label for="">Expiration Date</label>
                <div class="input-group expiration-date">
                  <input type="text" class="form-control" placeholder="MM" aria-label="MM" aria-describedby="basic-addon1">
                  <span class="date-separator"> / </span>
                  <input type="text" class="form-control" placeholder="YY" aria-label="YY" aria-describedby="basic-addon1">
                </div>
              </div>
              <div class="form-group col-sm-8 pt-2">
                <label for="card-number">Card Number</label>
                <input id="card-number" type="text" class="form-control" placeholder="Card Number" aria-label="Card Holder" aria-describedby="basic-addon1">
              </div>
              <div class="form-group col-sm-4 pt-2">
                <label for="cvc">CVC</label>
                <input id="cvc" type="text" class="form-control" placeholder="CVC" aria-label="Card Holder" aria-describedby="basic-addon1">
              </div>
              <div class="form-group col-sm-12">
                <button class="btn btn-primary btn-block">Proceed</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>
