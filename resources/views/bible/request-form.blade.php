<x-guest-layout>
    <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">
    
    <div class="m-5 p-6 border-2 border-solid flex hover:border-indigo-400 hover:bg-indigo-100 transition-colors duration-300">
        <div class="w-full">
            <p class="text-gray-600">"{{ $verse['verse']['details']['text'] }}"</p>
            <div class="text-gray-900 text-right font-bold uppercase mt-6">- {{ $verse['verse']['details']['reference'] }}</div>
            <div class="text-gray-600 text-right">({{ $verse['verse']['details']['version'] }})</div>
        </div>
    </div>
    <div class="m-5 p-5 border-2 rounded">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Information</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Use a permanent address where you can receive mail.
                    </p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="{{ route('request.add') }}" method="POST">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="first_name" class="block text-sm font-medium text-gray-700">First name</label>
                                    <input type="text" name="first_name" id="first_name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required="">
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
                                    <input type="text" name="last_name" id="last_name" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required="">
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="contact_no" class="block text-sm font-medium text-gray-700">Contact Number</label>
                                    <input type="text" name="contact_no" id="contact_no" class="text-center mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required="">
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="email_address" class="block text-sm font-medium text-gray-700">Email address</label>
                                    <input type="text" name="email" id="email_address" autocomplete="email" class="text-center mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required="">
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="birthday" class="block text-sm font-medium text-gray-700">Birthday</label>
                                    <input type="text" name="birthday" id="birthday" class="flatPickrDate text-center mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required="">
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="religious_affiliation" class="block text-sm font-medium text-gray-700">Religious Affiliation</label>
                                    <input type="text" name="religious_affiliation" id="religious_affiliation" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6">
                                    <label for="bible_study_location" class="block text-sm font-medium text-gray-700">Bible Study Location/Address</label>
                                    <input type="text" name="bible_study_location" id="bible_study_location" autocomplete="street-address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required="">
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="bible_study_date" class="block text-sm font-medium text-gray-700">Bible Study Date</label>
                                    <input type="text" name="bible_study_date" id="bible_study_date" class="flatPickrDate text-center mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required="">
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="bible_study_time" class="block text-sm font-medium text-gray-700">Bible Study Time</label>
                                    <input type="text" name="bible_study_time" id="bible_study_time" class="flatPickrTime text-center mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required="">
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Request
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script src="{{ asset('js/flatpickr.js') }}"></script>
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#contact_no').mask('0000-000-0000');
        $(".flatPickrDate").flatpickr({
            altInput: true,
            allowInput: false,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        });

        $(".flatPickrTime").flatpickr({
            altInput: true,
            allowInput: false,
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
        });
    });
</script>
</x-guest-layout>
