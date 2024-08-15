@extends("layout")
@section('title')
{{ $pos->titleart }}
@endsection
@section('content')
{{-- {!!'<h1>test</h1>'!!}  --}}

{{-- @if($pos->titleart!=NULL)
@endif --}}



<div id="showbo " style="display: block">
<div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16 relative ">

  <h1 class=" underline underline-offset-4 font-medium text-center my-2" name="post_id">{{$pos->id}} </h1>
  <div class=" bg-cover bg-center text-center overflow-hidden">
    {{-- <video src="{{url('book/1722181714.mp4')}}" controls ></video> --}}
   @auth


   @if((Auth::user()->usertype=='admin2')or(Auth::user()->usertype=='admin'))
    <div class="flex">
        <form class=""  method="POST" action="{{route('posts.destroy',$pos->id)}}">
            @csrf
            @method('DELETE')
            <button  type="submit" class="text-purple-700 hover:text-white border border-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-purple-400 dark:text-purple-400 dark:hover:text-white dark:hover:bg-purple-500 dark:focus:ring-purple-900">حذف</button>
          </form>

        <a href="{{route('posts.edit',$pos->id)}}" class=" w-20 text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900">تعديل</a>
        </div>
    @endif
        @endauth
    @if($pos->imgart!=NULL)
    <img class=" mx-auto  place-content-center " style="min-height: 450px; "  width="800px" src="{{url('book/'.$pos->imgart.'')}}">
 @endif

  </div>
  <div class="max-w-3xl mx-auto ">
    <div
        class="mt-3 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-0 flex flex-col justify-between leading-normal">
        <div class="bg-white relative top-0 -mt-32 p-5 sm:p-10">
            <h1 href="#" class="text-gray-900 font-bold text-3xl mb-2"> {{$pos->titleart}}</h1>

            <p class="text-base leading-8 my-5">
                {{$pos->body}}
            </p>
@if ($pos->books!=NULL)
<a href="{{url('book/'.$pos->books.'')}}" class="text-gray-900 mx-1 transition ease-in-out delay-150
    hover:-translate-y-1 hover:scale-110  duration-300  bg-gray-200
     hover:bg-gray-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center
      dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">تنزيل
      <svg class=" inline w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 15v2a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-2m-8 1V4m0 12-4-4m4 4 4-4"/>
  </svg></a>


@endif
             @if($pos->fileVid!=NULL)



            <p class="text-base leading-8 my-5">
              <video src="{{url('book/'.$pos->fileVid.'')}}" controls ></video>

            </p>
            @endif
            @if($pos->link_video!=NULL)
                <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$pos->link_video}}?si=eGefC7oFRFyf3bYx" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>



            @endif
            @if($pos->fileAud!=NULL)

            <audio class=" md:w-[500px] w-72 my-5" controls>
                <source  src="{{url('book/'.$pos->fileAud.'')}}"type="audio/mp3">
              Your browser does not support the audio element.
              </audio>

            <a href="{{url('book/'.$pos->fileAud.'')}}" class=" mt-5block w-32 text-gray-900 mx-1 transition ease-in-out delay-150
                hover:-translate-y-1 hover:scale-110  duration-300  bg-gray-200
                 hover:bg-gray-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center
                  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">تنزيل
                  <svg class=" inline w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 15v2a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-2m-8 1V4m0 12-4-4m4 4 4-4"/>
              </svg></a>
            ​​<script type="module" src="https://cdn.jsdelivr.net/npm/media-chrome@3/+esm"></script>


            @endif
@if(($pos->noteart ||$pos->linknote))

<span>  {{$pos->noteart}}</span>
<a href="{{$pos->linknote}}"
    class="text-xs text-indigo-600 font-medium hover:text-gray-900 transition duration-500 ease-in-out">
    < الرابط >
</a>
@endif


</div>
        <div class=" sm:flex   p-2  ">
            <div class=" inline-flex   shadow-sm sm:ml-5  bg-white rounded-full border border-gray-200 " role="group">
             <form method="POST" action="{{route('store.show',$pos->id)}}" id="form1">
                @csrf  {{--,$pos->id --}}
                @auth

                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                @endauth

                <button   type="submit" class="py-2.5  px-2 sm:px-6   text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full  border-gray-200  hover:bg-gray-100 hover: hover:rounded-l-lg focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">

                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11c.889-.086 1.416-.543 2.156-1.057a22.323 22.323 0 0 0 3.958-5.084 1.6 1.6 0 0 1 .582-.628 1.549 1.549 0 0 1 1.466-.087c.205.095.388.233.537.406a1.64 1.64 0 0 1 .384 1.279l-1.388 4.114M7 11H4v6.5A1.5 1.5 0 0 0 5.5 19v0A1.5 1.5 0 0 0 7 17.5V11Zm6.5-1h4.915c.286 0 .372.014.626.15.254.135.472.332.637.572a1.874 1.874 0 0 1 .215 1.673l-2.098 6.4C17.538 19.52 17.368 20 16.12 20c-2.303 0-4.79-.943-6.67-1.475"/>
                </svg>
                @isset($op)
