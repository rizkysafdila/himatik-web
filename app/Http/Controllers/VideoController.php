<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Http;

class VideoController extends Controller
{
    public function index(Request $request)
    {
        if (isset($request->search)) {
            $videos = $this->_videoList($request->search);
        } else {
            $videos = $this->_videoList('himatik pnl');
        }
        return view('videos', [
            'title' => 'All Videos',
            "videos" => $videos
        ]);
    }

    public function show($id)
    {
        $singleVideo = $this->_singleVideo($id);
        return view('video', [
            'title' => 'Detail Video',
            "video" => $singleVideo
        ]);
    }

    protected function _videoList($keywords)
    {
        $part = 'snippet';
        $country = 'ID';
        $apiKey = config('services.youtube.api_key');
        $maxResult = 12;
        $youTubeEndPoint = config('services.youtube.search_endpoint');
        $type = 'video';

        $url = "$youTubeEndPoint?part=$part&maxResults=$maxResult&regionCode=$country&type=$type&key=$apiKey&q=$keywords";
        $response = Http::get($url);
        $result = json_decode($response);
        FacadesFile::put(storage_path() . '/app/public/result.json', $response->body());
        return $result;
    }

    protected function _singleVideo($id)
    {
        $apiKey = config('services.youtube.api_key');
        $part = 'snippet';
        $url = "https://www.googleapis.com/youtube/v3/videos?part=$part&id=$id&key=$apiKey";

        $response = HTTP::get($url);

        $result = json_decode($response);

        FacadesFile::put(storage_path() . '/app/public/single.json', $response->body());

        return $result;
    }
}
