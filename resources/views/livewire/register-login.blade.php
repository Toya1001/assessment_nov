<div>

    <!-- component -->
    <!-- @author: Hackcharms -->

    <div class="flex justify-center items-center bg-blueGray-50">
        <div class="bg-white rounded-lg">
            <div class="inline-flex rounded-lg">
                <button wire:click="register()" type="submit"
                    class="text-center self-center py-2 px-4 rounded-lg cursor-pointer hover:bg-blue-800">Register</button>

            </div>
            <div class="inline-flex rounded-lg">
                <button type="submit" wire:click="login()"
                    class="text-center self-center py-2 px-4 rounded-lg cursor-pointer hover:bg-blue-800">Login</button>

            </div>
        </div>
    </div>

    @if($displayLogin)

    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    <!-- component -->
    <div class="w-screen h-screen flex justify-center items-center bg-blueGray-50">
        <form class="p-10 bg-white rounded flex justify-center items-center flex-col shadow-md bg-blueGray-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 text-gray-600 mb-2" viewbox="0 0 20 20"
                fill="currentColor">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                    clip-rule="evenodd" />
            </svg>
            <p class="mb-5 text-3xl uppercase text-gray-600">Login</p>
            <input wire:model="email" type="email" name="email"
                class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none" autocomplete="off"
                placeholder="Email">
            @error('email'){{ $message }}@enderror
            <input wire:model="password" type="password" name="password"
                class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none" autocomplete="off"
                placeholder="Password">
            @error('password'){{ $message }}@enderror
            <button wire:click="submit()"
                class="bg-blueGray-800 text-white active:bg-blueGray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                id="login" type="submit"><span>Login</span></button>
        </form>
    </div>
    @else
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    <!-- component -->
    <section class="bg-blueGray-50">
        <div class="w-full lg:w-6/12 px-4 mx-auto pt-6">
            <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0">
                <div class="rounded-t mb-0 px-6 py-6">
                    {{-- <div class="text-center mb-3">
                        <h6 class="text-blueGray-500 text-sm font-bold">
                            Sign up with
                        </h6>
                    </div>
                    <div class="btn-wrapper text-center">
                        <button
                            class="bg-white active:bg-blueGray-50 text-blueGray-700 font-normal px-4 py-2 rounded outline-none focus:outline-none mr-2 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs ease-linear transition-all duration-150"
                            type="button">
                            <img alt="..." class="w-5 mr-1"
                                src="https://demos.creative-tim.com/notus-js/assets/img/github.svg">Github </button>
                        <button
                            class="bg-white active:bg-blueGray-50 text-blueGray-700 font-normal px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs ease-linear transition-all duration-150"
                            type="button">
                            <img alt="..." class="w-5 mr-1"
                                src="https://demos.creative-tim.com/notus-js/assets/img/google.svg">Google</button>

                    </div>
                    <hr class="mt-6 border-b-1 border-blueGray-300">
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                    <div class="text-blueGray-400 text-center mb-3 font-bold">
                        <small>Or sign up with credentials</small>
                    </div> --}}
                    <form>
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                htmlfor="grid-password">
                                Name</label>
                            <input wire:model="name" type="text"
                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                placeholder="Name">
                            @error('name'){{ $message }}@enderror
                        </div>

                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                htmlfor="grid-password">Email</label>
                            <input wire:model="email" type="email"
                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                placeholder="Email">
                            @error('email'){{ $message }}@enderror
                        </div>

                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                htmlfor="grid-password">Password</label>
                            <input wire:model="password" type="password"
                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                placeholder="Password">
                            @error('password'){{ $message }}@enderror
                        </div>

                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                htmlfor="grid-password">Confirm Password</label>
                            <input wire:model="password_confirmation" type="password" name="password_confirmation"
                                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                placeholder="Password">
                            @error('password_confirmation'){{ $message }}@enderror
                        </div>

                        <div class="relative w-full mb-3">
                            <input wire:model="teacher" type="checkbox" name="teacher" value="true">
                            <label class="uppercase text-blueGray-600 text-xs font-bold mb-2"
                                htmlfor="grid-password">Teacher</label>
                            @error('teacher'){{ $message }}@enderror
                        </div>

                        <div class="relative w-full mb-3">
                            <input wire:model="student" type="checkbox" name="student" value="true">
                            <label class="uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">Student</label>
                            @error('student'){{ $message }}@enderror
                        </div>

                        <div class="text-center mt-6">
                            <button wire:click="registerOnSubmit()"
                                class="bg-blueGray-800 text-white active:bg-blueGray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                                type="submit">
                                Create Account
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @endif
</div>