<section class="cta-subscribe bg-subscribe overlay-dark">
  <div class="container">



    <div class="row">
      <div class="col-md-6 mr-auto">
        <!-- Subscribe Content -->
        <div class="content">
          <h3>Subscribe to Our <span class="alternate">Newsletter</span></h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusm tempor</p>
        </div>
      </div>
      <div class="col-md-6 ml-auto align-self-center">
        <!-- Subscription form -->
        <form action="{{ route('newsletter.save') }}" method="post" class="row">
          @csrf
          <div class="col-lg-8 col-md-12">
            <input type="email" class="form-control main white mb-lg-0" placeholder="Email" name="email">
          </div>
          <div class="col-lg-4 col-md-12">
            <div class="subscribe-button">
              <button class="btn btn-main-md">Subscribe</button>
            </div>
          </div>
        </form>
      </div>
    </div>


  </div>
</section>
