<x-app-layout x-data="{ open: false }">
    <x-slot name="header">
        <div style="display: flex; justify-content: center; align-items: center; padding: 1rem; background-color: #6a0dad; border-radius: 12px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); overflow: hidden; position: relative;">
            <h1 id="movingText" style="font-family: 'Arial', sans-serif; font-weight: 900; font-size: 3rem; color: white; text-transform: uppercase; letter-spacing: 4px; background: linear-gradient(to right, #6a0dad, #ff5733); -webkit-background-clip: text; background-clip: text; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2); animation: blinkMove 3s linear infinite;">
                PathToSuccess
            </h1>
            @can('institute')
                <form method="POST" action="/control/{{ Auth::user()->institute->id }}" style="position: absolute; bottom: 10px; right: 10px;">
                    @csrf
                    @method("PATCH")
                    @if ((count($applications[1]) > 0))
                        <x-primary-button class="bg-gradient-to-r from-purple-600 to-orange-500 text-white hover:from-purple-700 hover:to-orange-600 transition duration-300" name="action" value="admission">
                            {{ (Auth::user()->institute->control->admissions !== 'open') ? 'Publish Admissions' : 'Published' }}
                        </x-primary-button>
                    @endif
                    <x-primary-button class="bg-gradient-to-r from-purple-600 to-orange-500 text-white mt-2 hover:from-purple-700 hover:to-orange-600 transition duration-300" name="action" value="application">
                        {{ (Auth::user()->institute->control->applications !== 'open') ? 'Open Applications' : 'Close Applications' }}
                    </x-primary-button>
                </form>
            @endcan
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

        /* Styling for application cards */
        .application-card {
            background: #4b5563;
            color: white;
            padding: 1rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .application-card:hover {
            transform: scale(1.03);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .application-card h2 {
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .application-card p {
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .application-card span {
            display: block;
            font-size: 0.875rem;
            margin-top: 0.5rem;
        }
    </style>

    <div class="py-12">
        @can('institute')
            <!-- Pending Applications Section -->
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h2 class="font-semibold pb-3 text-xl text-indigo-600">Pending Applications</h2>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8 grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 gap-3">
                    @foreach ($applications[0] as $application)
                        <div class="application-card">
                            <a href="{{ '/applications/' . $application->id }}">
                                <h2>Course: {{ $application->course->course_name }}</h2>
                                <p>{{ 'Faculty of ' . $application->course->faculty->faculty_name }}</p>
                                <p>{{ 'Institute: ' . $application->course->faculty->institute->institute_name }}</p>
                                <span>{{ "Application date: $application->created_at" }}</span>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Admitted Applications Section -->
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h2 class="font-semibold pb-3 text-xl text-green-600">Admitted Applications</h2>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8 grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 gap-3">
                    @foreach ($applications[1] as $application)
                        <div class="application-card">
                            <a href="{{ '/applications/' . $application->id }}">
                                <h2>Course: {{ $application->course->course_name }}</h2>
                                <p>{{ 'Faculty of ' . $application->course->faculty->faculty_name }}</p>
                                <p>{{ 'Institute: ' . $application->course->faculty->institute->institute_name }}</p>
                                <span>{{ "Application date: $application->created_at" }}</span>
                                <span class="block">{{ "Admitted date: $application->updated_at" }}</span>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Waitlisted Applications Section -->
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h2 class="font-semibold pb-3 text-xl text-yellow-600">Waitlisted Applications</h2>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8 grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 gap-3">
                    @foreach ($applications[2] as $application)
                        <div class="application-card">
                            <a href="{{ '/applications/' . $application->id }}">
                                <h2>Course: {{ $application->course->course_name }}</h2>
                                <p>{{ 'Faculty of ' . $application->course->faculty->faculty_name }}</p>
                                <p>{{ 'Institute: ' . $application->course->faculty->institute->institute_name }}</p>
                                <span>{{ "Application date: $application->created_at" }}</span>
                                <span>{{ "Admitted date: $application->updated_at" }}</span>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Rejected Applications Section -->
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h2 class="font-semibold pb-3 text-xl text-red-600">Rejected Applications</h2>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8 grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 gap-3">
                    @foreach ($applications[3] as $application)
                        <div class="application-card">
                            <a href="{{ '/applications/' . $application->id }}">
                                <h2>Course: {{ $application->course->course_name }}</h2>
                                <p>{{ 'Faculty of ' . $application->course->faculty->faculty_name }}</p>
                                <p>{{ 'Institute: ' . $application->course->faculty->institute->institute_name }}</p>
                                <span>{{ "Application date: $application->created_at" }}</span>
                                <span>{{ "Admitted date: $application->updated_at" }}</span>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endcan
    </div>
</x-app-layout>
