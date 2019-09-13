@extends('layouts.app')

@section('content')

    <div class="homepage">
        <nav class="p-4 d-flex align-items-center justify-content-around">
            <h4 class="p-0 m-0">HomeShopping</h4>
            <ul class="p-0 m-0 no-list">
                <li><a href="#">Women</a></li>
                <li><a href="#">Men</a></li>
                <li><a href="#">Kids</a></li>
                <li><a href="#">Shoes</a></li>
                <li><a href="#">Brands</a></li>
            </ul>
            <div>
                <span class="fui-search mr-5"></span>
                <span class="fa-layers fa-fw mr-2" style="font-size:25px;">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="fa-layers-counter" style="font-size: 35px;background:#fff;color:#F62F5E;">25</span>
                </span>
            </div>
        </nav>
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="upperhead">
                        <div class="upperhead__content">
                            <h1>Background and Development</h1>
                            <p>Convergent the dictates of the consumer: background and development</p>
                            <a href="#" class="btn btn-big btn-light">View All</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="homepage__category p-2 d-flex justify-content-around align-items-center">
                        <img class="img-fluid p-5" src="/images/shopping-bag.png">
                        <div class="homepage__category__content w-50">
                            <h3>Vera Bradley</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                            <a href="#" class="btn btn-big btn-pink">View All</a>
                        </div>
                        <span class="homepage__category__tag">Sale</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="lowerheader__widget lowerheader__widget--1 shadow">
                                <h1 class="pb-4">WOW</h1>
                                <h4>Check WHAT!</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="lowerheader__widget lowerheader__widget--2 shadow">
                                <h1>MEN</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="lowerheader__widget lowerheader__widget--3 shadow">
                                <img class="img-fluid" src="/images/games.jpg">
                                <div class="lowerheader__widget__content">
                                    <h1 class="m-0 pb-4">Let The Game begin</h1>
                                    <p class="pb-3">Registration is on - get ready for the Open</p>
                                    <a href="#" class="btn btn-big btn-pink">View All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="container-fluid mt-3 p-0">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <div class="homepage__subscribe p-5 text-center">
                        <div class="homepage__subscribe__content col-md-8 offset-md-2">
                            <h3>10% Discount for your subscription</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                            <div class="d-flex justify-content-center align-items-center">
                                <input class="form-control w-50 mr-3" type="email" placeholder="Your email here">
                                <a href="#" class="btn btn-small btn-pink">Subscribe</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       <div class="container-fluid p-0">
            <footer class="homepage__footer">
                <div class="row no-gutters p-4">
                  <div class="col-12 col-md">
                    <!-- <img class="mb-2" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="24" height="24">
                    <small class="d-block mb-3 text-muted">© 2017-2019</small> -->
                  </div>
                  <div class="col-6 col-md">
                    <h5>Features</h5>
                    <ul class="list-unstyled text-small">
                      <li><a class="text-muted" href="#">Cool stuff</a></li>
                      <li><a class="text-muted" href="#">Random feature</a></li>
                      <li><a class="text-muted" href="#">Team feature</a></li>
                      <li><a class="text-muted" href="#">Stuff for developers</a></li>
                      <li><a class="text-muted" href="#">Another one</a></li>
                      <li><a class="text-muted" href="#">Last time</a></li>
                    </ul>
                  </div>
                  <div class="col-6 col-md">
                    <h5>Resources</h5>
                    <ul class="list-unstyled text-small">
                      <li><a class="text-muted" href="#">Resource</a></li>
                      <li><a class="text-muted" href="#">Resource name</a></li>
                      <li><a class="text-muted" href="#">Another resource</a></li>
                      <li><a class="text-muted" href="#">Final resource</a></li>
                    </ul>
                  </div>
                  <div class="col-6 col-md">
                    <h5>About</h5>
                    <ul class="list-unstyled text-small">
                      <li><a class="text-muted" href="#">Team</a></li>
                      <li><a class="text-muted" href="#">Locations</a></li>
                      <li><a class="text-muted" href="#">Privacy</a></li>
                      <li><a class="text-muted" href="#">Terms</a></li>
                    </ul>
                  </div>
                </div>
            </footer>
       </div>

    </div>
@endsection
