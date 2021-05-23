<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request_form;
use Twilio\Rest\Client;

class BibleStudyController extends Controller
{
	public function requestForm(Request $request)
	{
		$url = "https://beta.ourmanna.com/api/v1/get/?format=json&order=random";
	    $data['verse'] = json_decode(file_get_contents($url), true);
	    return view('bible/request-form', $data);
	}

	public function addRequest(Request $request)
	{
		$request_form = new Request_form;

        $request_form->name = trim($request->first_name).' '.trim($request->last_name);
        $request_form->email = trim($request->email);
        $request_form->contact_no = trim($request->contact_no);
        $request_form->birthday = date('Y-m-d', strtotime($request->birthday));
        $request_form->religious_affiliation = trim($request->religious_affiliation);
        $request_form->bible_study_date_time = date('Y-m-d H:i:s', strtotime($request->bible_study_date.' '.$request->bible_study_time));
        $request_form->bible_study_location = $request->bible_study_location;
		$request_form->save();
		$this->sendMessage('Hello '.ucwords(trim($request->first_name).' '.trim($request->last_name)).',Your request has been successfully received and stored to our database.', trim($request->contact_no));
		return redirect('thank-you/'.$request_form->id);
	}

	public function thankYou($id)
	{
		if(empty($id)) abort(404);
		
		$data['r'] = Request_form::findOrFail($id);

		return view('bible/thank-you', $data);
	}

	private function sendMessage($message, $recipients)
	{
		$recipients = '+63'.str_replace("-", "", $recipients);
	    $account_sid = config("app.TWILIO_SID");
	    $auth_token = config("app.TWILIO_AUTH_TOKEN");
	    $twilio_number = config("app.TWILIO_NUMBER");
	    $client = new Client($account_sid, $auth_token);
	    $client->messages->create($recipients, 
	            ['from' => $twilio_number, 'body' => $message] );
	}

    public function getRequests(Request $request)
    {
        $columns = array(
            0 => 'request_forms.name',
            1 => 'request_forms.email',
            2 => 'request_forms.contact_no',
            3 => 'request_forms.birthday',
            4 => 'request_forms.religious_affiliation',
            5 => 'request_forms.bible_study_date_time',
            6 => 'request_forms.bible_study_date_time',
            7 => 'request_forms.bible_study_location',
        );

        $totalData = Request_form::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        if(empty($request->input('search.value')))
        {
            $posts = Request_form::offset($start)
			                        ->limit($limit)
			                        ->orderBy($order, $dir)
			                        ->get();
        }
        else {
            $search = $request->input('search.value');

            $posts =  Request_form::where(function($query) use ($search){
		                                $query->where('request_forms.name','LIKE',"%{$search}%");
		                                $query->orWhere('request_forms.email','LIKE',"%{$search}%");
		                                $query->orWhere('request_forms.contact_no','LIKE',"%{$search}%");
		                                $query->orWhere('request_forms.religious_affiliation','LIKE',"%{$search}%");
		                                $query->orWhere('request_forms.bible_study_location','LIKE',"%{$search}%");                               
		                            })
		                            ->offset($start)
		                            ->limit($limit)
		                            ->orderBy($order, $dir)
		                            ->get();

            $totalFiltered = Request_form::where(function($query) use ($search){
			                                $query->where('request_forms.name','LIKE',"%{$search}%");
			                                $query->orWhere('request_forms.email','LIKE',"%{$search}%");
			                                $query->orWhere('request_forms.contact_no','LIKE',"%{$search}%");
			                                $query->orWhere('request_forms.religious_affiliation','LIKE',"%{$search}%");
			                                $query->orWhere('request_forms.bible_study_location','LIKE',"%{$search}%");                               
			                            })
			                            ->offset($start)
			                            ->limit($limit)
			                            ->count();
        }

        $data = array();
        if(!empty($posts))
        {
            foreach ($posts as $post)
            {
            	$nestedData['name'] = $post->name;
                $nestedData['email'] = $post->email;
                $nestedData['contact_no'] = $post->contact_no;
                $nestedData['birthday'] = date('F j, Y ', strtotime($post->birthday));
                $nestedData['religious_affiliation'] = $post->religious_affiliation;
                $nestedData['bible_study_date'] = date('F j, Y ', strtotime($post->bible_study_date_time));
                $nestedData['bible_study_time'] = date('h:i A ', strtotime($post->bible_study_date_time));
                $nestedData['bible_study_location'] = $post->bible_study_location;  
                $data[] = $nestedData;

            }
        }

        $json_data = array(
                    "draw"            => intval($request->input('draw')),
                    "recordsTotal"    => intval($totalData),
                    "recordsFiltered" => intval($totalFiltered),
                    "data"            => $data
                    );

        echo json_encode($json_data);
    }
}
