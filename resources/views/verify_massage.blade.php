<x-app>
    <x-slot name="css">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.min.css') }}">
    </x-slot>
    <h3 class="text-center my-5 py-5" style="margin: 50px 0">
        Thank you for registering!
        Please confirm your email! <br>
        <a href="{{route('again.verify.token')}}" class="btn btn-dark me-auto mt-4">Resend email</a>
    </h3>
</x-app>

