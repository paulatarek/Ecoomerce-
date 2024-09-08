@include('FrontDesign.frontlayout.navbar')



<div class="breadcrumbs">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">Shop Grid</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="{{route('home')}}"><i class="lni lni-home"></i> Home</a></li>
                    <li><a href="javascript:void(0)">Shop</a></li>
                    <li>Shop Grid</li>
                </ul>
            </div>
        </div>
    </div>
</div>


<section class="product-grids section">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 col-12">
                \
                <div class="product-sidebar">
                    <form action="" method="get">

                        <div class="single-widget search">
                            <h3>Search Product</h3>
                            <input class="form form-control" name="title" type="text" placeholder="Search Here...">
                            {{-- <button type="submit"><i class="lni lni-search-alt"></i></button> --}}

                        </div>



                        <div class="single-widget range">
                       <input class="form form-control" type="number" placeholder="Price" name="price" >
                        </div>



                        <div class="single-widget condition">
                            <h3>Filter by Brands</h3>
                            @foreach ($brand as $brands)
                                <div class="form-check">
                                    <input class="form-check-input" name="brand[]" type="checkbox"
                                        value="{{ $brands->id }}" id="flexCheckDefault1">
                                    <label class="form-check-label" for="flexCheckDefault1">
                                        {{ $brands->name }}
                                    </label>
                                </div>
                            @endforeach


                        </div>

                        <button type="submit" class="btn btn-primary"> Aplly</button>
                    </form>
                </div>

            </div>
            <div class="col-lg-9 col-12">
                <div class="product-grids-head">
                    <div class="product-grid-topbar">
                        <div class="row align-items-center">
                            <div class="col-lg-7 col-md-8 col-12">

                            </div>
                            <div class="col-lg-5 col-md-4 col-12">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-grid" type="button" role="tab"
                                            aria-controls="nav-grid" aria-selected="true"><i
                                                class="lni lni-grid-alt"></i></button>
                                        <button class="nav-link" id="nav-list-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-list" type="button" role="tab"
                                            aria-controls="nav-list" aria-selected="false"><i
                                                class="lni lni-list"></i></button>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-grid" role="tabpanel"
                            aria-labelledby="nav-grid-tab">
                            <div class="row">
                                @foreach ($product as $products)
                                    <div class="col-lg-4 col-md-6 col-12">

                                        <div class="single-product">
                                            <div class="product-image">
                                                <img src="{{ url("dist/img/product image/$products->image") }}"
                                                    alt="#">
                                                <div class="button">
                                                    <a  id_product="{{$products->id}}"  href="product-details.html" class="btn  add_product"><i
                                                        class="lni lni-cart"></i> Add to Cart</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <span class="category">{{ $products->name }}</span>
                                                <h4 class="title">
                                                    <a href="">{{ $products->name }}</a>
                                                </h4>

                                                <div class="price">
                                                    <span>${{ $products->price }}</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach









                            </div>

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
                                    href="https://demo.graygrids.com/cdn-cgi/l/email-protection#1d6e686d6d726f695d6e75726d7a6f74796e337e7270"><span
                                        class="__cf_email__"
                                        data-cfemail="ee9d9b9e9e819c9aae9d86819e899c878a9dc08d8183">[email&#160;protected]</span></a>
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

<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ url('assets/js/tiny-slider.js') }}"></script>
<script src="{{ url('assets/js/glightbox.min.js') }}"></script>
<script src="{{ url('assets/js/main.js') }}"></script>
<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

<script>
    $(document).ready(function(){
    $('.add_product').click(function(e){
        e.preventDefault()
       var id_product =  $(this).attr('id_product')
       console.log(id_product)


       $.ajaxSetup({
     headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
   });

       $.ajax({

           url : "{{ route('addtocart') }}",
           data : {
               _token : "{{csrf_token()}}",
               id_product : id_product
           },

           type : 'POST',
           // dataType : 'html',

           success : function(result){
            if(result)
            {
                toastr.warning(result)
            }
            elseif(result == "The product has been added or its number has been increased. Please check your card")
            {
                toastr.success('The product has been added or its number has been increased. Please check your card')
            }
            elseif(result == "The number of products has increased. Please check your card")
            {
                toastr.success('The number of products has increased. Please check your card')
            }

           }
       });



   })
    })
   </script>

<!-- Mirrored from demo.graygrids.com/themes/shopgrids/product-grids.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Dec 2022 23:36:05 GMT -->

</html>
