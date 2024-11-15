<x-app-layout x-data="{open:false}">
    <x-slot name="header">
        <div style="display: flex; justify-content: center; align-items: center; padding: 1rem; background-color: #6a0dad; border-radius: 12px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); overflow: hidden; position: relative;">
            <!-- Header Title -->
            <h1 id="movingText" style="font-family: 'Arial', sans-serif; font-weight: 900; font-size: 3rem; color: white; text-transform: uppercase; letter-spacing: 4px; background: linear-gradient(to right, #6a0dad, #ff5733); -webkit-background-clip: text; background-clip: text; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2); animation: blinkMove 3s linear infinite;">
                PathToSuccess
            </h1>

            <!-- Create Course Button (Positioned at the bottom right) -->
            @auth
                @if (Auth::user()->institute)
                    <a href="{{ route('course.create') }}" id="lik" style="position: absolute; bottom: 10px; right: 10px;">
                        <x-primary-button @click="open = !open" style="background: linear-gradient(to right, #6a0dad, #ff9800); border: none; color: white; padding: 0.5rem 1rem; border-radius: 8px; font-weight: bold; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);">
                            Create Course
                        </x-primary-button>
                    </a>
                @endif
            @endauth
        </div>
    </x-slot>

    <style>
        @keyframes blinkMove {
            0% {
                transform: translateX(-100%);
                color: #6a0dad;
            }
            50% {
                transform: translateX(50%);
                color: #ff5733;
            }
            100% {
                transform: translateX(100%);
                color: #6a0dad;
            }
        }

        #movingText {
            animation: blinkMove 3s linear infinite;
        }

        /* Additional styling for the institute cards */
        .institute-card {
            background: linear-gradient(to right, #6a0dad, #ff9800);
            padding: 1.5rem;
            border-radius: 8px;
            text-align: center;
            color: white;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .institute-card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        }

        .institute-card h2 {
            font-size: 1.25rem;
            margin-bottom: 0.75rem;
        }

        .institute-card p {
            font-size: 1rem;
            margin-bottom: 0.5rem;
        }
    </style>

    <div class="py-12" style="background: linear-gradient(to bottom, #ff5733, #6a0dad); min-height: 100vh;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold pb-3 text-xl" style="color: white; text-align: center; font-size: 1.5rem; text-transform: uppercase;">
                Courses List
            </h2>
            
            <!-- Courses Grid -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8 grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 gap-4">
                @foreach($courses as $course)
                    <div class="institute-card">
                        <a href="{{ route('course.show', $course->id) }}" class="block">
                            <h2 class="font-semibold text-xl text-indigo-500 mb-2">
                                Course: {{ $course->level . ' in ' . $course->course_name }}
                            </h2>
                        </a>

                        <p class="text-sm">{{ 'Faculty of ' . $course->faculty->faculty_name }}</p>

                        <div class="text-xs text-gray-300 mt-2">
                            <span>{{ $course->level }}</span>
                            <span>|</span>
                            <span>{{ $course->course_duration }}</span>
                        </div>

                        <p class="mt-2 text-xs">{{ 'Institute: ' . $course->faculty->institute->institute_name }}</p>
                    </div>
                @endforeach
            </div>

            <!-- Pagination for non-institute users -->
            @cannot('institute')
                <div class="my-3">
                    {{$courses->links()}}
                </div>
            @endcannot
        </div>

        <!-- Success Modals -->
        @if (session('status') === 'course-deleted')
            <x-confirm-modal :name="'create'" :content="'The course was deleted successfully.'">
            </x-confirm-modal>
        @endif

        @if (session('status') === 'application-created')
            <x-confirm-modal :name="'create'" :content="'The application was submitted successfully.'">
            </x-confirm-modal>
        @endif
    </div>
</x-app-layout>
