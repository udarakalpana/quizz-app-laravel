<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Total Question {{$totalQuestionsCount}} / Correct Answered {{$correctAnswersCount}}
        </h2>
    </x-slot>

    <div class="max-w-7xl mt-4 mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

            @if(session('message'))
                <div>{{session('message')}}</div>
            @endif

            <div class="grid grid-cols-3 p-6 text-gray-900">

                @foreach($questions as $question)
                    <div
                        class="max-w-sm m-2 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                        <form action="{{route('answer-for-question', [$question->id])}}" method="POST">
                            @csrf
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{$question->question}}
                            </h5>

                            @foreach($question->answers as $index => $answer)
                                <div class="m-4">
                                    <input type="radio" name="answer" id="answer" value="answer{{$index + 1}}">
                                    <label for="answer">{{$answer->answer}}</label>
                                </div>

                            @endforeach

                            <button type="submit"
                                    class="dark-btn">
                                Answer
                            </button>

                        </form>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>
