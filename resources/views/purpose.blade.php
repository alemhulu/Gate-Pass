 {{-- <x-admin-layout>
 <x-slot name="actionButton">
     <a href="{{ route('visits.index') }}">
         <x-button class="flex ">
             <i class="flex fi-rr-arrow-left mr-2"></i>
             {{ __('Back') }}
         </x-button>
     </a>
 </x-slot>

 <form action="{{ route('purpose.index', $visit->id) }}" title="Create New Visit" method="GET">
     <x-slot name="body">
         <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-gray-200 sm:pt-5">
             <x-label for="visitors"value="{{ $visit->purpose }}"  />
             <div class="mt-1 sm:mt-0 sm:col-span-2">
                 <textarea name="notes" cols="50" rows="150"></textarea>
             </div>
         </div>
     </x-slot>
 <form> 

 
 </x-admin-layout> --}}

 <x-admin-layout>
     <x-slot name="header">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             {{ __('update user information') }}
         </h2>
     </x-slot>

     <!-- show Post -->

     <div>
         <form class="w-full" 
             method="POST>     
            {{ csrf_field() }}
            <div class="w-full px-16 py-20 mt-6
             overflow-hidden bg-white rounded-lg lg:max-w-4xl">

             <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">

                 <!-- Title -->
                 <div>
                     <label class=" mt-3 block text-sm font-bold text-gray-700" for="Name">
                         purpose :
                     </label>
                     <p class="mt-3">
                         {{ $visit->purpose }}</p>

                 </div>




                 <div class="flex justify-end">
                     <button type="submit"
                         class="px-6 py-2 text-sm font-semibold align:right text-gray-100 bg-red-500 rounded-md shadow-md hover:bg-red-300 focus:outline-none focus:border-gray-700 focus:ring ring-gray-300">
                         <a href="{{ route('visits.index') }}">Back</a>
                     </button>
                 </div>


             </div>
     </div>
     </form>
     </div>


 </x-admin-layout>
