@extends('layouts.app')

@section('content')

     <x-top />
    <x-skills />


    <section class="mt-8 mb-30">
        <h2 class="text-2xl font-light text-gray-800 mb-6 text-center custom-font">Наши услуги</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            <div class="bg-white shadow-md rounded-lg p-6 hover:shadow-lg transition-border pixel-corners box flex flex-col min-h-[200px]">
                <div>
                    <h3 class="text-xl font-light text-gray-800 mb-2 custom-font text-center">Как заплачено</h3>
                    <p class="text-gray-600 mb-4 pixel-font text-center">У нас все дешево и с соответсвующим качеством</p>
                </div>
                <a href="#" class="text-blue-600 hover:underline pixel-font mt-auto text-center">Узнать больше</a>
            </div>

            <div class="bg-white shadow-md rounded-lg p-6 hover:shadow-lg transition-border pixel-corners box flex flex-col min-h-[200px]">
                <div>
                    <h3 class="text-xl font-light text-gray-800 mb-2 custom-font text-center">Хуяк и в продакшн</h3>
                    <p class="text-gray-600 mb-4 pixel-font text-center">Работаем быстро,  поэтому извините</p>
                </div>
                <a href="#" class="text-blue-600 hover:underline pixel-font mt-auto text-center">Узнать больше</a>
            </div>

            <div class="bg-white shadow-md rounded-lg p-6 hover:shadow-lg transition-border pixel-corners box flex flex-col min-h-[200px]">
                <div>
                    <h3 class="text-xl font-light text-gray-800 mb-2 custom-font text-center">Так и нахуячено</h3>
                    <p class="text-gray-600 mb-4 pixel-font text-center">Непредсказуемые результаты каждый день</p>
                </div>
                <a href="#" class="text-blue-600 hover:underline pixel-font mt-auto text-center">Узнать больше</a>
            </div>
        </div>
    </section>
@endsection