@if ($op!=NULL)
<span class="block">{{$op}}</span>


@else
<span class="block">0</span>

@endif


                @endisset

              </button>
            </form>
            </div>

            <button onclick="comm()" type="button" class=" ml-5 py-2.5 px-5   text-sm font-medium text-gray-900 focus:outline-none bg-white border  rounded-full  border-gray-200  hover:bg-gray-100 hover:rounded-x-lg focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
              <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 9h5m3 0h2M7 12h2m3 0h5M5 5h14a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1h-6.616a1 1 0 0 0-.67.257l-2.88 2.592A.5.5 0 0 1 8 18.477V17a1 1 0 0 0-1-1H5a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z"/>
              </svg>

            </button>

        </form>

           </div>
      </div>
    </div>
</div>
<hr class="bg-gray-400 h-1 ">
</div>
{{-- ____________________________________________________________ --}}
    <div class="flex flex-col gap-5 m-3 ">
        <form method="POST" action="{{route('store.comment',$pos->id)}}" id="fom1" >
          @csrf
            @auth

                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

          @endauth
  </div>
  <div  id="comment" style="display:none" class="w-full bg-white rounded-lg border p-1 md:p-3 m-10 overflow-y-scroll ">
    <h3 class="font-semibold p-1">أضف تعليق</h3>

    <label for="chat" class="sr-only">Your message</label>
    <div class="flex items-center px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">


        <textarea name="comment" id="chat" rows="2" cols="2" class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="رسالتك..."></textarea>
            <button type="submit" class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
            <svg class="w-5 h-5 rotate-90 rtl:-rotate-90" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                <path d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z"/>
            </svg>
            <span class="sr-only">Send message</span>
        </button>
    </div>
    <hr class="h-1 bg-slate-200 w-full">
</form>
    {{--

    <div class="w-full px-3 mb-2 mt-6">
        <textarea
                class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-400 focus:outline-none focus:bg-white"
                name="body" placeholder="Comment" required></textarea>
    </div>

    <div class="w-full flex justify-end px-3 my-3">
        <input type="submit" class="px-2.5 py-1.5 rounded-md text-white  bg-indigo-500 text-lg" value='Post Comment'>
    </div> --}}


        <!-- Comment Container -->

        <div class="overflow-y-scroll h-96">
        @foreach ($al as $a)

        <div class="border border-r-emerald-500">
            <div class="flex w-full justify-between border rounded-md">

                <div class="p-3">
                    <div class="flex gap-3 items-center">
                        <img src="https://th.bing.com/th/id/R.8e2c571ff125b3531705198a15d3103c?rik=gzhbzBpXBa%2bxMA&riu=http%3a%2f%2fpluspng.com%2fimg-png%2fuser-png-icon-big-image-png-2240.png&ehk=VeWsrun%2fvDy5QDv2Z6Xm8XnIMXyeaz2fhR3AgxlvxAc%3d&risl=&pid=ImgRaw&r=0"
                                class="object-cover w-10 h-10 rounded-full border-2 border-emerald-400  shadow-emerald-400">
                        <h3 class="font-bold">
                            @foreach ($users as $user)

                            @if ($a->user_id==$user->id)

                            {{$user->name}}                            <br>
                            @endif

                            @endforeach

                        </h3>
                    </div>
                    <p class="text-gray-600 mt-2">
                        {{$a->comment}}
                    </p>

                </div>

            </div>
        </div>
        @endforeach
    </div>
    </div>

      {{-- <div class="mb-6">
          <label for="image" class="block text-lg font-medium text-gray-800 mb-1">Image</label>
          <input type="file" id="image" name="image" accept="image/*" class="w-full">
      </div> --}}

    <script>
        function comm(){

    var mc=document.getElementById("comment");

        if(mc.style.display=="none"){

        mc.style.display="block";

    }

    else if(mc.style.display=="block"){
        mc.style.display="none";
    }
    }
    </script>

@endsection


