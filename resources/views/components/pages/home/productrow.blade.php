<div class="title-link-wrapper title-deals appear-animate mb-4 d-none  d-md-block">
    <h2 class="title title-link">{{ $title }}</h2>
    <div class="product-countdown-container font-size-sm text-white  align-items-center mr-auto">
        {{-- <label>Offer Ends in: </label>
        <div class="product-countdown countdown-compact ml-1 font-weight-bold" data-until="+10d"
            data-relative="true" data-compact="true">10days,00:00:00</div> --}}
    </div>
    <a href="{{ $url }}" class="ml-0">More Products<i class="w-icon-long-arrow-right"></i></a>
</div>
<div class=" row cols-lg-5 cols-md-4 cols-sm-3 cols-2">

    @foreach ($products as $product)
        <x-products.card :product="$product" />
    @endforeach
    <!-- End of Product Wrap -->
</div>
