<x-marchentiger>

    <div class="ec-shop-rightside col-lg-9 col-md-12">
        <div class="ec-vendor-dashboard-card space-bottom-30">
            <div class="ec-vendor-card-header">
                <h5>Bonuses </h5>


            </div>

            @if ($bonuses->count() == !0)
                <div class="ec-vendor-card-body">

                    <div class="ec-vendor-card-table">



                        <div class="col-md-12">



                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">ID</th>
                                        <th scope="col" class="text-center">Type</th>
                                        <th scope="col" class="text-center">Name</th>
                                        <th scope="col" class="text-center">Ammount</th>



                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bonuses as $key => $bonus)
                                        <tr>
                                            <td scope="row" class="text-center"> {{ $bonus->id }}</td>
                                            <td scope="row" class="text-center">
                                                {{ class_basename($bonus->bonusable_type) }}</td>
                                            <td scope="row" class="text-center"> {{ $bonus->bonusable->name }}</td>
                                            <td scope="row" class="text-center"> {{ Sohoj::price($bonus->ammount) }}
                                            </td>






                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>

                    </div>

                </div>
            @else
                <h3 class="text-center text-danger">No Bonuses create</h3>
            @endif


</x-marchentiger>
