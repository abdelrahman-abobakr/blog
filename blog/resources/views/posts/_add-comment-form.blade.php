@auth
    <x-panel>

        <form  method="post" action="/posts/{{$post -> slug}}/comments">
            @csrf
            <header class="flex items-center">
                <img src="https://i.pravatar.cc/40?u={{ auth() ->id()}}" alt="" width="40" height="40" class="rounded-full">
                <h2 class="ml-3">want to participate?</h2>
            </header>

            <x-form.textarea name="body"></x-form.textarea>
            
            <div class="flex justify-end mt-5 border-t pt-3 border-gray-200">
                <x-form.button>Post</x-form.button>
            </div>
        </form>
    </x-panel>
@else
    <div>
        <a href="/register" class=" hover:underline" style="color:cornflowerblue">Register</a> or <a href="/login" style="color:cornflowerblue" class="hover:underline">Log In</a> to leave a comment

    </div>
@endauth
