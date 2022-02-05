@extends('layouts.app')

@section('content')
    <div class="m-auto w-4/8 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                Skapa inlägg
            </h1>
        </div>
    </div>

    <div class="flex justify-center pt-20">
        <form action="/posts" method="POST">
            @csrf
            <div class="block">
                <input 
                    type="text"
                    class="form-control block w-full px-3 py-1.5 text-base italic text-gray-700 bg-white bg-clip-padding
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                            mb-10"
                    name="title"
                    placeholder="Rubrik...">

                    <textarea
                    class="form-control block w-full px-3 py-1.5 text-base italic text-gray-700 bg-white bg-clip-padding
                        border border-solid border-gray-300
                        rounded
                        transition
                        ease-in-out
                        m-0
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                        mb-10"
                        rows="3"
                        name="content"
                        placeholder="Innehåll..."
                     ></textarea>
                <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80
                uppercase font-bold">
                    Skapa
                </button>

            </div>
        </form>
    </div>
    @if ($errors->any())
    <div class="w-4/8 m-auto text-center">
        @foreach ($errors->all() as $error)
        <li class="text-red-500 list-none">
            {{ $error }}
        </li>
        @endforeach
    </div>
@endif
@endsection