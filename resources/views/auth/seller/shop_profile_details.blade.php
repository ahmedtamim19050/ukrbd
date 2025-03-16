<x-seller>

    <div class="ec-shop-rightside col-lg-9 col-md-12" style="position: relative;">
        <div class="ec-vendor-dashboard-card ec-vendor-profile-card">
            @if (auth()->user()->shop)
                @if (auth()->user()->shop->status == 0)
                    <div class="card-header text-center">
                        <span style="color: red">Your shop is pending approval. We'll notify you once it's
                            approved.</span>
                    </div>
                @endif
            @endif
            <div class="ec-vendor-card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ec-vendor-block-profile">
                            <div class="vendor-block-bg"></div>
                            <div class="ec-vendor-block-img space-bottom-30" style="background-color: snow;">
                                <div class="ec-vendor-block-b"></div>
                                <div class="ec-vendor-block-detail">
                                    <div style="position: relative;">
                                        <img class="v-img img-fluid"
                                            src="{{ auth()->user()->shop && auth()->user()->shop->logo ? Voyager::image(auth()->user()->shop->logo) : asset('seller-assets/images/2.jpg') }}"
                                            alt="E-shop image">
                                    </div>
                                    <h5>{{ auth()->user()->name }}</h5>
                                    <p>( {{ auth()->user()->shop ? auth()->user()->shop->name : 'No shop created yet' }}
                                        )</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Shop Details Section -->
                <div class="container">
                    <div class="card mb-4">
                        <div class="card-header bg-transparent">
                            <h5 class="my-3">General Information</h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Shop Name:</strong> {{ auth()->user()->shop->name ?? 'N/A' }}</p>
                            <p><strong>Company Name:</strong> {{ auth()->user()->shop->company_name ?? 'N/A' }}</p>
                            <p><strong>Shop Registration:</strong>
                                {{ auth()->user()->shop->company_registration ?? 'N/A' }}</p>
                            <p><strong>Short Description:</strong>
                                {{ auth()->user()->shop->short_description ?? 'N/A' }}</p>
                            <p><strong>About Shop:</strong> {{ auth()->user()->shop->description ?? 'N/A' }}</p>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header bg-transparent">
                            <h5 class="my-3">Contact Information</h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                            <p><strong>Phone Number:</strong> {{ auth()->user()->shop->phone ?? 'N/A' }}</p>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header bg-transparent">
                            <h5 class="my-3">Address Information</h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Division:</strong> {{ auth()->user()->shop->division ?? 'N/A' }}</p>
                            <p><strong>District:</strong> {{ auth()->user()->shop->district ?? 'N/A' }}</p>
                            <p><strong>Upazila:</strong> {{ auth()->user()->shop->upazila ?? 'N/A' }}</p>
                            <p><strong>Street Address:</strong> {{ auth()->user()->shop->address ?? 'N/A' }}</p>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header bg-transparent">
                            <h5 class="my-3">Courier Information</h5>
                        </div>
                     
                        <div class="card-body">
                            <p><strong>Name :</strong>
                                {{ isset(auth()->user()->shop->pickup_address) ? auth()->user()->shop->pickup_address->contact_name ?? 'N/A' : 'N/A' }}
                            </p>
                            <p><strong>Number :</strong>
                                {{ isset(auth()->user()->shop->pickup_address) ? auth()->user()->shop->pickup_address->contact_number ?? 'N/A' : 'N/A' }}
                            </p>
                            <p><strong>Address :</strong>
                                {{ isset(auth()->user()->shop->pickup_address) ? auth()->user()->shop->pickup_address->address ?? 'N/A' : 'N/A' }}
                            </p>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header bg-transparent">
                            <h5 class="my-3">Social Links</h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Facebook:</strong> {{ auth()->user()->shop->facebook ?? 'N/A' }}</p>
                            <p><strong>Instagram:</strong> {{ auth()->user()->shop->instagram ?? 'N/A' }}</p>
                            <p><strong>Twitter:</strong> {{ auth()->user()->shop->twitter ?? 'N/A' }}</p>
                        </div>
                    </div>

                    <div class="text-center">
                        <a href="{{ route('vendor.shop') }}" class="btn btn-primary">Edit Shop Information</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-seller>
