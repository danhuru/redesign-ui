@extends('layouts.app') @section('content')
<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h5>Subscriptions</h5>
          <!-- /.card-tools -->

          @if (Auth::user()->getLocalUser()->subscribed('prod_HfFBFTTwPrLbCb'))

          Current plan: Meetgeek Pro -> <a href="./billingPortal" target="_blank"> <i class="far fa-credit-card"></i>
            Manage Billing
          </a>

          @elseif (Auth::user()->getLocalUser()->onGenericTrial())

          Current plan: Free trial, expires on {{ Auth::user()->getLocalUser()->trial_ends_at }}

          @else

          To continue to use Meetgeek use one of the options below.

          @endif


          <ul class="nav nav-pills" style="float: right">
            <!-- <li class="nav-item"><a id="myMeetings" class="nav-link active" href="#activity" data-toggle="tab">My Meetings</a></li>
					<li class="nav-item"><a id="allMeetings" class="nav-link" href="#timeline" data-toggle="tab">All Meetings</a></li> -->
            <!-- <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">+</a></li> -->


          </ul>

        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>

  <section class="content">

    <div class="card">
      <!-- card-header -->
      <div class="card-header">

      </div>
      <!-- /.card-header -->

      <!-- card-body -->
      <div class="card-body">

        @if (Auth::user()->getLocalUser()->subscribed('prod_HfFBFTTwPrLbCb'))

        <div class="row" style="padding: 0px 20px 0 20px">
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box" style="text-align: center;">
              <div class="info-box-content">
                <h1><b>Free trial</b></h1>
                <h6>30 days</h6>
                <!-- Expired on {{ Auth::user()->getLocalUser()->trial_ends_at }} -->
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box" style="text-align: center; border:4px solid lightblue">
              <div class="info-box-content">
                <h1><b>Pro</b></h1>
                <h6>$39/mo</h6>
                <b> Active </b>
                <!-- <p>
                  <a href="./billingPortal" target="_blank"> <i class="far fa-credit-card"></i>
                    Manage Billing
                  </a>
                </p> -->
              </div>
            </div>
          </div>

          @elseif (Auth::user()->getLocalUser()->onGenericTrial())

          <div class="row" style="padding: 0px 20px 0 20px">
            <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box" style="text-align: center; border:4px solid lightblue">
                <div class="info-box-content">
                  <h1><b>Free trial</b></h1>
                  <h6>30 days</h6>
                  <p style="color:orange"> Expires on {{ Auth::user()->getLocalUser()->trial_ends_at }} </p>
                </div>
              </div>
            </div>

            <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box" style="text-align: center">
                <div class="info-box-content" style="text-align: center">
                  <h1><b>Pro</b></h1>
                  <h6>$39/mo</h6>
                  <button id="checkout-button-pro" class="btn btn-warning" type="submit">
                    Checkout
                  </button>
                </div>
              </div>
            </div>

            @else

            <div class="row" style="padding: 0px 20px 0 20px">
              <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box" style="text-align: center; border:4px solid lightblue">
                  <div class="info-box-content">
                    <h1><b>Free trial</b></h1>
                    <h6>30 days</h6>
                    <p style="color:red">Expired on {{ Auth::user()->getLocalUser()->trial_ends_at }}</p>
                  </div>
                </div>
              </div>

              <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box" style="text-align: center">
                  <div class="info-box-content" style="text-align: center">
                    <h1><b>Pro</b></h1>
                    <h6>$39/mo</h6>
                    <button id="checkout-button-pro" class="btn btn-warning" type="submit">
                      Checkout
                    </button>
                  </div>
                </div>
              </div>

              @endif

              <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                  <div class="info-box-content" style="text-align: center">
                    <h1><b>PAYG</b></h1>
                    <h6>Pay as you go</h6>
                    Coming soon
                  </div>
                </div>
              </div>

            </div>

          </div>
        </div>

      </div>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

</section>
</div>

</section>
</div>
<script type="text/javascript">
  var stripe = Stripe('{{$stripeApiKey}}');
  var checkoutButton = document.getElementById('checkout-button-pro');

  checkoutButton.addEventListener('click', function() {
    stripe.redirectToCheckout({
      sessionId: '{{$sessionId}}'
    }).then(function(result) {
      // If `redirectToCheckout` fails due to a browser or network
      // error, display the localized error message to your customer
      // using `result.error.message`.
      console.log(result)
    });
  });

  function onSubscriptionComplete(result) {

    console.log('result')
    // Payment was successful.
    if (result.subscription.status === 'active') {
      // Change your UI to show a success message to your customer.
      // Call your backend to grant access to your service based on
      // `result.subscription.items.data[0].price.product` the customer subscribed to.
    }
  }
</script>
@stop