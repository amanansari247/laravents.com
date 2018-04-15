<?php

namespace App\Http\Controllers\Api\Events;

use App\Http\Controllers\Controller;
use App\Http\Resources\ConferenceResource;
use App\Models\Conference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ConferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->query('perPage');
        $conferences = (new Conference)->orderByDesc('created_at')->paginate($perPage);

        return ConferenceResource::collection($conferences);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return ConferenceResource|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file_data = $request->input('header_image');
        $file_name = 'image_'.time().'.png';
        @list($type, $file_data) = explode(';', $file_data);
        @list(, $file_data) = explode(',', $file_data);

        if($file_data!="") {
            Storage::disk('public')->put($file_name, base64_decode($file_data));

            $img = Image::make('storage/' . $file_name);
//
        }

        $conference = Conference::create([
            'user_id' => 1,
            'title' => $request->get('title'),
            'website' => $request->get('website'),
            'ticket_url' => $request->get('ticket_url'),
            'description' => $request->get('description'),
            'header_image' => 'storage/' . $file_name,
            'lat' => $request->get('lat'),
            'lon' => $request->get('lon'),
            'address' => $request->get('address'),
            'country' => $request->get('country'),
            'city' => $request->get('city'),
            'state' => $request->get('state'),
        ]);

        return ConferenceResource::make($conference);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Conference  $conference
     * @return \Illuminate\Http\Response
     */
    public function show(Conference $conference)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Conference  $conference
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conference $conference)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Conference  $conference
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conference $conference)
    {
        //
    }

    public function createImageFromBase64(Request $request){

    }
}
