@extends('layouts.app')

@section('content')
    <div class="m-auto w-4/8 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                Uppdatera inlägg
            </h1>
        </div>
    </div>

    <div class="flex justify-center pt-20">
        <form action="/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')
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
                        value="{{ $post->title }}">

                    <textarea
                    type="text"
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
                        value="{{ $post->content }}"
                    ></textarea>
                <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80
                uppercase font-bold">
                    Uppdatera
                </button>

            </div>
        </form>
    </div>
@endsection