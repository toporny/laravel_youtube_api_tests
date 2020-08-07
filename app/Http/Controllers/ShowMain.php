<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alaouy\Youtube\Facades\Youtube;

class ShowMain extends Controller
{

    public function detailpage(Request $request)
    {
		$data['movie_id'] = isset($request->movie_id) ? $request->movie_id : "";
		$data['page_token'] = isset($request->page_token) ? $request->page_token : "";
		$data['search_query'] = isset($request->search) ? $request->search : "";
		$data['movie_id'] = isset($request->movie_id) ? $request->movie_id : " ";
    	return view('pages.detailpage', $data);
    }

    public function mainpage(Request $request)
    {

		$page_token = isset($request->page_token) ? $request->page_token : "";
		$search_query = isset($request->search_query) ? $request->search_query : "";

		$params = [
			'q'             => $search_query,
			'type'          => 'video',
			'part'          => 'id, snippet',
			'maxResults'    => 12,
			'pageToken'		=> $page_token
		];


		$search = Youtube::searchAdvanced($params, true); // Google api call

		#$search = unserialize (file_get_contents("serialized_object.txt")); //mockup for development pourposes

		$search += ['prev_page_token' => $search['info']['prevPageToken'],
					'next_page_token' => $search['info']['nextPageToken'],
					'search_query'    => $search_query,
					'page_token'       => $page_token
					];
        return view('pages.phprequest', $search);
    }
}
