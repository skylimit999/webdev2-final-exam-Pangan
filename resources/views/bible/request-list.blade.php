<x-guest-layout>
<link rel="stylesheet" href="{{ asset('third-party/datatables/datatables.min.css') }}">
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto mb-2 py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            {{ __('Bible Study Requests') }}
        </h2>
    </div>
</header>
<div class="py-2">
    <div class="w-full mx-auto sm:px-2">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">            
            <div class="px-4 pb-8 mt-3 rounded shadow bg-white">
				<table id="bibleRequestTbl" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em; font-size:.75rem;">
					<thead>
						<tr>
							<th class="whitespace-nowrap align-middle" data-priority="1">Name</th>
							<th class="whitespace-nowrap align-middle" data-priority="1">Email</th>
							<th class="whitespace-nowrap align-middle" data-priority="2">Contact Number</th>
							<th class="whitespace-nowrap align-middle" data-priority="3">Birthday</th>
							<th class="whitespace-nowrap align-middle" data-priority="4">Religious Affiliation</th>
							<th class="whitespace-nowrap align-middle" data-priority="5">Date</th>
							<th class="whitespace-nowrap align-middle" data-priority="6">Time</th>
							<th class="whitespace-nowrap align-middle" data-priority="7">Location</th>
						</tr>
					</thead>
					<tbody>
					</tbody>

				</table>
			</div>
        </div>
    </div>
</div>
<script src="{{ asset('third-party/datatables/datatables.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var bibleRequestTbl = $("#bibleRequestTbl").DataTable({
            "processing": true,
            "serverSide": true,
            "order": [[ 0, "desc" ]],
            "ajax":{
                "url": "{{ route('request.list') }}",
                "dataType": "json",
                "type": "POST",
                "data": function (data){
                    data._token = "{{ csrf_token() }}";
                }
            },
            "columns": [
                { "data": "name", "orderable": true, "className":"text-nowrap text-center" },
                { "data": "email", "orderable": false, "className":"text-nowrap text-center" },
                { "data": "contact_no", "orderable": false, "className":"text-nowrap text-center" },
                { "data": "birthday", "orderable": false, "className":"text-nowrap text-center " },
                { "data": "religious_affiliation", "orderable": false, "className":"text-nowrap text-right" },
                { "data": "bible_study_date", "orderable": false, "className":"text-nowrap text-center " },
                { "data": "bible_study_time", "orderable": false, "className":"text-nowrap text-center " },
                { "data": "bible_study_location", "orderable": false, "className":"text-nowrap text-center " },
            ],
            "dom": 'fTrtp<"bottom"><"clear">',
            "drawCallback": function ( settings ) {

            }
        });
        $("#bibleRequestTbl_processing").html(loadingForm);
    });
</script>
</x-guest-layout>