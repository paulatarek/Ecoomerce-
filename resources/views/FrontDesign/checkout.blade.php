@extends('FrontDesign.frontlayout.navbar')


<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">checkout</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="index-2.html"><i class="lni lni-home"></i> Home</a></li>
                    <li><a href="index-2.html">Shop</a></li>
                    <li>checkout</li>
                </ul>
            </div>
        </div>
    </div>
</div>


<section class="checkout-wrapper section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <form action="{{ route('checkout.create') }}" method="post">
                    @csrf
                    <div class="checkout-steps-form-style-1">
                        <ul id="accordionExample">
                            <li>
                                <h6 class="title" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                    aria-expanded="true" aria-controls="collapseThree">Your Personal Details </h6>
                                <section class="checkout-steps-form-content collapse show" id="collapseThree"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label>User Name</label>
                                                <div class="row">
                                                    <div class="col-md-6 form-input form">
                                                        <input type="text" name="first_name"
                                                            placeholder="First Name">
                                                        @error('first_name')
                                                            <div class="text text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6 form-input form">
                                                        <input type="text" name="last_name"
                                                            placeholder="Last Name">
                                                        @error('last_name')
                                                            <div class="text text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Email Address</label>
                                                <div class="form-input form">
                                                    <input type="email" name="email"
                                                        placeholder="Email Address">
                                                    @error('email')
                                                        <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Phone Number</label>
                                                <div class="form-input form">
                                                    <input type="number" name="phone_number"
                                                        placeholder="Phone Number">
                                                    @error('phone_number')
                                                        <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label>Mailing Address</label>
                                                <div class="form-input form">
                                                    <input type="text" name="street_address"
                                                        placeholder="Mailing Address">
                                                    @error('street_address')
                                                        <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>City</label>
                                                <div class="form-input form">
                                                    <input type="text" name="city"
                                                        placeholder="city">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">

                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Region/State</label>
                                                <div class="select-items">
                                                    <select name="state" class="form-control">
                                                        <option value="0">Cairo</option>
                                                        <option value="1">Alexandria</option>
                                                        <option value="2">Gizeh</option>
                                                        <option value="3">Port Said</option>
                                                        <option value="4">Suez</option>
                                                        <option value="5">Mansura</option>
                                                    </select>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="button">
                                            <button class="btn m-2">Send</button>
                                        </div>


                                    </div>
                                </section>
                            </li>


                        </ul>
                    </div>
                </form>
            </div>
            <div class="col-lg-4">
                <div class="checkout-sidebar">
                    <div class="checkout-sidebar-coupon">
                        <p>Appy Coupon to get discount!</p>
                        <form action="#">
                            <div class="single-form form-default">
                                <div class="form-input form">
                                    <input id="cupon" type="text" placeholder="Coupon Code">
                                </div>
                                <div class="button">
                                    <button  class="btn applycupon">apply</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- @foreach ($datacart as $datacarts)
                        {{dd($datacarts->pivot->qty )}}
                        @endforeach --}}
                    <div class="checkout-sidebar-price-table mt-30">
                        <h5 class="title">Pricing Table</h5>
                        <div class="sub-total-price">
                            <div class="total-price">
                                <p class="value">Subotal Price:</p>
                                <p class="price">
                                    @if (Auth::guard()->check())
                                    @foreach ($datacart as $datacarts)
                                    {{ $datacarts->pivot->qty * $sumprice }}
                                @endforeach
                                    @endif

                                </p>
                            </div>


                        </div>
                        <div class="total-payable">
                            <div class="payable-price">
                                <p class="value">Subotal Price:</p>
                                <p class="price">   @if (Auth::guard()->check())
                                    @foreach ($datacart as $datacarts)
                                    {{ $datacarts->pivot->qty * $sumprice }}
                                @endforeach
                                    @endif</p>
                            </div>
                        </div>

                    </div>


                    <div class="checkout-sidebar-banner mt-30">
                        <a href="{{route('shopgride')}}">
                            <img src="{{ url('assets/images/banner/banner.jpg') }}" alt="#">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<footer class="footer">

    <div class="footer-top">
        <div class="container">
            <div class="inner-content">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="footer-logo">
                            <a href="index-2.html">
                                <img src="{{ url('assets/images/logo/white-logo.svg') }}" alt="#">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-12">
                        <div class="footer-newsletter">
                            <h4 class="title">
                                Subscribe to our Newsletter
                                <span>Get all the latest information, Sales and Offers.</span>
                            </h4>
                            <div class="newsletter-form-head">
                                <form action="#" method="get" target="_blank" class="newsletter-form">
                                    <input name="EMAIL" placeholder="Email address here..." type="email">
                                    <div class="button">
                                        <button class="btn">Subscribe<span class="dir-part"></span></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="footer-middle">
        <div class="container">
            <div class="bottom-inner">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">

                        <div class="single-footer f-contact">
                            <h3>Get In Touch With Us</h3>
                            <p class="phone">Phone: +1 (900) 33 169 7720</p>
                            <ul>
                                <li><span>Monday-Friday: </span> 9.00 am - 8.00 pm</li>
                                <li><span>Saturday: </span> 10.00 am - 6.00 pm</li>
                            </ul>
                            <p class="mail">
                                <a
                                    href="https://demo.graygrids.com/cdn-cgi/l/email-protection#295a5c5959465b5d695a4146594e5b404d5a074a4644"><span
                                        class="__cf_email__"
                                        data-cfemail="44373134342b363004372c2b3423362d20376a272b29">[email&#160;protected]</span></a>
                            </p>
                        </div>

                    </div>
                    <div class="col-lg-3 col-md-6 col-12">

                        <div class="single-footer our-app">
                            <h3>Our Mobile App</h3>
                            <ul class="app-btn">
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="lni lni-apple"></i>
                                        <span class="small-title">Download on the</span>
                                        <span class="big-title">App Store</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="lni lni-play-store"></i>
                                        <span class="small-title">Download on the</span>
                                        <span class="big-title">Google Play</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="col-lg-3 col-md-6 col-12">

                        <div class="single-footer f-link">
                            <h3>Information</h3>
                            <ul>
                                <li><a href="javascript:void(0)">About Us</a></li>
                                <li><a href="javascript:void(0)">Contact Us</a></li>
                                <li><a href="javascript:void(0)">Downloads</a></li>
                                <li><a href="javascript:void(0)">Sitemap</a></li>
                                <li><a href="javascript:void(0)">FAQs Page</a></li>
                            </ul>
                        </div>

                    </div>
                    <div class="col-lg-3 col-md-6 col-12">

                        <div class="single-footer f-link">
                            <h3>Shop Departments</h3>
                            <ul>
                                <li><a href="javascript:void(0)">Computers & Accessories</a></li>
                                <li><a href="javascript:void(0)">Smartphones & Tablets</a></li>
                                <li><a href="javascript:void(0)">TV, Video & Audio</a></li>
                                <li><a href="javascript:void(0)">Cameras, Photo & Video</a></li>
                                <li><a href="javascript:void(0)">Headphones</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="footer-bottom">
        <div class="container">
            <div class="inner-content">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-12">
                        <div class="payment-gateway">
                            <span>We Accept:</span>
                            <img src="{{ url('assets/images/footer/credit-cards-footer.png') }}" alt="#">
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="copyright">
                            <p>Designed and Developed by<a href="https://graygrids.com/" rel="nofollow"
                                    target="_blank">GrayGrids</a></p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <ul class="socila">
                            <li>
                                <span>Follow Us On:</span>
                            </li>
                            <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-instagram"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-google"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</footer>


<a href="#" class="scroll-top">
    <i class="lni lni-chevron-up"></i>
</a>

<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js')}}"></script>
<script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ url('assets/js/tiny-slider.js') }}"></script>
<script src="{{ url('assets/js/glightbox.min.js') }}"></script>
<script src="{{ url('assets/js/main.js') }}"></script>
<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

<script>
    $(document).ready(function() {
        $(".applycupon").click(function(e) {
            e.preventDefault()
            var code = $("#cupon").val()


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }

            });

            $.ajax({

                url: "{{ route('cupon.code') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    code: code
                },

                type: 'POST',
                // dataType : 'html',

                success: function(result) {
                   if(result)
                   {
                       toastr.warning(result)
                       $('#last').html("Aftetr Discout" +"="+result)

                   }
                    // $('.lastd').html(result)


                }
            });
        });



    })
</script>


<!-- Mirrored from demo.graygrids.com/themes/shopgrids/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Dec 2022 23:36:05 GMT -->

</html>
