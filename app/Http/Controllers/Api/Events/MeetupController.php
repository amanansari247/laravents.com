<?php

namespace App\Http\Controllers\Api\Events;

use App\Http\Controllers\Controller;
use App\Http\Resources\MeetupResource;
use App\Models\Meetup;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meetup  $meetup
     * @return \Illuminate\Http\Response
     */
    public function show(Meetup $meetup)
    {
        //
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
}
