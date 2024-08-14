<?php

namespace App\Http\Controllers\laravel_example;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class UserManagement extends Controller
{
  /**
   * Redirect to user-management view.
   *
   */

   
  public function UserManagement()
  {
    $users = User::all();
    $userCount = $users->count();
    $verified = null;
    $notVerified = null;
    $usersUnique = $users->unique(['email']);
    $userDuplicates = $users->diff($usersUnique)->count();

    return view('content.laravel-example.user-management', [
      'totalUser' => $userCount,
      'verified' => $verified,
      'notVerified' => $notVerified,
      'userDuplicates' => $userDuplicates,
    ]);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $columns = [
      1 => 'id',
      2 => 'fullname',
      3 => 'email',
      4 => 'phone_number',
      5 => 'gender',
      6 => 'username',
      7 => 'phone_verified',
      8 => 'is_verified',
      9 => 'image',
      10 => 'email_verified_at',
      11 => 'is_blocked',
    ];

    $totalData = User::count();
    $totalFiltered = $totalData;

    $limit = $request->input('length');
    $start = $request->input('start');
    $order = $columns[$request->input('order.0.column')];
    $dir = $request->input('order.0.dir');

    if (empty($request->input('search.value'))) {
      $users = User::offset($start)
        ->limit($limit)
        ->orderBy($order, $dir)
        ->get();
    } else {
      $search = $request->input('search.value');

      $users = User::where('id', 'LIKE', "%{$search}%")
        ->orWhere('fullname', 'LIKE', "%{$search}%")
        ->orWhere('email', 'LIKE', "%{$search}%")
        ->orWhere('phone_number', 'LIKE', "%{$search}%")
        ->orWhere('gender', 'LIKE', "%{$search}%")
        ->orWhere('username', 'LIKE', "%{$search}%")
        ->offset($start)
        ->limit($limit)
        ->orderBy($order, $dir)
        ->get();

      $totalFiltered = User::where('id', 'LIKE', "%{$search}%")
        ->orWhere('fullname', 'LIKE', "%{$search}%")
        ->orWhere('email', 'LIKE', "%{$search}%")
        ->orWhere('phone_number', 'LIKE', "%{$search}%")
        ->orWhere('gender', 'LIKE', "%{$search}%")
        ->orWhere('username', 'LIKE', "%{$search}%")
        ->count();
    }

    $data = [];

    if (!empty($users)) {
      $ids = $start;

      foreach ($users as $user) {
        $nestedData['id'] = $user->id;
        $nestedData['fake_id'] = ++$ids;
        $nestedData['fullname'] = $user->fullname;
        $nestedData['email'] = $user->email;
        $nestedData['phone_number'] = $user->phone_number;
        $nestedData['gender'] = $user->gender;
        $nestedData['username'] = $user->username;
        $nestedData['phone_verified'] = $user->phone_verified;
        $nestedData['is_verified'] = $user->is_verified;
        $nestedData['image'] = $user->image;
        $nestedData['email_verified_at'] = $user->email_verified_at;
        $nestedData['is_blocked'] = $user->is_blocked;

        $data[] = $nestedData;
      }
    }

    return response()->json([
      'draw' => intval($request->input('draw')),
      'recordsTotal' => intval($totalData),
      'recordsFiltered' => intval($totalFiltered),
      'code' => 200,
      'data' => $data,
    ]);
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
    $userID = $request->id;

    if ($userID) {
      // update the value
      $users = User::updateOrCreate(
        ['id' => $userID],
        ['fullname' => $request->fullname, 'email' => $request->email]
      );

      // user updated
      return response()->json('Updated');
    } else {
      // create new one if email is unique
      $userEmail = User::where('email', $request->email)->first();

      if (empty($userEmail)) {
        $users = User::updateOrCreate(
          ['id' => $userID],
          [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => bcrypt(Str::random(10))
          ]
        );

        // user created
        return response()->json('Created');
      } else {
        // user already exists
        return response()->json(['message' => "already exists"], 422);
      }
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $where = ['id' => $id];

    $users = User::where($where)->first();

    return response()->json($users);
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
    //
  }


  public function updateStatus(Request $request, $id)
  {
      // Validate input
      $validator = Validator::make($request->all(), [
          'is_blocked' => 'required',
      ]);
  
      if ($validator->fails()) {
          return response()->json(['message' => 'The is_blocked field must be true or false.'], 400);
      }
  
      // Find user
      $user = User::find($id);
      
      if (!$user) {
          return response()->json(['message' => 'User not found.'], 404);
      }
  
      // Update block status
      $isBlocked = $request->input('is_blocked') ? 1 : 0; // Convert boolean to integer
      $user->is_blocked = $isBlocked;
      $user->save();
  
      return response()->json(['message' => 'User status updated successfully.']);
  }
  


  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $users = User::where('id', $id)->delete();
  }
}
