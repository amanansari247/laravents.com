<?php

namespace App\Http\Controllers\Api\Events;

use App\Http\Controllers\Controller;
use App\Http\Resources\MeetupResource;
use App\Models\Meetup;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class MeetupController extends Controller
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
        $meetups = (new Meetup)->orderByDesc('created_at')->paginate($perPage);

        return MeetupResource::collection($meetups);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return MeetupResource|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $meetup = Meetup::create([
            'user_id' => $request->user()->id,
            'title' => $request->get('title'),
            'website' => $request->get('website'),
            'meetup_url' => $request->get('meetup_url'),
            'description' => $request->get('description'),
            'header_image' => $this->createImageFromBase64($request),
            'lat' => $request->get('lat'),
            'lon' => $request->get('lon'),
            'address' => $request->get('address'),
            'country' => $request->get('country'),
            'city' => $request->get('city'),
            'state' => $request->get('state'),
            'start_date' => Carbon::parse(vsprintf('%s %s', [
                $request->get('start_date'),
                $request->get('start_time'),
            ])),
            'end_date' => Carbon::parse(vsprintf('%s %s', [
                $request->get('end_date'),
                $request->get('end_time'),
            ])),
        ]);

        if ($request->has('live_stream')) {
        }

        return MeetupResource::make($meetup);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meetup  $meetup
     * @return MeetupResource|\Illuminate\Http\Response
     */
    public function show(Meetup $meetup)
    {
        return MeetupResource::make($meetup);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meetup  $meetup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meetup $meetup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meetup  $meetup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meetup $meetup)
    {
        //
    }

    /**
     * @param Request $request
     * @return string
     */
    public function createImageFromBase64(Request $request)
    {
        $file_data = $request->input('header_image');
        $file_name = 'image_'.time().'.png';
        @list($type, $file_data) = explode(';', $file_data);
        @list(, $file_data) = explode(',', $file_data);

        if ($file_data!="") {
            Storage::disk('public')->put($file_name, base64_decode($file_data));

            $img = Image::make('storage/' . $file_name);

            return url('/') . 'storage/' . $file_name;
        }
    }
}
