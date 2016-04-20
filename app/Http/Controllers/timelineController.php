<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class timelineController extends Controller
{
    //
    public function gettimeline(Request $request)
    {
//        $validator = Validator::make($request->all(), [
//            'tags' => 'required',
//
//        ]);
//        if ($validator->fails()) {
//            return redirect('/')
//                ->withInput()
//                ->withErrors($validator);
//        }
        //Set tags name
        $tagsArray = $request->input('tags');
        $base = null;
        if(!empty($tagsArray)){
            $base = $this->getData($tagsArray);
        }

        if(!$base){
            $base = $this->getData(array('gobierno'));
        }
        if(!$base){
            return 'Server Error';
        }
        $json = $this->convertToTimelineFormat($base);
        return view('welcome', [
            'json' => json_encode($json),
        ]);
//        return $base;

        //
    }

    public function getData($tagsArray){
        //Config Server
        $server = 'http://www.erbol.com.bo/timeline/tags/';
        // Strip tags
        $div = '%2C';
        $tags = '';
        $last_tag = rawurlencode(array_pop($tagsArray));
        foreach ($tagsArray as $tag){
            $tags = $tags . rawurlencode($tag) . $div;
        }
        $tags=$tags . $last_tag;

        $offset = 10;
        $page = 1;
        $url = $server . $tags . "/$offset/$page.json";
// Get cURL resource
        $curl = curl_init();
// Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_USERAGENT => 'cURL Request'
        ));
// Send the request & save response to $resp
        $resp = curl_exec($curl);
// Close request to clear up some resources
        curl_close($curl);

        $base = json_decode($resp);

        if (!empty($base->result) && $base->result == "No encontrados.")
            return false;
        return $base;
    }

    public function convertToTimelineFormat ($base){

        $json = [];
        $events = [];

        $c = 0;
        foreach ($base as $row){
//            gmdate("Y-m-d\TH:i:s\Z", $row->created);
//            Handling Dates
//            $events[$c]['start_date']=date($row->created);
            $events[$c]['start_date']['year']=gmdate("Y", $row->created);
            $events[$c]['start_date']['month']=gmdate("m", $row->created);
            $events[$c]['start_date']['day']=gmdate("d", $row->created);

//            Handling Titles
            $events[$c]['text']['headline']=$row->title;
            $events[$c]['text']['text']=$row->lead;

//            Handling Media
            if(!empty($row->photo) && !is_array($row->photo)){
                $events[$c]['media']['url']=$row->photo;
                $events[$c]['media']['caption']=!empty($row->caption)?$row->caption :"";

            }


            $c++;
        }
        $json['events']=$events;
        return json_encode($json);

    }

    public function getTypeaheadTags(Request $request){
        $input = $request->all();
        $server = 'http://www.erbol.com.bo/taxonomy/autocomplete/field_tags/';
        $q= $input['q'];

        $url=$server.$q;

        // Get cURL resource
        $curl = curl_init();
// Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_USERAGENT => 'cURL Request'
        ));
// Send the request & save response to $resp
        $resp = curl_exec($curl);
// Close request to clear up some resources
        curl_close($curl);

        $format = array();
        $c=0;
        $resp = json_decode($resp);
        if (!empty($resp)){
            foreach ($resp as $row){
                $format[$c]['id']= $row;
                $format[$c]['name']= $row;
                $format[$c]['value']= $row;
                $c++;
            }
        }


        return json_encode($format);
    }

}
