@extends('layouts.app')

@section('content')
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                Dagbok
            </h1>
        </div>

        @if (Auth::user())
            <div class="pt-10">
                <a 
                    href="posts/create"
                    class="border-b-2 pb-2 border-dotted italic text-gray-500">
                    Lägg till ett nytt inlägg &rarr;
                </a>
            </div>
            @else
            <p class="py-12 italic">
                Logga in för att skriva i din dagbok.
            </p>
        @endif


        <div class="w-5/6 py-10">
            @foreach ($posts as $post)
            @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
            <div class="m-auto">
               
               <div class="float-right">
                   <a  
                       class="border-b-2 pb-2 border-dotted italic text-green-500"
                       href="posts/{{ $post->id }}/edit">
                       Redigera &rarr;
                   </a>

                   <form action="/posts/{{ $post->id }}" class="pt-3" method="POST">
                       @csrf
                       @method('delete')
                       <button
                       type="submit"
                       class="border-b-2 pb-2 border-dotted italic text-red-500"
                       >
                       Radera inlägg &rarr;
                       </button>
                   </form>
               </div>
               <span class="upppercase text-blue-500 font-bold text-xs intalic">
                   Datum: {{$post->timestamp}}
               </span>

               <h2 class="text-gray-700 text-3xl"> 
                   {{$post->title}}
               </h2>

               <p class="text-lg text-gray-700 py-6">
                   {{$post->content}}
               </p>

               <hr class="mt-4 mb-8">
           </div>
            @endif
            
            @endforeach
        </div>
    </div>

@endsection