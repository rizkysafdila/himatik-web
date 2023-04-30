<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Http;

class DashboardVideoController extends Controller
{
    public function index()
    {
        $videos = $this->_videoList('himatik pnl');
        return view('dashboard.videos.index', [
            'title' => 'All Videos',
            "videos" => $videos
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
}
