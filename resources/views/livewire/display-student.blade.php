<div>
    <div class="flex justify-center items-center bg-blueGray-50">
        <div class="bg-white rounded-lg">
            <div class="inline-flex rounded-lg">
                <button wire:click="$set('studentlist', true)" type="submit" class="text-center self-center py-2 px-4 rounded-lg cursor-pointer hover:bg-indigo-700 focus:bg-indigo-700"><strong>List Of Students</strong></button>

            </div>
            <div class="inline-flex rounded-lg">
                <button type="submit" wire:click="$set('studentlist', false)" class="text-center self-center py-2 px-4 rounded-lg cursor-pointer hover:bg-indigo-700 focus:bg-indigo-700"><strong>Students Assigned</strong></button>

            </div>
        </div>
    </div>



    @if($addStudent)
    <!-- component -->
    <div class="fixed z-10 inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="flex items-center  h-8 w-8 rounded-full left-0">
                <button wire:click="$set('addStudent', false)"><i class="fas fa-times"></i></button>
            </div>
            <h3 class="font-semibold text-md text-center text-blueGray-700">Add Student</h3>

            <form wire:submit.prevent="studentAdd" class="flex flex-col bg-white  p-12">
                <label class="font-semibold text-xs" for="teachername">Student Name</label>
                <input wire:model="studentname" class="flex items-center h-12 px-4 w-64 bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2" type="text">

                <label class="font-semibold text-xs" for="email">Email Address</label>
                <input wire:model="email" class="flex items-center h-12 px-4 w-64 bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2" type="text">

                <label class="font-semibold text-xs" for="password">Password</label>
                <input wire:model="password" class="flex items-center h-12 px-4 w-64 bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2" type="password">
                <button class="flex items-center justify-center h-12 px-6 w-64 bg-blue-600 mt-8 rounded font-semibold text-sm text-blue-100 hover:bg-blue-700">Add</button>
            </form>
            <!-- Component End  -->

        </div>
    </div>
    @endif


    @if($editStudent)
    <!-- component -->
    <div class="fixed z-10 inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="flex items-center  h-8 w-8 rounded-full left-0">
                <button wire:click="$set('editStudent', false)"><i class="fas fa-times"></i></button>
            </div>
            <h3 class="font-semibold text-md text-center text-blueGray-700">Edit Studentr</h3>

            <form wire:submit.prevent="studentUpdate()" class="flex flex-col bg-white  p-12">
                <label class="font-semibold text-xs" for="teachername">Student Name</label>
                <input wire:model="studentname" class="flex items-center h-12 px-4 w-64 bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2" type="text">

                <label class="font-semibold text-xs" for="email">Email Address</label>
                <input disabled wire:model="email" class="flex items-center h-12 px-4 w-64 bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2" type="text">

                <button class="flex items-center justify-center h-12 px-6 w-64 bg-blue-600 mt-8 rounded font-semibold text-sm text-blue-100 hover:bg-blue-700">Update</button>
            </form>
            <!-- Component End  -->

        </div>
    </div>
    @endif



    @if($assignStudent)
    <!-- component -->
    <div class="fixed z-10 inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="flex items-center  h-8 w-8 rounded-full left-0">
                <button wire:click="$set('assignStudent', false)"><i class="fas fa-times"></i></button>
            </div>

            <h3 class="font-semibold text-base text-blueGray-700">Assign Teacher</h3>

            <form wire:submit.prevent="teacherAdd()" class="flex flex-col bg-white  p-12 mt-12">

                <label class="font-semibold text-xs" for="subject">Teacher</label>
                <select wire:model="teacherId" name="teacherId" id="teacherId" class="flex items-center h-12 px-4 w-64 bg-gray-200 mt-2 rounded focus:outline-none focus:ring-2">
                    @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->user->name }}</option>
                    @endforeach
                </select>
                <button class="flex items-center justify-center h-12 px-6 w-64 bg-blue-600 mt-8 rounded font-semibold text-sm text-blue-100 hover:bg-blue-700">Assign</button>
            </form>
            <!-- Component End  -->

        </div>
    </div>
    @endif


    @if($studentlist)
    <section class="py-1 bg-blueGray-50">
        <div class="w-full xl:w-10/12 mb-12 xl:mb-0 px-4 mx-auto mt-24">
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                            <h3 class="font-semibold text-base text-blueGray-700">Student</h3>
                        </div>
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                            <button wire:click="$set('addStudent', true)" class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">Add A Student</button>
                        </div>

                    </div>
                </div>

                <div class="block w-full overflow-x-auto">
                    <table class="items-center bg-transparent w-full border-collapse ">
                        <thead>
                            <tr>
                                <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Student ID
                                </th>
                                <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Student Name
                                </th>

                                <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Actions
                                </th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach($students as $student)

                            <tr>

                                <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">
                                    {{ $student->id }}
                                </th>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                    {{ $student->user->name }}
                                </td>


                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                    <button wire:click="studentEdit({{ $student->id }})" class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Edit</button>
                                    <button wire:click="studentDelete({{ $student->id }})" class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Delete</button>
                                    <button wire:click="addTeacher({{ $student->id }})" class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">Add a Teacher</button>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>

                    </table>
                    <div class="my-8 mx-8">
                        {{ $students->links() }}
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
                                href="https://www.creative-tim.com" class="text-blueGray-500 hover:text-blueGray-800"
                                target="_blank"> Creative
                                Tim</a>.
                        </div>
                    </div>
                </div>
            </div>
        </footer> --}}
    </section>
    @else

    <section class="py-1 bg-blueGray-50">
        <div class="w-full xl:w-10/12 mb-12 xl:mb-0 px-4 mx-auto mt-24">
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded ">
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                            <h3 class="font-semibold text-base text-blueGray-700">Student</h3>
                        </div>
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1 text-right">
                            <button wire:click="$set('addStudent', true)" class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">Add A Student</button>
                        </div>

                    </div>
                </div>

                <div class="block w-full overflow-x-auto">
                    <table class="items-center bg-transparent w-full border-collapse ">
                        <thead>
                            <tr>
                                <th class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Student Name
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
                            @foreach($assigned as $assign)

                            <tr>

                                <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left text-blueGray-700 ">
                                    {{ $assign->student->user->name }}
                                </th>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                    {{ $assign->teacher->user->name }}
                                </td>

                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 ">
                                    <button wire:click="assignedEdit({{ $assign->id }})" class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Edit</button>
                                    <button wire:click="assignedDelete({{ $assign->id }})" class="bg-indigo-500 text-white active:bg-indigo-600 text-xs font-bold uppercase px-3 py-1 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Delete</button>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>

                    </table>
                    <div class="my-8 mx-8">
                        {{ $assigned->links() }}
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
                                href="https://www.creative-tim.com" class="text-blueGray-500 hover:text-blueGray-800"
                                target="_blank"> Creative
                                Tim</a>.
                        </div>
                    </div>
                </div>
            </div>
        </footer> --}}
    </section>
    @endif
</div>
