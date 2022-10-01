<div class="grid grid-col-4 grid-flow-col min-h-screen ">
     <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 bg-cover" style="background-image: url('/images/backL.png');">
     <img id="logo" src="/images/logom.png" style="width: 10.7rem;"> <br>
    <p class="text-6xl text-grey-900 font-bold  ">
    እንግዶች መቀበያ ሲስተም <br>
    Guest Gate Pass System
    </p>
    </div>

    <div class="col-span-1">
     <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 bg-cover" style="background-image: url('/images/loginL.jpg');">
        {{-- <div class="font-bold text-2xl text-blue-700 " >
            {{ $logo }}
        </div> --}}

        <div class="w-full sm:max-w-sm mt-6 px-10 py-5 shadow-md overflow-hidden sm:rounded-2xl bg-stone-400/25 backdrop-blur-md">
            {{ $slot }}
        </div>
     </div>
    </div>

        
</div>
