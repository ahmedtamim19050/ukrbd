<div class="swiper-slide product-wrap">
    <div class="product text-center">
        <figure class="product-media">
            <a href="{{ $product->path() }}">
                <img src="{{ Voyager::image($product->image) }}" alt="Product" width="300" height="338">
                <img src="{{ Voyager::image($product->image) }}" alt="Product" width="300" height="338">
            </a>
            <div class="product-action-vertical">
                <form class="addToCartForm_{{ $product->id }}">
                    @csrf
                    <input type="hidden" class="form-control qty" value="1" min="1" name="quantity">
                    <input type="hidden" name="product_id" value="{{ $product->id }}" />
                    <button type="submit" class="btn-product-icon btn-cart w-icon-cart cart-store"
                        style="cursor: pointer" data-product-id="{{ $product->id }}" title="Add to cart"></button>
                </form>
                <a href="javascript:void(0)" onclick="wishlist({{ $product->id }})"
                    class="btn-product-icon btn-wishlist w-icon-heart" title="Add to wishlist"></a>
                {{-- <a href="JavaScript:void(0)" onclick="quickView({{ $product->id }})" class="btn-product-icon btn-quickview w-icon-search"
                    title="Quickview"></a> --}}
                {{-- <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                    title="Add to Compare"></a> --}}
            </div>
        </figure>
        <div class="product-details">
            <h4 class="product-name"><a href="{{ $product->path() }}">{{ $product->name }}</a>
            </h4>
            {{-- <div class="ratings-container">
                <div class="ratings-full">
                    <span class="ratings" style="width: 80%;"></span>
                    <span class="tooltiptext tooltip-top"></span>
                </div>
                <a href="product-default.html" class="rating-reviews">(1 Reviews)</a>
            </div> --}}

            <div class="">
                <input value="{{ Sohoj::average_rating($product->ratings) }}" class="rating published_rating"
                    data-size="sm">
            </div>
            <div class="product-price">
                <ins class="new-price">{{ Sohoj::price($product->price) }}</ins>
                @if ($product->sale_price)
                    <del class="old-price">{{ Sohoj::price($product->sale_price) }}</del>
                @endif
            </div>
        </div>
    </div>
</div>
