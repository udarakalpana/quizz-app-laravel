<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="mt-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form class="w-3/4" method="POST" action="{{route('add-question')}}">
                        @csrf
                        <div class="mb-5">
                            <label for="question" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Question</label>
                            <input type="text" name="question" id="question" class="text-input" required />
                        </div>
                        <div class="mb-5">
                            <label for="answer1" class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Answer 1</label>
                            <input type="text" id="answer1" name="answer1" class="text-input" required />

                            <input id="correct" name="correct" type="radio" value="answer1" class="radio-input" />
                            <label for="correct" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Correct</label>
                        </div>
                        <div class="mb-5">
                            <label for="answer2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Answer 2</label>
                            <input type="text" id="answer2" name="answer2" class="text-input" required />

                            <input id="correct" name="correct" type="radio" value="answer2" class="radio-input" />
                            <label for="correct" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Correct</label>
                        </div>
                        <div class="mb-5">
                            <label for="answer3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Answer 3</label>
                            <input type="text" id="answer3" name="answer3" class="text-input" required />

                            <input id="correct" name="correct" type="radio" value="answer3" class="radio-input" />
                            <label for="correct" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Correct</label>
                        </div>
                        <div class="mb-5">
                            <label for="answer4" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Answer 4</label>
                            <input type="text" id="answer4" name="answer4" class="text-input" required />

                            <input id="correct" name="correct" type="radio" value="answer4" class="radio-input" />
                            <label for="correct" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Correct</label>
                        </div>

                        <button type="submit" class="dark-btn">Create Question</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
