<x-app-layout>
    <div >
        <form x-on:submit.prevent="validateExchangeRate" x-data="{ exchangeRate: '',confirmation :'', modelOpen: false, exchangeRateError: false }">
            <div>
                <label for="exchange_rate" class="block text-sm text-gray-700 capitalize dark:text-gray-200">exchange_rate
                </label>
                <input type="text" name='exchange_rate' x-model="exchangeRate" id="exchangeRate"
                    class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
            </div>

            <div x-data="{ modelOpen: false }">
                <button @click="modelOpen =!modelOpen"
                    class="flex items-center justify-center px-3 py-2 space-x-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                            clip-rule="evenodd" />
                    </svg>

                    <span>Confirm</span>
                </button>

                <div>
                    <p  class="text-red-500">Exchange rates do not match!</p>

                </div>


                <div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title"
                    role="dialog" aria-modal="true">
                    <div
                        class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                        <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                            x-transition:enter="transition ease-out duration-300 transform"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-200 transform"
                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                            class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"></div>

                        <div x-cloak x-show="modelOpen" x-transition:enter="transition ease-out duration-300 transform"
                            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave="transition ease-in duration-200 transform"
                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl">
                            <div class="flex items-center justify-between space-x-4">
                                <h1 class="text-xl font-medium text-gray-800 ">Ixxxxxx</h1>

                                <button @click="modelOpen = false"
                                    class="text-gray-600 focus:outline-none hover:text-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </button>
                            </div>

                            <p class="mt-2 text-sm text-gray-500 ">
                                confirm ..
                            </p>

                            <div class="mt-5">
                                <div>
                                    <label for="confirm_exchange_rate"
                                        class="block text-sm text-gray-700 capitalize dark:text-gray-200">confirm_exchange_rate
                                    </label>
                                    <input type="text" x-model="confirmation" name='confirm_exchange_rate'
                                        id='confirmation'  x-on:blur="validateExchangeRate"
                                        class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                                </div>


                                <div x-show="exchangeRateError">
                                    <p class="text-red-500">Exchange rates do not match!</p>
                                </div>


                                <div class="flex justify-end mt-6">
                                    <button type="submit"  x-on:submit.prevent="validateExchangeRate" 
                                        class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50 " 
                                        x-bind:disabled="!confirmation || confirmation.trim() === '' || exchangeRateError"
                                        :class="{ 'opacity-50': !confirmation || confirmation.trim() === '' || exchangeRateError}">
                                        confirm
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





        </form>
    </div>

    {{-- <div x-data="{ open: false }" x-init="$watch('open', value => console.log(value))">
        <button @click="open = ! open">Toggle Open</button>
    </div> --}}




</x-app-layout>



<script>


        function validateExchangeRate() {
            console.log(this.exchangeRate);
            console.log(this.confirmation,'confirm');
            if (this.exchangeRate != this.confirmation) {
                console.log("not equal", this.exchangeRateError);
                this.exchangeRateError = true;
            } else {
                console.log("false", this.exchangeRateError);
                this.exchangeRateError = false;
            }
        }

</script>
