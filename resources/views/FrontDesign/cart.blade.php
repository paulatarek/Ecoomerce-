@include('FrontDesign.frontlayout.navbar')



<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Cart</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="index-2.html"><i class="lni lni-home"></i> Home</a></li>
                    <li><a href="index-2.html">Shop</a></li>
                    <li>Cart</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="shopping-cart section">
    <div class="container">
        <div class="cart-list-head">
            <h4 class="text text-center text-danger">{{session()->get('errorlogin')}}</h4>
            <div class="cart-list-title">
                <div class="row">
                    <div class="col-lg-1 col-md-1 col-12">
                    </div>
                    <div class="col-lg-4 col-md-3 col-12">
                        <p>Product Name</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Quantity</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>price</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Discount</p>
                    </div>
                    <div class="col-lg-1 col-md-2 col-12">
                        <p>Remove</p>
                    </div>
                </div>
            </div>
            @if (Auth::guard()->check())
                @foreach ($data as $datas)
                    <div class="cart-single-list">
                        <div class="row align-items-center">
                            <div class="col-lg-1 col-md-1 col-12">
                                <a href="product-details.html"><img
                                        src="{{ url("dist/img/product image/$datas->image") }}" alt="#"></a>
                            </div>
                            <div class="col-lg-4 col-md-3 col-12">
                                <h5 class="product-name"><a href="product-details.html">
                                        {{ $datas->name }} </a></h5>
                                <p class="product-des">
                                    <span><em>Type:</em> Mirrorless</span>
                                    <span><em>Color:</em> Black</span>
                                </p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <div class="count-input">

                                    <select class="form-control">


                                        <option>
                                            @if (Auth::guard()->check())
                                                {{ $datas->pivot->qty }}
                                            @endif
                                        </option>


                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <p>
                                    @if (Auth::guard()->check())
                                        ${{ $datas->price }}
                                    @endif

                                </p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <p>Check Your Cupon</p>
                            </div>
                            <div class="col-lg-1 col-md-2 col-12">
                                <form method="post" action="{{route('delete_item')}}">
                                    @csrf
                                    <button item_product="{{ $datas->id }}"  class="remove-item remove_item" type="submit">
                                        <i class="lni lni-close"></i>
                                    </button>
                                </form>
                                {{-- <a class="remove-item remove_item" item_product="{{ $datas->id }}"
                                    href="#"><i class="lni lni-close"></i></a> --}}

                            </div>
                        </div>
                    </div>
                @endforeach
            @endif





        </div>
        <div class="row">
            <div class="col-12">

                <div class="total-amount">
                    <div class="row">
                        <div class="col-lg-8 col-md-6 col-12">
                            <div class="left">
                                <div class="coupon">
                                    <form action="#" target="_blank">
                                        <input name="Coupon" class="code" placeholder="Enter Your Coupon">
                                        <div class="button">
                                            <button class="btn applycupon">Apply Coupon</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="right">
                                <ul>
                                    <li>Cart Subtotal<span>
                                            @isset($datas)
                                                {{ $datas->pivot->sum('total') }}
                                            @endisset
                                        </span></li>
                                    <li>discount<span class="discount">Free</span></li>
                                    {{-- <li>You Save<span>$29.00</span></li> --}}
                                    <li id="last" class="last">You Pay<span class="lastd">
                                            @isset($datas)
                                                ${{ $datas->pivot->sum('total') }}
                                            @endisset
                                        </span></li>
                                </ul>
                                <div class="button">
                                    <a href="{{ route('checkout') }}" class="btn">Checkout</a>
                                    <a href="product-grids.html" class="btn btn-alt">Continue shopping</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


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
                                    href="https://demo.graygrids.com/cdn-cgi/l/email-protection#84f7f1f4f4ebf6f0c4f7ecebf4e3f6ede0f7aae7ebe9"><span
                                        class="__cf_email__"
                                        data-cfemail="0a797f7a7a65787e4a7962657a6d78636e7924696567">[email&#160;protected]</span></a>
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


<script>
    $(document).ready(function() {
        $(".applycupon").click(function(e) {
            e.preventDefault()
            var code = $(".code").val()


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

<script>
    $(document).ready(function() {
        $('.remove_item').click(function(e) {
            e.preventDefault()
            var item_id = $(this).attr("item_product");
            // console.log(item_id)
            $.ajax({

                url: "{{ route('delete_item') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    item_id : item_id
                },

                type: 'post',
                // dataType : 'html',

                success: function(result) {
                    toastr.success('ITEM HAS DELETE')

                }
            });

        })
    })
</script>

</body>

<!-- Mirrored from demo.graygrids.com/themes/shopgrids/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Dec 2022 23:36:00 GMT -->

</html>
