<form method="POST" action="{{ route('create-course') }}">
    @csrf

    <div class="sm:flex gap-3 max-[640px]:block">
        <div class="flex-1">
            <!-- Course name field -->
            <div>
                <x-input-label for="course_name" :value="__('Course name')" />
                <x-text-input id="course_name" class="block mt-1 w-full" type="text" name="course_name"
                    :value="old('course_name')" required autofocus style="padding: 1rem; border-radius: 8px; border: 2px solid #6a0dad;" />
                <x-input-error :messages="$errors->get('course_name')" class="mt-2" />
            </div>
            <!-- course code -->
            <div>
                <x-input-label for="course_code" :value="__('Course code')" />
                <x-text-input id="course_code" class="block mt-1 w-full" type="text" name="course_code"
                    :value="old('course_code')" required style="padding: 1rem; border-radius: 8px; border: 2px solid #6a0dad;" />
                <x-input-error :messages="$errors->get('course_code')" class="mt-2" />
            </div>
            <!-- Faculty -->
            <div>
                <x-input-label for="faculty" :value="__('Faculty')" />
                <select id="faculty" class="mt-1 w-full border-gray-300 rounded-md" type="text" name="faculty"
                    :value="old('faculty')" required style="padding: 1rem; border-radius: 8px; border: 2px solid #6a0dad;">
                    <option value="">Select faculty</option>
                    @if ($faculties)
                        @foreach ($faculties as $faculty)
                            <option value="{{$faculty->id}}">{{$faculty->faculty_name}}</option>
                        @endforeach
                    @endif
                </select>
                <x-input-error :messages="$errors->get('level')" class="mt-2" />
            </div>
            <!-- Level -->
            <div>
                <x-input-label for="level" :value="__('Level')" />
                <x-text-input id="level" class="block mt-1 w-full" type="text" name="level" :value="old('level')"
                    required placeholder="Diploma or Degree" style="padding: 1rem; border-radius: 8px; border: 2px solid #6a0dad;" />
                <x-input-error :messages="$errors->get('level')" class="mt-2" />
            </div>
            <!-- course_duration-->
            <div>
                <x-input-label for="course_duration" :value="__('Course duration')" />
                <x-text-input id="course_duration" class="block mt-1 w-full" type="text" name="course_duration"
                    :value="old('course_duration')" placeholder="4 years" required
                    style="padding: 1rem; border-radius: 8px; border: 2px solid #6a0dad;" />
                <x-input-error :messages="$errors->get('course_duration')" class="mt-2" />
            </div>
            <!-- course_price per anual -->
            <div>
                <x-input-label for="price" :value="__('Tuition fee(per anual)')" />
                <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')"
                    placeholder="M20,000.00" required style="padding: 1rem; border-radius: 8px; border: 2px solid #6a0dad;" />
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>
            <!-- amount of pre-requisites-->
            <div>
                <x-input-label for="pass" :value="__('Amount of Passes')" />
                <x-text-input id="pass" class="block mt-1 w-full" type="number" name="pass" :value="old('pass')"
                    style="padding: 1rem; border-radius: 8px; border: 2px solid #6a0dad;" />
                <x-input-error :messages="$errors->get('pass')" class="mt-2" />
            </div>
        </div>
        <div class="flex-1">
            <!-- subject to be passed to take the course -->
            <div>
                <x-input-label for="passed_subject" :value="__('Subjects to be passed')" />
                <x-text-input id="passed_subject" class="block mt-1 w-full" type="text" name="passed_subject"
                    :value="old('passed_subject')" placeholder="subjects with comma separated"
                    style="padding: 1rem; border-radius: 8px; border: 2px solid #6a0dad;" />
                <x-input-error :messages="$errors->get('passed_subject')" class="mt-2" />
            </div>
            <!-- amount of credits to apply for it-->
            <div>
                <x-input-label for="credit_amount" :value="__('Amount of Credits')" />
                <x-text-input id="credit_amount" class="block mt-1 w-full" type="number" name="credit_amount" :value="old('credit_amount')"
                    style="padding: 1rem; border-radius: 8px; border: 2px solid #6a0dad;" />
                <x-input-error :messages="$errors->get('credit_amount')" class="mt-2" />
            </div>
            <!-- subject to be credited to take the course -->
            <div>
                <x-input-label for="credits" :value="__('Credited Subjects')" />
                <x-text-input id="credits" class="block mt-1 w-full" type="text" name="credits" :value="old('credits')"
                    placeholder="subjects with comma separated" style="padding: 1rem; border-radius: 8px; border: 2px solid #6a0dad;" />
                <x-input-error :messages="$errors->get('credits')" class="mt-2" />
            </div>

            <!-- description -->
            <div>
                <x-input-label for="description" :value="__('Description')" />
                <textarea id="description" class="mt-1 w-full border-gray-300 rounded-md" type="text" name="description"
                    required autofocus style="padding: 1rem; border-radius: 8px; border: 2px solid #6a0dad;">{{old('description')}}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            <!-- Application requirements -->
            <div>
                <x-input-label for="requirements" :value="__('Application requirements')" />
                <textarea id="requirements" class="mt-1 w-full border-gray-300 rounded-md" type="text" name="requirements"
                     required autofocus style="padding: 1rem; border-radius: 8px; border: 2px solid #6a0dad;">{{old('requirements')}}</textarea>
                <x-input-error :messages="$errors->get('requirements')" class="mt-2" />
            </div>
        </div>
    </div>

    <div>
        <x-primary-button class="mt-3" style="background-color: #6a0dad; padding: 0.75rem 1.5rem; border-radius: 12px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease;">
            {{ __('Add Course') }}
        </x-primary-button>
    </div>
</form>
