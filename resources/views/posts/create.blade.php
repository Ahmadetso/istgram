<x-app-layout> 
    

        <div class="card p-10">
    {{--        Title --}}
            <h1 class="text-3xl mb-10 ">{{ __('Create a new post') }}</h1>
{{--errors--}}
            <div class="flex flex-col justify-center w-full">
                @if ($errors->any())

                <div class="w-full bg-red-50 text-red-700 p-5 mb-5 rounded-xl">

                    <ul class="list-disc pl-4">

                        @foreach ($errors->all() as $error)

                        <li>{{$error}}</li>

                        @endforeach

                    </ul>

                </div>          
                
                @endif
            </div>
            {{--form--}}


            <form action="/p/create" method="post" class="w-full" enctype="multipart/form-data">
                @csrf

                  <input type="file"
                     class="w-full border border-gray-200 bg-gray-50 block focus:outline-none rounded-xl"
                   name="image" id="file-input">

                 <p class="mt-2 text-sm text-gray-500 dark:text-gray-300" id="file-input-help">png gpj or gif</p>



                 <textarea name="description"  rows="3" class="mt-10 w-full border border-gray-200 rounded-xl"
                 placeholder="{{__('write a description')}}">    </textarea>


            
                 <x-primary-button class="mt-4">{{__('create post')}}</x-primary-button>
            
            </form>




        </div>=
        {{----}}
       

</x-app-layout>