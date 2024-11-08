<x-app-layout x-data="{open:false}">
    <x-slot name="header">
        <div class="flex justify-between align-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Home') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-12">
        <img src="Graduation-Party.jpg" alt="" class="-z-10 fixed w-full h-full top-0 right-0 left-0 bottom-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800/50 overflow-hidden shadow-sm sm:rounded-lg p-8 text-white">
                <div class="w-full flex flex-col items-center gap-6 justify-center">
                    <h1 class="font-bold text-4xl text-center text-transparent bg-clip-text bg-gradient-to-r from-[#ff00d2] to-[#fed90f]">Find Your Path to Success</h1> 
                    <p class="text-center">Explore higher learnings and apply to the best courses that match your qualifications</p> 
                    <div class="flex flex-col items-center">
                        <a href="/institute/register">
                        <x-primary-button class="flex items-center justify-center  hover:bg-gray-300 w-[fit-content] bg-gradient-to-r from-[#ff00d2] via-red-800 to-yellow-200 py-[1.5px] px-[1.5px]">
                            <div class="hover:bg-gray-500 transition-color duration-300 flex items-center justify-center bg-gray-900 h-full w-full px-3 py-2 rounded-sm">
                             Get Started as institution    
                            </div>
                        </x-primary-button>  
                        </a>
                        <div class="flex w-[150px] items-center my-2 gap-1">
                            <hr class="flex-1">  
                            <span class="font-bold">OR</span>  
                            <hr class="flex-1">  
                        </div>
                            
                        <a href="/student/register">
                            <x-primary-button class="flex items-center justify-center w-[fit-content] bg-gradient-to-r from-[#008cff]  to-[#e100ff] py-[1.5px] px-[1.5px] overflow-hidden">
                            <div class="hover:bg-gradient-to-r from-[#008cff]  to-pink-500 hover:text-gray-200 transition-color duration-300 flex items-center justify-center bg-gray-900 h-full w-full px-3 py-2 rounded-sm">
                              Get Started as student   
                            </div>
                        </x-primary-button> 
                         
                        </a>  
                    </div>
                    
                    
                </div>
                
            </div>
        </div>
        
    </div>
</x-app-layout>