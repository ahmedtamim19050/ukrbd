<div class="swiper-slide product-wrap">
    <div class="product-hover text-center">
        <figure class="product-media">
            <a href="{{ route('product_details', $product->slug) }}">
                <img src="{{ Voyager::image($product->image) }}"  alt="Product"
                    style="height: 280px;width:280px;object-fit:contain;">
            </a>
            <div class="product-action-vertical">

                <a href="javascript:void(0)" onclick="wishlist({{ $product->id }})"
                    class="btn-product-icon btn-wishlist w-icon-heart" title="Add to wishlist"></a>
                {{-- <a href="JavaScript:void(0)" onclick="quickView({{ $product->id }})" class="btn-product-icon btn-quickview w-icon-search"
                    title="Quickview"></a> --}}
                {{-- <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                    title="Add to Compare"></a> --}}
            </div>
        </figure>
        <div class="product-details">
            <h3 class="product-name "><a href="{{ route('product_details', $product->slug) }}">{{ $product->name }}</a>
            </h3>
           
            <div class="product-price">
                <a href="{{ route('product_details', $product->slug) }}">
                    <ins class="new-price">{{ Sohoj::price($product->sale_price ?? $product->price) }}</ins>
                    @if ($product->sale_price)
                        <del class="old-price">{{ Sohoj::price($product->price) }}</del>
                    @endif
                </a>

                <form action="{{route('cart.store')}}" method="post">
                    @csrf
                    <input type="hidden" class="form-control qty" value="1" min="1" name="quantity">
                    <input type="hidden" name="product_id" value="{{ $product->id }}" />
                    
                    <button class="btn btn-primary mt-2 btn-cart cart-store add-to-cart-btn"
                       type="submit"
                        style="border-radius: 10px;overflow:hidden;font-size:1rem"> <i class="fa fa-shopping-cart"></i>
                        Add to cart</button>


                </form>
            </div>
        </div>
    </div>
</div>
