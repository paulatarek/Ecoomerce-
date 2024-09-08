<div class="cart-items">
    <a href="javascript:void(0)" class="main-btn">
        <i class="lni lni-cart"></i>
        {{-- <span class="total-items">{{$count}}</span> --}}
    </a>

    <div class="shopping-item">
        <div class="dropdown-cart-header">
            {{-- <span>{{$count}}</span> --}}
            <a href="{{route('showcart')}}">View Cart</a>
        </div>
        <ul class="shopping-list">
            @if (Auth::guard()->check())
              @forelse ($data as $datas )
            <li>
                <a href="javascript:void(0)" class="remove"
                    title="Remove this item"><i class="lni lni-close"></i></a>
                <div class="cart-img-head">
                    <a class="cart-img" href="product-details.html"><img
                            src="{{ url("dist/img/product image/$datas->image") }}"
                            alt="#"></a>
                </div>
                <div class="content">
                    <h4><a href="product-details.html">
                            Apple Watch Series 6</a></h4>
                    {{-- <p class="quantity"> {{$datas->pivot->qty}} * <span class="amount">{{$sum}}</span></p> --}}
                </div>
            </li>
            @empty

            @endforelse
            @endif



        </ul>
        <div class="bottom">
            <div class="total">
                <span>Total</span>
                <span class="total-amount">{{$datas->pivot->qty * $sum}}$</span>
            </div>
            <div class="button">
                <a href="checkout.html" class="btn animate">Checkout</a>
            </div>
        </div>
    </div>

</div>

