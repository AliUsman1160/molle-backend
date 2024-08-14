<?php
namespace App\Http\Controllers;

use App\Models\EventType;
use Illuminate\Http\Request;

class EventtypeController extends Controller
{
    public function eventtype()
    {
        $events = EventType::all();
        return view('Admin.event-type.eventtype', [
            'events' => $events
        ]);
    }

    public function index(Request $request)
    {
        $columns = [
            1 => 'id',
            2 => 'name',
            3 => 'created_at',
        ];
        
        $totalData = EventType::count();
        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $orderColumnIndex = $request->input('order.0.column');
        $orderDir = $request->input('order.0.dir');

        $orderColumn = $columns[$orderColumnIndex] ?? 'created_at';
        $orderDirection = in_array($orderDir, ['asc', 'desc']) ? $orderDir : 'desc';

        if (empty($request->input('search.value'))) {
            $eventTypes = EventType::offset($start)
                ->limit($limit)
                ->orderBy($orderColumn, $orderDirection)
                ->get();
        } else {
            $search = $request->input('search.value');
            $eventTypes = EventType::where('id', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($orderColumn, $orderDirection)
                ->get();

            $totalFiltered = EventType::where('id', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->count();
        }

        $data = [];
        foreach ($eventTypes as $eventType) {
            $nestedData['id'] = $eventType->id;
            $nestedData['name'] = $eventType->name;
            $nestedData['created_at'] = $eventType->created_at ? $eventType->created_at->format('Y-m-d H:i:s') : 'N/A';
            $data[] = $nestedData;
        }

        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => intval($totalData),
            'recordsFiltered' => intval($totalFiltered),
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        if ($request->has('id') && $request->id) {
            $eventType = EventType::find($request->id);
            if ($eventType) {
                $eventType->name = $request->name;
                $eventType->save();
                return response()->json('updated');
            } else {
                return response()->json(['error' => 'Event Type not found'], 404);
            }
        } else {
            $eventType = new EventType();
            $eventType->name = $request->name;
            $eventType->save();
            return response()->json('created');
        }
    }

    public function show($id)
    {
        $eventType = EventType::find($id);
        if ($eventType) {
            return response()->json($eventType);
        } else {
            return response()->json(['error' => 'Event Type not found'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $eventType = EventType::find($id);
        if ($eventType) {
            $eventType->name = $request->name;
            $eventType->save();
            return response()->json('updated');
        } else {
            return response()->json(['error' => 'Event Type not found'], 404);
        }
    }

    public function destroy($id)
    {
        $eventType = EventType::find($id);
        if ($eventType) {
            $eventType->delete();
            return response()->json('deleted');
        } else {
            return response()->json(['error' => 'Event Type not found'], 404);
        }
    }
}
