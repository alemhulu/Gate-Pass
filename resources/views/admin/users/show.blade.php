<x-admin-layout>
  
    
  <div>
    <div class="flex justify-end">
      <button class="px-4 py-2 rounded-md bg-sky-500 text-sky-100 hover:bg-sky-600"><a href="/admin/users/create">create Post</a> </button>
    </div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                

            <div>
  <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0">

    <div class="w-full px-16 py-20 mt-6 overflow-hidden bg-white rounded-lg lg:max-w-4xl">

      <div class="mb-4">
        <h1 class="font-serif text-3xl font-bold underline decoration-gray-400"> Post Show</h1>
      </div>

      <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">
        <form method="POST" action="/admin/users/{{ $user->id }}/show">
          <!-- Title -->
          <div>
            <h3 class="text-2xl font-semibold">Tailwind CSS 3 Post Show Title</h3>
            <div class="flex items-center mb-4 space-x-2">
              <span class="text-xs text-gray-500"> 20/12/22</span><span class="text-xs text-gray-500">Created by
                Admin</span>
            </div>
            <p class="text-base text-gray-700">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci
              aliquid numquam sequi! Commodi enim laborum illo quaerat illum quidem quam ea itaque in, nulla quis
              vero qui cupiditate debitis. Ut. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam quia
              rerum qui autem vel? Veniam laborum omnis, delectus ab repellat labore tempora, id sit ipsum suscipit,
              consectetur neque tenetur quam?</p>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

            </div>
         </div>
  </div>
</x-admin-layout>