@extends('Layouts.saiAdmin')
@section('content')

    @include('nav.saiNav')


    <div class="container mx-auto flex justify-center items-center h-screen">
        <div class="max-w-md w-full">
            <a href="{{url('/sai')}}">
                <img src="{{ asset('storage/images/intellisai.svg') }}" alt="Logo" class="mx-auto mb-8">
            </a>
            <h1 class="text-5xl font-bold mb-4 text-center">En proceso de desarrollo</h1>
            <p class="text-lg mb-8 text-gray-700 text-center">Estamos trabajando en ello y pronto tendremos la página lista</p>
        </div>
    </div>

@endsection
