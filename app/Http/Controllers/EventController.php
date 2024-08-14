<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function createEvent(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'event_type_id' => 'required|integer|exists:event_types,id',
            'created_by_user_id' => 'required|integer|exists:users,id',
            'image' => 'nullable|string|max:255',
            'start_time' => 'required|date_format:H:i:s',
            'end_time' => 'required|date_format:H:i:s',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'description' => 'nullable|string',
            'paid' => 'required|boolean',
            'amount' => 'required_if:paid,true|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'seat_limit' => 'nullable|integer',
        ]);

        $event = Event::create([
            'name' => $validatedData['name'],
            'event_type_id' => $validatedData['event_type_id'],
            'created_by_user_id' => $validatedData['created_by_user_id'],
            'image' => $validatedData['image'],
            'start_time' => $validatedData['start_time'],
            'end_time' => $validatedData['end_time'],
            'location' => $validatedData['location'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
            'description' => $validatedData['description'],
            'paid' => $validatedData['paid'],
            'amount' => $validatedData['amount'],
            'seat_limit' => $validatedData['seat_limit'],
        ]);

        return response()->json([
            'message' => 'Event created successfully',
            'result' => $event,
        ], 201);
    }

    public function Event(){
        $events = Event::all();
        return view('Admin.event.event', [
            'events'=> $events
        ]);
    }
    public function index(Request $request)
    {
        $columns = [
            1 => 'id',
            2 => 'name',
            3 => 'event_type_id',
            4 => 'created_by_user_id',
            5 => 'image',
            6 => 'start_time',
            7 => 'end_time',
            8 => 'location',
            9 => 'start_date',
            10 => 'end_date',
            11 => 'description',
            12 => 'paid',
            13 => 'amount',
            14 => 'seat_limit',
            15 => 'created_at',
        ];

        $totalData = Event::count();
        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $orderColumnIndex = $request->input('order.0.column');
        $orderDir = $request->input('order.0.dir');

        // Determine which column to order by
        $orderColumn = isset($columns[$orderColumnIndex]) ? $columns[$orderColumnIndex] : 'created_at';
        $orderDirection = in_array($orderDir, ['asc', 'desc']) ? $orderDir : 'desc';

        // If no search is applied
        if (empty($request->input('search.value'))) {
            // Apply default sorting by created_at descending if no other order specified
            $events = Event::offset($start)
                ->limit($limit)
                ->orderBy($orderColumn, $orderDirection)
                ->get();
        } else {
            // Apply search filter
            $search = $request->input('search.value');
            $events = Event::where('id', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->orWhere('location', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($orderColumn, $orderDirection)
                ->get();
            
            $totalFiltered = Event::where('id', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->orWhere('location', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = [];

        if (!empty($events)) {
            foreach ($events as $event) {
                $nestedData['id'] = $event->id;
                $nestedData['name'] = $event->name;
                $nestedData['event_type_id'] = $event->event_type_id;
                $nestedData['created_by_user_id'] = $event->created_by_user_id;
                $nestedData['image'] = $event->image;
                $nestedData['start_time'] = $event->start_time;
                $nestedData['end_time'] = $event->end_time;
                $nestedData['location'] = $event->location;
                $nestedData['start_date'] = $event->start_date;
                $nestedData['end_date'] = $event->end_date;
                $nestedData['description'] = $event->description;
                $nestedData['paid'] = $event->paid ? 'Yes' : 'No';
                $nestedData['amount'] = $event->amount;
                $nestedData['seat_limit'] = $event->seat_limit;
                $nestedData['created_at'] = $event->created_at->format('Y-m-d H:i:s');

                $data[] = $nestedData;
            }
        }

        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => intval($totalData),
            'recordsFiltered' => intval($totalFiltered),
            'data' => $data,
        ]);
    }

}
