<x-app-layout>
    <div class="flex flex-row max-w-3xl gap-8 mx-auto">
        {{-- left side --}}
        <div class="w-[30rem] mx-auto lg:w-[95rem]">
            @forelse ($posts as $post)
                <x-post :post='$post' />
            @empty
                <div class="max-w-xl gap-8 mx-auto">
                    {{ __('follow your friends and enjoy') }}
                </div>
            @endforelse


        </div>
        {{-- right side --}}
        <div class="hidden w-[60rem] lg:flex lg:flex-col pt-4">
            <div class="flex flex-row text-sm">
                <div class="ltr:mr-5 rtl:ml-5">
                    <a href="/{{ auth()->user()->username }}">
                        <img src="{{ auth()->user()->image }}" alt=""
                            class="border border-gray-300 rounded-full h-12 w-12 object-cover">
                    </a>
                </div>
                <div class="flex flex-col">
                    <a href="/{{ auth()->user()->username }}" class="font-bold">
                        {{ auth()->user()->username }}
                    </a>
                    <div class="text-gray-500 text-sm">{{ auth()->user()->name }}</div>
                </div>
            </div>


            {{-- Suggested Users --}}
            <div class="mt-5">
                <h3 class="text-gray-500 font-bold">{{ __('Suggestions For You') }}</h3>
                <ul>
                    @foreach ($sug_users as $sug_user)
                        <li class="flex flex-row my-5 text-sm justify-items-center items-center">
                            <div class="ltr:mr- rtl:ml-5">
                                <a href="/{{ $sug_user->username }}"></a>
                                <img src="{{ $sug_user->image }}" class="rounded-full h-9 w-9 border border-gray-300">
                            </div>
                            <div class="flex flex-col grow pl-3">
                                <a href="/{{ $sug_user->username }}" class="font-bold ">
                                    {{ $sug_user->username }}
                                    <div class="text-gray-500 text-sm">{{ $sug_user->name }}</div>

                    @endforeach
            </div>
                        </li>





            </ul>
        </div>
    </div>
</x-app-layout>
