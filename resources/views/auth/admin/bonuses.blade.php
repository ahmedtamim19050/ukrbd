@extends('voyager::master')
@section('content')
    <div class="page-content browse container-fluid mt-section">
        <h2 style="margin-bottom: 25px" style=""> <i class="icon voyager-dollar"></i> Earnings</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">


                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">ID</th>
                                    <th scope="col" class="text-center">Type</th>
                                    <th scope="col" class="text-center">Name</th>
                                    <th scope="col" class="text-center">Ammount</th>
                                    {{-- <th scope="col" class="text-center">Status</th> --}}
                                    <th scope="col" class="text-center">Action</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bounses as $key => $bonus)
                                    <tr>
                                        <td scope="row" class="text-center"> {{ $bonus->id }}</td>
                                        <td scope="row" class="text-center">{{ class_basename($bonus->bonusable_type) }}</td>
                                        <td scope="row" class="text-center"> {{ $bonus->bonusable->name }}</td>
                                        <td scope="row" class="text-center"> {{ Sohoj::price($bonus->ammount) }}</td>
                                        {{-- <td scope="row" class="text-center">
                                            @if ($bonus->status == 0)
                                            <span class="btn btn-warning btn-sm">Pending</span>
                                            @else
                                            <span class="btn btn-success btn-sm">Active</span>
                                            @endif
                                            
                                        </td> --}}
                                        <td scope="row" class="text-center"> 
                                           

                                            <form action="{{route('admin.bonus.active',$bonus)}}" method="post">
                                                @csrf
                                                <button class="btn btn-primary">Active</button>
                                            </form>

                                            <form action="{{route('admin.bonus.delete',$bonus)}}" method="post">
                                                @csrf
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                           
                                        </td>
                                     



                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
