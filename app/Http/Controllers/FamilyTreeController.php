<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FamilyMember;
use Illuminate\Support\Facades\Auth;

class FamilyTreeController extends Controller
{
    public function __construct()
    
    { $this->middleware('auth'); }

    public function index()
    {
        $userId = Auth::id(); // Get the logged-in user's ID
        $families = FamilyMember::where('user_id', $userId)->get(); // Filter records by user_id
        return view('family-tree.index', compact('families'));
    }

    public function create()
    {
        $userId = Auth::id(); // Get the logged-in user's ID
        $families = FamilyMember::where('user_id', $userId)->get(); 
        return view('family-tree.create', compact('families'));
    }
    
    public function edit($id)
    {
        $userId = Auth::id(); 
        $family = FamilyMember::findOrFail($id);
        $families = FamilyMember::where('user_id', $userId)->get(); 
        return view('family-tree.edit', compact('family', 'families'));
    }
      
    public function store(Request $request)
    {
        $userId = Auth::id(); 
        $data = $request->validate([            
            'name' => 'required|string|max:255',
            'gender' => 'required|string',
            'father_id' => 'nullable|exists:family_members,id',
            'mother_id' => 'nullable|exists:family_members,id',
            'spouse_id' => 'nullable|exists:family_members,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Optional image upload validation
        ]);
    
        // Add the user_id to the validated data
        $data['user_id'] = $userId;         
    
        // Handle file upload
        if ($request->hasFile('image')) {
            // Create a directory named after the user's ID in the public storage folder
            $directoryPath = 'family_images/user_' . $userId;
            
            // Store the image in the user-specific folder, renaming the file with a timestamp to avoid conflicts
            $imagePath = $request->file('image')->storeAs($directoryPath, time() . '.' . $request->file('image')->getClientOriginalExtension(), 'public');
            
            // Store the image path in the data array for saving to the database
            $data['image'] = $imagePath; 
        }
    
        // Create the family member with the validated data
        FamilyMember::create($data);
    
        return redirect()->route('family-tree.index');
    }
       

    public function update(Request $request, $id)
    {
        $userId = Auth::id(); 
        $familyMember = FamilyMember::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|string',
            'father_id' => 'nullable|exists:family_members,id',
            'mother_id' => 'nullable|exists:family_members,id',
            'spouse_id' => 'nullable|exists:family_members,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Optional image upload validation
        ]);
        // Handle file upload
        if ($request->hasFile('image')) {
            // Create a directory named after the user's ID in the public storage folder
            $directoryPath = 'family_images/user_' . $userId;
            
            // Store the image in the user-specific folder, renaming the file with a timestamp to avoid conflicts
            $imagePath = $request->file('image')->storeAs($directoryPath, time() . '.' . $request->file('image')->getClientOriginalExtension(), 'public');
            
            // Store the image path in the data array for saving to the database
            $data['image'] = $imagePath; 
        }

        $familyMember->update($data);
        return redirect()->route('family-tree.index');
    }

    public function destroy($id)
    {
        $familyMember = FamilyMember::findOrFail($id);
        $familyMember->delete();
        return redirect()->route('family-tree.index');
    }
    
    public function show($id)
    {
        $familyMember = FamilyMember::with([
            'father', 
            'mother', 
            'spouse', 
            'children.spouse' // Load spouse of each child as well
        ])->findOrFail($id);       
        
        $familyTree = $this->buildFamilyTree($familyMember);    
         
        return view('family-tree.show', compact('familyTree'));
    }

    private function buildFamilyTree($member)
    {
        
        $familyTree = [
            'name' => $member->name,
            'gender' => $member->gender,
            'imag' => $member->image,
            'spouse' => $member->spouse ? $this->buildSpouseData($member->spouse) : null,
            'children' => []
        ];
    
        // Recursively add children to the family tree
        foreach ($member->children as $child) {
            $familyTree['children'][] = $this->buildFamilyTree($child);
        }
    
        return $familyTree;
    }
    
    private function buildSpouseData($spouse)
    {
        // Build and return spouse data structure
        return [
            'name' => $spouse->name,
            'gender' => $spouse->gender,
            'image' => $spouse->image,
        ];
    }
   
    public function showTree($id)
    {
        $familyMember = FamilyMember::with('children', 'spouse', 'father', 'mother')->find($id); // Example ID
        $familyTree = $this->buildFamilyTree($familyMember); // Assuming you have a method to structure the data        
        return view('family-tree.mytree', compact('familyTree'));
    }
  
    public function showTree1($id)
    {
        $familyMember = FamilyMember::with('children', 'spouse', 'father', 'mother')->find($id); // Example ID
        $familyTree = $this->buildFamilyTree($familyMember); // Assuming you have a method to structure the data        
        return view('family-tree.mytree1', compact('familyTree'));
    }
  
    
    
}
