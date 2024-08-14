<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class DocumentController extends Controller
{
    public function store(Request $request)
    {
        try {
            $user = $request->user();
            $user_id = $user->id;

            $validatedData = $request->validate([
                'document_front' => 'required|string',
                'document_back' => 'required|string',
                'is_reject' => 'boolean',
            ]);

            // Check if a non-rejected document already exists for the user
            $existingDocument = Document::where('user_id', $user_id)
                ->where('is_reject', 0)
                ->first();

            if ($existingDocument) {
                return response()->json([
                    'message' => 'A non-rejected document already exists for this user.',
                    'result' => false
                ], 409); // Conflict status code
            }

            // Add user_id to validated data
            $validatedData['user_id'] = $user_id;

            // Create new document record
            $document = Document::create($validatedData);

            return response()->json([
                'message' => 'Document created successfully.',
                'result' => $document
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation error.',
                'result' => false,
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while creating the document.',
                'result' => false
            ], 500);
        }
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $documents = Document::where('user_id', $id)->get();
        // dd($user, $documents);
        return view('Admin.document.document', compact('user', 'documents'));
    }

    public function updateStatus(Request $request, $id)
    {
        // Validate input
        $request->validate([
            'is_reject' => 'required|boolean',
        ]);
    
        // Find the document
        $document = Document::findOrFail($id);
    
        // Update the document's is_reject field
        $document->is_reject = $request->is_reject;
        $document->save();
    
        // Find the associated user
        $user = User::find($document->user_id);
        
        if ($user) {
            if($request->is_reject == 0){
                
                $user->is_verified = true;
            }else{
                $user->is_verified = false;

            }
          
            $user->save();
        }
    
        return response()->json([
            'message' => $request->is_reject ? 'Document rejected successfully.' : 'Document approved successfully.'
        ]);
    }
    
    

    
}
