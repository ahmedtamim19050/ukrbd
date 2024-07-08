<div class="ec-sidebar-wrap ec-border-box">
    <!-- Sidebar Category Block -->
    <div class="ec-sidebar-block">
        <div class="ec-vendor-block " style="position:relative">
            @if (auth()->user()->shop)
                <div class="vendor-block-bg"></div>
                <a href="javascript:void(0)" class="shadow-lg"
                    style="position: absolute; top:-11px; right:-11px; background-color: #fff; border-radius:50%;padding:10px 0"
                    data-bs-toggle="modal" data-bs-target="#coverModal"><span class="mx-3">
                        <i class="fas fa-edit"></i></span></a>
            @else
                <img src="{{ asset('assets/img/1.jpg') }}" alt=""
                    style="height: 190px;
                                width: 100%;
                                object-fit: cover;">
            @endif

            <div class="ec-vendor-block-detail" style="background-color: snow; position:relative">
                @if (auth()->user()->shop)
                    <div style="position: relative;">
                        <img class="v-img img-fluid"
                            src="{{ auth()->user()->shop && auth()->user()->shop->logo ? Voyager::image(auth()->user()->shop->logo) : asset('seller-assets/images/2.jpg') }}"
                            alt="vendor image">
                        <a href="javascript:void(0)" class="shadow-lg"
                            style="position: absolute; top:-70px; right:9px; background-color: #fff; border-radius:50%;padding:10px 0"
                            data-bs-toggle="modal" data-bs-target="#logoModal"><span class="mx-3"><i
                                    class="fas fa-edit"></i></span></a>
                    </div>
                    <!-- <a href="javascript::void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal"></a>><i class="fi-rr-edit"></i></a> -->
                @else
                    <div style="position: relative;">
                        <img class="v-img" src="{{ asset('assets/img/heaer.jpg') }}" style="object-fit: cover;"
                            alt="vendor image">
                        <a href="javascript:void(0)" class="shadow-lg"
                            style="position: absolute; top:-70px; right:9px; background-color: #fff; border-radius:50%;padding:10px 0"
                            data-bs-toggle="modal" data-bs-target="#logoModal"><span class="mx-3"><i
                                    class="fas fa-edit"></i></span></a>
                    </div>
                @endif
                <h5>{{ auth()->user()->name }}</h5>
                <p>( {{ auth()->user()->shop ? auth()->user()->shop->name : 'no shop has been created' }} )</p>
            </div>
            <div class="ec-vendor-block-items">
                <ul>
                    <li><a href="{{ route('homepage') }}">Home</a></li>
                    <li><a href="{{ route('marchentiger.dashboard') }}">Dashboard</a></li>

                   

                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
