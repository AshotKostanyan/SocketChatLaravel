@extends('index')
@section('create')
<section class="px-6 py-8">
    <main class="max-w-lg mx-auto mt-10 bg-gary-100 border-gray-200 p-6 rounded-xl">
        <h1 class="text-center font-bold text-xl">Register!</h1>
        <form action="/register" method="POST" class="mt-10">
            {{ csrf_field() }}
            <div class="mb-6">
                <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="{{old('name')}}" class="border border-gray-400 p-2 w-full" required>
            </div>

            @error('name')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror





            <div class="mb-6">
                <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">Username</label>
                <input type="text" name="username" id="username" value="{{old('username')}}" class="border border-gray-400 p-2 w-full" required>
            </div>

            @error('username')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror

            <div class="mb-6">
                <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{old('email')}}" class="border border-gray-400 p-2 w-full" required>
            </div>
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror

            <div class="mb-6">
                <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">Password</label>
                <input type="password" name="password"  id="password" class="border border-gray-400 p-2 w-full"
                    required>
            </div>
            @error('password')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror

            <div class="mb-6">
                <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Submit</button>
            </div>
        </form>
        <a href="/login">login</a>
    </main>
</section>

@endsection
