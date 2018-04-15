<?php

namespace App\Http\Controllers\Api\Events;

use App\Http\Controllers\Controller;
use App\Http\Resources\HackathonResource;
use App\Models\Hackathon;
use Illuminate\Http\Request;

class HackathonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\Http\Response
     */
    public function index()
    {
        $hackathons = Hackathon::all();

        return HackathonResource::collection($hackathons);
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
     * @param  \App\Models\Hackathon  $hackathon
     * @return \Illuminate\Http\Response
     */
    public function show(Hackathon $hackathon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hackathon  $hackathon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hackathon $hackathon)
    {
        //
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
}
