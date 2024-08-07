<x-seller>


    <div class="ec-shop-rightside col-lg-9 col-md-12">
        <div class="ec-vendor-dashboard-card space-bottom-30">
            <div class="ec-vendor-card-header">
                <h5>Earnings</h5>


            </div>

            @if ($earnings->count() > 0)
                <div class="ec-vendor-card-body">

                    <div class="ec-vendor-card-table">



                        <table class="table ec-table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Earning</th>
                                    <th scope="col">Created at</th>
                           

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($earnings as $earning)
                            
                                    <tr>
                                        <th scope="row"><span>{{ $loop->index + 1 }}</span></th>
                                        <td><span>{{ Sohoj::price($earning->shop_earn) }}</span></td>
                                        <td><span>{{ $earning->created_at->format('d M, Y') }}</span></td>
                                       

                                    </tr>
                                @endforeach


                            </tbody>
                        </table>

                    </div>

                </div>
            @else
                <h3 class="text-center text-danger">No Items Found</h3>
            @endif
        </div>
    </div>

</x-seller>
