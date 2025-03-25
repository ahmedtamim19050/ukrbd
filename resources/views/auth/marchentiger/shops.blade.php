<x-marchentiger>

    <div class="ec-shop-rightside col-lg-9 col-md-12">
        <div class="ec-vendor-dashboard-card space-bottom-30">
            <div class="ec-vendor-card-header">
                <h5>Shops </h5>


            </div>

            @if ($shops->count() == !0)
                <div class="ec-vendor-card-body">

                    <div class="ec-vendor-card-table">



                        <div class="col-md-12">



                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">ID</th>
                                        <th scope="col" class="text-center">Logo</th>
                                        <th scope="col" class="text-center">Name</th>
                                        <th scope="col" class="text-center">Phone</th>



                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($shops as $key => $shop)
                                        <tr>
                                            <td scope="row" class="text-center"> {{ $shop->id }}</td>
                                            <td scope="row" class="text-center"> <img src=" {{ Voyager::image($shop->logo) }}" height="60" alt=" {{ $shop->name }}">
                                               </td>
                                            <td scope="row" class="text-center"> {{ $shop->name }}</td>
                                            <td scope="row" class="text-center"> {{ $shop->phone }}
                                            </td>






                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>

                    </div>

                </div>
            @else
                <h3 class="text-center text-danger">No Shops create</h3>
            @endif


</x-marchentiger>
