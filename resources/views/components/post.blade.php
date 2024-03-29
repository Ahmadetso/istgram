<div class="card">
    <div class="card-header">
        <img src="{{ $post->owner->image }}" class="m-9 h-10 mr-3 rounded-full=">
        <a href="/{{ $post->owner->username }}" class="font-bold">{{ $post->owner->username }}</a>
    </div>
    <div class="card-body">
        <div class="max-h-[35rem] overflow-hidden">
            <img class="h-auto w-full object-cover" src="{{ asset('/storage/' . $post->image) }}" alt="">
        </div>
        @if ($post->liked(auth()->user()))
            <a href="/p/{{ $post->slug }}/like">
            <i class="bx bx-heart text-red-600 text-3xl hover:text-gray-400 cursor-pointer ltr:mr-3 rtl:ml-3"></i>
        </a>
        @else
        <a href="/p/{{ $post->slug }}/like">
            <i class="bx bx-heart text-3xl hover:text-gray-400 cursor-pointer ltr:mr-3 rtl:ml-3"></i>
        </a>
        @endif


        @if ($post->comments->count() > 0)
            <a href="/p/{{ $post->slug }}"
                class="p-3 font-bold text-sm text-gray-500">{{ __('View all') . ' ' . $post->comments()->count() . ' ' . __('comments') }}</a>
        @endif

        <div class="p-3 text-gray-400 uppercase text-xs">
            {{ $post->created_at->diffForHumans() }}
        </div>

        <div class="p-3">
            <a href="/{{ $post->owner->username }}" class="font-bold ltr:mr-1 rtl:ml-1">{{ $post->owner->username }}</a>
            {{ $post->description }}
        </div>

    </div>
    <div class="card-footer">
        <form action="/p/{{ $post->slug }}/comment" method="POST">
            @csrf
            <div class="flex flex-row">
                <textarea name="body" placeholder="{{ __('Add a comment...') }}" autocomplete="off" autocorrect="off"
                    class="grow border-none resize-none focus:ring-0 outline-0 bg-none max-h-60 h-5 p-0 overflow-y-hidden placeholder-gray-400"></textarea>
                <button type="submit" class="bg-white border-none text-blue-500 ml-5">{{ __('Post') }}</button>
            </div>
        </form>
    </div>
</div>
