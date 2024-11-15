<x-app-layout x-data="{ open: false }">
    <x-slot name="header">
        <!-- Header Section with Gradient and Animation -->
        <div style="display: flex; justify-content: center; align-items: center; padding: 1rem; background-color: #6a0dad; border-radius: 12px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); overflow: hidden;">
            <h1 id="movingText" style="font-family: 'Arial', sans-serif; font-weight: 900; font-size: 3rem; color: white; text-transform: uppercase; letter-spacing: 4px; background: linear-gradient(to right, #6a0dad, #ff5733); -webkit-background-clip: text; background-clip: text; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2); animation: blinkMove 3s linear infinite;">
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

        /* Body Styling */
        .bg-gradient {
            background: linear-gradient(to bottom, #ff5733, #6a0dad);
            min-height: 100vh;
            color: white;
            font-family: 'Arial', sans-serif;
        }

        .section-header {
            text-align: center;
            font-size: 2rem;
            text-transform: uppercase;
            color: white;
            margin-top: 2rem;
        }

        /* Customizing the Form */
        .faculty-form {
            background: linear-gradient(to right, #6a0dad, #ff9800);
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .faculty-form:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        }

        .faculty-form h2 {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            color: white;
        }

        .faculty-form .input-label {
            font-weight: bold;
            color: #ff5733;
        }

        .faculty-form .text-input {
            width: 100%;
            padding: 1rem;
            border-radius: 8px;
            border: 2px solid #ddd;
            margin-top: 0.5rem;
            font-size: 1rem;
        }

        .faculty-form .primary-button {
            background-color: #6a0dad;
            color: white;
            padding: 1rem 2rem;
            border-radius: 12px;
            border: none;
            margin-top: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .faculty-form .primary-button:hover {
            background-color: #ff5733;
        }

        /* Faculty Cards */
        .faculty-card {
            background: linear-gradient(to right, #6a0dad, #ff9800);
            padding: 1.5rem;
            border-radius: 8px;
            text-align: center;
            color: white;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .faculty-card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        }

        .faculty-card h2 {
            font-size: 1.25rem;
            margin-bottom: 0.75rem;
        }

        .faculty-card p {
            font-size: 1rem;
            margin-bottom: 0.5rem;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 0.75rem;
            text-align: center;
        }

        table th {
            background-color: #6a0dad;
            color: white;
        }

        .table-row {
            border-bottom: 1px solid #ddd;
        }

        .table-cell {
            padding: 0.5rem;
            text-align: center;
        }

        /* Application Table Custom Styles */
        .application-table {
            background-color: #fff;
            padding: 2rem;
            margin-top: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .application-table caption {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .application-table tr:hover {
            background-color: #f7f7f7;
        }

        .application-table th {
            text-align: left;
            color: #6a0dad;
        }

        .application-table td {
            font-weight: normal;
        }

        /* Action Button Styling */
        .action-button {
            padding: 1rem 2rem;
            background-color: #6a0dad;
            color: white;
            font-size: 1rem;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .action-button:hover {
            background-color: #ff5733;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            justify-content: space-between;
            margin-top: 2rem;
        }

        .action-buttons button:disabled {
            background-color: #e0e0e0;
            cursor: not-allowed;
        }
    </style>

    <div class="py-12 bg-gradient">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
            <h2 class="font-medium text-white section-header">Application for {{ $application->student->full_name }}</h2>
            
            <!-- Faculty Form Section -->
            <div class="faculty-form">
                <form method="POST" action='{{ "/applications/$application->id" }}'>
                    @csrf
                    @method("PATCH")
                    <div class="flex justify-between gap-4">
                        @if ($status !== 'admitted')
                            @can('institute')
                                <x-primary-button class="bg-green-500 action-button" name="action" value="admit">Admit</x-primary-button>
                                <x-primary-button name="action" value="waitlist" class="action-button">Waitlist</x-primary-button>
                                <x-danger-button name="action" value="reject" class="action-button">{{ __('Reject') }}</x-danger-button>
                            @endcan
                        @else
                            @can('institute')
                                <x-primary-button class="bg-green-500 action-button" disabled>Admitted</x-primary-button>
                            @endcan
                        @endif
                    </div>
                </form>
            </div>

            <!-- Application Details Section -->
            <div class="application-table">
                <h3 class="text-center font-semibold text-lg">Application Details</h3>
                <table>
                    <caption>Course and Student Information</caption>
                    <tr class="table-row">
                        <th class="table-cell">Application Id</th>
                        <td class="table-cell">{{$application->id}}</td>
                    </tr>
                    <tr class="table-row">
                        <th class="table-cell">Course</th>
                        <td class="table-cell">{{$application->course->course_name}}</td>
                    </tr>
                    <tr class="table-row">
                        <th class="table-cell">Status</th>
                        <td class="table-cell">{{ ucfirst($status) }}</td>
                    </tr>
                </table>
            </div>

            <!-- Results Table -->
            <div class="application-table">
                <h3 class="text-center font-semibold text-lg">Student Results</h3>
                <table>
                    <caption>Passes and Credits</caption>
                    <tr class="table-row">
                        <th class="table-cell">Subject</th>
                        <th class="table-cell">Grade</th>
                    </tr>
                    @php
                        for ($i = 0; $i < $application->course->subjects->count(); $i++) {
                            $subject = $application->course->subjects[$i];
                            $student_subject = $application->student->subjects->where('subject_id', $subject->id)->first();
                    @endphp
                    <tr class="table-row">
                        <td class="table-cell">{{ $subject->subject_name }}</td>
                        <td class="table-cell">{{ $student_subject->pivot->grade ?? "N/A" }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
