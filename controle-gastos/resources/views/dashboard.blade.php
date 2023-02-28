<x-layout title="Dashboard">

    @section('body')
    <div class="container">
        <h2>Bem - vindo {{ $user->name }}</h2>
    </div>
    @endsection('body')

</x-layout>