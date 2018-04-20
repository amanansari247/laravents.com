<?php

namespace App\Http\Controllers\Api\Events;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hackathons\CreateRequest;
use App\Http\Resources\HackathonResource;
use App\Models\Hackathon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class HackathonController extends Controller
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
        $hackathons = (new Hackathon)
            ->whereIsApproved(true)
            ->orderByDesc('created_at')
            ->paginate($perPage);

        return HackathonResource::collection($hackathons);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return HackathonResource|\Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $hackathon = Hackathon::create([
            'user_id' => $request->get('user_id'),
            'title' => $request->get('title'),
            'website' => $request->get('website'),
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

        return HackathonResource::make($hackathon);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hackathon  $hackathon
     * @return HackathonResource|\Illuminate\Http\Response
     */
    public function show(Hackathon $hackathon)
    {
        return HackathonResource::make($hackathon);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hackathon  $hackathon
     * @return HackathonResource|\Illuminate\Http\Response
     */
    public function update(Request $request, Hackathon $hackathon)
    {
        $hackathon->update([
            'user_id' => $request->get('user_id'),
            'title' => $request->get('title'),
            'website' => $request->get('website'),
            'description' => $request->get('description'),
        ]);

        if ($request->has('live_stream')) {
        }

        return HackathonResource::make($hackathon);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hackathon  $hackathon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hackathon $hackathon)
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

            return url('/') . '/storage/' . $file_name;
        }
    }
}
