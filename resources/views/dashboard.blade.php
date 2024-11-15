<x-app-layout>
    <x-slot name="header">
        <div style="display: flex; justify-content: center; align-items: center; padding: 1rem; background-color: #6a0dad; border-radius: 12px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); overflow: hidden;">
            <h1 id="movingText" style="font-family: 'Arial', sans-serif; font-weight: 900; font-size: 3rem; color: white; text-transform: uppercase; letter-spacing: 4px; background: linear-gradient(to right, #6a0dad, #ff5733); -webkit-background-clip: text; background-clip: text; text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3); animation: blinkMove 3s linear infinite;">
                PathToSuccess
            </h1>
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

        /* New styles for the stats cards */
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }

        .stats-card {
            background: linear-gradient(to right, #6a0dad, #ff9800);
            padding: 2rem;
            border-radius: 12px;
            text-align: center;
            color: white;
            font-weight: bold;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .stats-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
        }

        .stats-card h3 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .stats-card p {
            font-size: 1.5rem;
            margin: 0;
        }

        .section-title {
            text-align: center;
            color: white;
            font-size: 2rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 2rem;
        }

    </style>

    <div class="py-12" style="background: linear-gradient(to bottom, #ff5733, #6a0dad); min-height: 100vh;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="section-title">
                Your Stats
            </h2>
            <div class="stats-container">
                @can('institute')
                    <div class="stats-card">
                        <h3>Faculties</h3>
                        <p>{{Auth::user()?->institute?->faculty?count(Auth::user()?->institute?->faculty):0}}</p>
                    </div>
                    <div class="stats-card">
                        <h3>Courses</h3>
                        <p>{{count($courses)}}</p>
                    </div>
                    <div class="stats-card">
                        <h3>Applications</h3>
                        <p>{{count($applications)}}</p>
                    </div>
                    <div class="stats-card">
                        <h3>Admissions</h3>
                        <p>{{count($admissions)}}</p>
                    </div>
                @endcan
                @can('student')
                    <div class="stats-card">
                        <h3>Applications</h3>
                        <p>{{count(Auth::user()?->student?->application)}}</p>
                    </div>
                    <div class="stats-card">
                        <h3>Courses you applied for</h3>
                        <p>{{count(Auth::user()?->student?->application)}}</p>
                    </div>
                    <div class="stats-card">
                        <h3>Institutes</h3>
                        <p>{{count($student_institutes)}}</p>
                    </div>
                @endcan
            </div>
        </div>
    </div>
</x-app-layout>
