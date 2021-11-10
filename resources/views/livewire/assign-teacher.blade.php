  <div class="flex justify-center items-center bg-blueGray-50">
      <div class="bg-white rounded-lg">
          <div class="inline-flex rounded-lg">
              <button wire:click="$set('selectTeacher', true)" type="submit" class="text-center self-center py-2 px-4 rounded-lg cursor-pointer hover:bg-indigo-700 focus:bg-indigo-700"><strong>Select  Teachers</strong></button>

          </div>
          <div class="inline-flex rounded-lg">
              <button type="submit" wire:click="$set('selectTeacher', false)" class="text-center self-center py-2 px-4 rounded-lg cursor-pointer hover:bg-indigo-700 focus:bg-indigo-700"><strong>Courses Selected</strong></button>

          </div>
      </div>
  </div>


@if($selectTeacher)
<div>
     <section class="py-1 bg-blueGray-50">
         <div class="w-full xl:w-10/12 mb-12 xl:mb-0 px-4 mx-auto mt-24">
             <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">
                 <div class="rounded-t mb-0 px-4 py-3 border-0">
                     <div class="flex flex-wrap items-center">
                         <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                             <h3 class="font-semibold text-base text-blueGray-700">Teachers</h3>
                         </div>

                     </div>
                 </div>

                 <div class="block w-full overflow-x-auto">
                     <table class="items-center bg-transparent w-full border-collapse ">
                         <thead>
                             <tr>
                                 <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Course Name
                                 </th>
                                 <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                     Teacher Assigned
                                 </th>

                                 <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                     Actions
                                 </th>

                             </tr>
                         </thead>

                         <tbody>
                             @foreach($teachers as $teacher)

                             <tr>

                                 <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">
                                     {{$teacher->teacher->user->name
}}

                                 </th>
                                 <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                     {{ $teacher->course->course_nm }}
                                 </td>

                                 <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                     <button wire:click="selectTeacher({{ $teacher->id }})" class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Select</button>
                                     
                                 </td>
                             </tr>
                             @endforeach

                         </tbody>

                     </table>
                     <div class="my-8 mx-8">
                         {{ $teachers->links() }}
                     </div>
                 </div>
             </div>
         </div>
         {{-- <footer class="relative pt-8 pb-6 mt-16">
                    <div class="container mx-auto px-4">
                        <div class="flex flex-wrap items-center md:justify-between justify-center">
                            <div class="w-full md:w-6/12 px-4 mx-auto text-center">
                                <div class="text-sm text-blueGray-500 font-semibold py-1">
                                    Made with <a href="https://www.creative-tim.com/product/notus-js"
                                        class="text-blueGray-500 hover:text-gray-800" target="_blank">Notus JS</a> by <a
                                        href="https://www.creative-tim.com"
                                        class="text-blueGray-500 hover:text-blueGray-800" target="_blank"> Creative
                                        Tim</a>.
                                </div>
                            </div>
                        </div>
                    </div>
                </footer> --}}
     </section>

     @else

     <div>
         <section class="py-1 bg-blueGray-50">
             <div class="w-full xl:w-10/12 mb-12 xl:mb-0 px-4 mx-auto mt-24">
                 <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">
                     <div class="rounded-t mb-0 px-4 py-3 border-0">
                         <div class="flex flex-wrap items-center">
                             <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                                 <h3 class="font-semibold text-base text-blueGray-700">Teachers</h3>
                             </div>
                             <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                                 <button wire:click="$set('addTeacher', true)" class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">Add A Teacher</button>
                             </div>

                         </div>
                     </div>

                     <div class="block w-full overflow-x-auto">
                         <table class="items-center bg-transparent w-full border-collapse ">
                             <thead>
                                 <tr>
                                     <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                         Teacher Name
                                     </th>
                                     <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                         Course Assigned
                                     </th>

                                     <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                         Actions
                                     </th>

                                 </tr>
                             </thead>

                             <tbody>
                                 @foreach($selection as $selection)

                                 <tr>

                                     <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">
                                         {{$selection->teacher->user->name }}

                                     </th>
                                     <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                         {{-- {{ $selection->teacher->course_nm }} --}}
                                     </td>

                                     <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                         <button wire:click="selectTeacher()" class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Select</button>

                                     </td>
                                 </tr>
                                 @endforeach

                             </tbody>

                         </table>
                         <div class="my-8 mx-8">
                             {{-- {{ $teachers->links() }} --}}
                         </div>
                     </div>
                 </div>
             </div>
             {{-- <footer class="relative pt-8 pb-6 mt-16">
                    <div class="container mx-auto px-4">
                        <div class="flex flex-wrap items-center md:justify-between justify-center">
                            <div class="w-full md:w-6/12 px-4 mx-auto text-center">
                                <div class="text-sm text-blueGray-500 font-semibold py-1">
                                    Made with <a href="https://www.creative-tim.com/product/notus-js"
                                        class="text-blueGray-500 hover:text-gray-800" target="_blank">Notus JS</a> by <a
                                        href="https://www.creative-tim.com"
                                        class="text-blueGray-500 hover:text-blueGray-800" target="_blank"> Creative
                                        Tim</a>.
                                </div>
                            </div>
                        </div>
                    </div>
                </footer> --}}
         </section>
@endif

</div>
