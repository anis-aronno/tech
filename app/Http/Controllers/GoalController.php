<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;
use Hash;
use App\Models\Goal;
use Validator;
use Image;


class GoalController extends Controller
{
     public function __construct()
     {
        $this->middleware('auth:administration');
     }

	 public function index(Request $request)
     {
	 	$allgoal = Goal::orderBy('id','desc')->get();
    	return view('admin.goal.index',compact('allgoal'));
     }


    public function create()
    {
        return view('admin.goal.create');
    }

    public function store(Request $request)
    {
		$validator = Validator::make($request->all(), [
			 'name' => ['required', 'string', 'max:255'],
             'image' => ['required|image']
		]);


		if ($request->hasFile('image')) {
            if($request->file('image')->isValid()) {
                try {
                    $file = $request->file('image');
                    $savedFileName = 'goal_'.time() . '.' . $file->getClientOriginalExtension();    

					$pathLarge = public_path('uploads/goal/'.$savedFileName);
          			$this->imageResize($file,$pathLarge,$savedFileName, 700, null);

                } catch (Illuminate\Filesystem\FileNotFoundException $e) {
              }
            }
        }
        else{
            $savedFileName = '';
         }


        $m = new Goal;
		$m->name = $request->name;
		$m->details = $request->details;
		$m->image = $savedFileName;
		$m->status = $request->status;
        $m->created_at = date('Y-m-d H:i:s');
        $m->updated_at = date('Y-m-d H:i:s');
        $m->save();

        return redirect('administration/goal');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $goal = Goal::find($id);
        return view('admin.goal.edit',compact('goal'));

    }

    public function update(Request $request, $id)
    {
		$validator = Validator::make($request->all(), [
			 'name' => ['required', 'string', 'max:255'],
       'image' => ['required|image']
		]);


		if ($request->hasFile('image')) {
            if($request->file('image')->isValid()) {
                try {
                    $file = $request->file('image');
                    $savedFileName = 'goal_'.time() . '.' . $file->getClientOriginalExtension();    

					$pathLarge = public_path('uploads/goal/'.$savedFileName);
          			$this->imageResize($file,$pathLarge,$savedFileName, 700, null);

                } catch (Illuminate\Filesystem\FileNotFoundException $e) {
              }
            }
        }
        else{
            $savedFileName = $request->stillthumb;
         }


        $goal = Goal::find($id);
        $menuUpdate = array(
			'name'=>  $request->name,
			'details'=>  $request->details,
			'image'=>  $savedFileName,
			'status'=>  $request->status,
			'updated_at'=> date('Y-m-d H:i:s')
		 );

        $goal->update($menuUpdate);
        return redirect('administration/goal');
    }

    public function destroy($id)
    {
        $menuItem = Goal::find($id);
        $menuItem->delete();
        return redirect('administration/goal');
    }

	public function imageResize($file, $path, $filename, $width, $height)
	{
		//$img = Image::make($file)->resize($width, $height)->save($path, $filename, 100);

		$img = Image::make($file);
		$img->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });

        $img->resizeCanvas($width, $height, 'center', false, array(255, 255, 255, 0));
		$img->save($path);
	}

}
