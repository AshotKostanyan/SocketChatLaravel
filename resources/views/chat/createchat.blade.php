@exteds('index')
$@section('create')
    <main class="max-w-lg mx-auto mt-10 bg-gary-100 border-gray-200 p-6 rounded-xl">
        <h1 class="text-center font-bold text-xl">Register!</h1>
        <form action="/register" method="POST" class="mt-10">
            {{ csrf_field() }}
            <div class="mb-6">
                <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">Chat name</label>
                <input type="text" name="chat_name" id="name" class="border border-gray-400 p-2 w-full" required>
            </div>

            @error('name')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror

            <div class="mb-6">
                <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Submit</button>
            </div>
        </form>
        <a href="/">home</a>
    </main>
@endsection
