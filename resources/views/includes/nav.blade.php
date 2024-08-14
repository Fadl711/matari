<nav class="bg-bro border-gray-200 dark:bg-gray-900 shadow-md">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 ">
  <a href="{{Route('posts.welcome')}}" class=" flex items-center space-x-3 rtl:space-x-reverse">
      <svg class="w-9 h-8 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m4 12 8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5"/>
        </svg>
  </a>
  <div class="flex md:order-2 ">
          <button type="button" data-collapse-toggle="navbar-search" aria-controls="navbar-search" aria-expanded="false" class="md:hidden text-bro dark:text-gray-400 hover:bg-gray-200 bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 me-1">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
            <span class="sr-only">Search</span>
          </button>
      <div class="relative hidden md:block ">
         <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none ">
                 <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                 </svg>
                 <span class="sr-only">Search icon</span>
         </div>


             <input name="search" type="text" id="search" class="block w-full p-2 ps-10 text-sm text-black border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ابحث...">
             <table class="border-collapse border border-black absolute bg-white table-auto	">
                <thead>
                </thead>
                <tbody>

                </tbody>
              </table>


      </div>
             {{-- menu icon --}}
           <button data-collapse-toggle="navbar-search" type="button" class=" inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-bro rounded-lg md:hidden hover:bg-gray-200 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-search" aria-expanded="false">
               <span class="sr-only">Open main menu</span>
               <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
               </svg>
           </button>
  </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1 " id="navbar-search">
      <div class="relative mt-3 md:hidden ">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none ">
          <svg class="w-4 h-4 text-white dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
          </svg>
        </div>
        <input name="search" type="text" id="search" class="block w-full p-2 ps-10 text-sm text-black border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ابحث...">
        <table class="border-collapse border border-black absolute bg-white table-auto	" id="search-navbar">
           <thead>
           </thead>
           <tbody>
           </tbody>
         </table>      </div>
      <ul class=" space-y-1  flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-bro dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">

      @foreach($posts as $post)



          <li>
           <a href="{{Route('posts.show_all',$post->id)}}" class="block mt-1 py-2 px-3 text-white rounded bg-bro md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 ">   {{$post['section_Name']}}</a>
          </li>
        @endforeach


      </ul>
    </div>
  </div>
</nav>
<script type="text/javascript">

    $('#search').on('keyup',function(){
    $value=$(this).val();

    $.ajax({
    type : 'get',
    url : '{{URL::to('search')}}',
     data:{'search':$value},
    success:function(data){

        $('tbody').html(data);
    }
    });
    })
    </script>
    <script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>
