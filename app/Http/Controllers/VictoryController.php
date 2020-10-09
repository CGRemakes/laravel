<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Victory;
use App\Http\Resources\Victory as VictoryResource;
use App\Http\Resources\VictoryCollection;

class VictoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new VictoryCollection(Victory::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'game_date' => 'required|date_format:Y-m-d',
            'byu_score' => 'required|integer',
            'utah_score' => 'required|integer',
        ]);
        
        $victory = Victory::create($request->all());
        
        return (new VictoryResource($victory))
                ->response()
                ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new VictoryResource(Victory::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'game_date' => 'required|date_format:Y-m-d',
            'byu_score' => 'required|integer',
            'utah_score' => 'required|integer',
        ]);
        
        try {
            $victory = Victory::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'errors' => sprintf('Invalid reference: %s', $id),
            ], 422);
        }
        
        $victory->game_date = $request->get('game_date');
        $victory->byu_score = $request->get('byu_score');
        $victory->utah_score = $request->get('utah_score');
        $victory->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $victory = Victory::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'errors' => sprintf('Invalid reference: %s', $id),
            ], 422);
        }
        
        $victory->delete();
    }
}
