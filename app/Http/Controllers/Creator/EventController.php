<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateData($request);
        $data = $request->all();
        $data['created_by'] = Auth::id();
        $event = Event::create($data);
        return empty($event) ? redirect()->back()->with('Fail', 'Failed to create event')
            : redirect()->back()->with('Success', 'Created new event ' . $request->title);
    }

    private function validateData($request)
    {
        return $request->validate([
            'title' => 'required',
            'description' => 'required',
            'event_date' => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pages = 'event';
        $event = Event::findOrFail($id);

        $events = Event::all()->except($id)->pluck('id');
        $guestList = User::whereNotIn('id', function ($query) use ($events) {
            $query->select('user_id')->from('event_user')
                ->whereNotIn('event_id', $events);
        })->where('role_id', 3)->get();

        return view('event.detailEvent', compact( 'event', 'guestList'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
//        $event = Event::findOrFail($id);
//        $event->update($request->all());
//        return redirect()->back()->with('Success', 'Event #' . $id . '-' . $event->title . ' Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        $event = Event::findOrFail($id);
//        $title = $event->title;
//        $event->delete();
//        return redirect()->back()->with('Success', 'Deleted Event #' . $id . '-' . $title);
    }
}
