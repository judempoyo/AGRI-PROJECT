<x-app-layout>

    <section class="bg-gray-50 py-8 antialiased dark:bg-gray-900 md:py-12">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">

            <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">

                @foreach ($deposits as $deposit)

                <div
                    class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <a href="{{ URL::to('/deposit/'.$deposit->id) }}">
                        <div class="h-56 w-full">


                            <img class="mx-auto h-full dark:hidden"
                                src="{{ asset('storage/images/uploads/deposits/'.$deposit->image)}}"
                                alt="{{ $deposit->image }}" />
                            <img class="mx-auto hidden h-full dark:block"
                                src="{{ asset('storage/images/uploads/deposits/'.$deposit->image)}}"
                                alt="{{ $deposit->image }}" />

                        </div>


                        <div class="pt-6">
                            <P class="text-2xl font-semibold leading-tight text-gray-900 dark:text-white">
                                {{$deposit->name}}
                            </P>
                            <P class="text-sm font-semibold leading-tight text-gray-900 dark:text-white">
                                {{$deposit->adress.' / '.$deposit->country}}
                            </P>
                            <P class="text-sm font-semibold leading-tight text-gray-900 dark:text-white">
                                {{$deposit->area.' m'}}<sup>2</sup>
                            </P>

                        </div>
                    </a>
                </div>

                @endforeach

            </div>

        </div>

    </section>


</x-app-layout>