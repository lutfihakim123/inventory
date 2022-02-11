<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Intervention\Image\Facades\Image;
use app\Models\Items;


class ItemsController extends Controller
{
    public function index() // fucntion Show Data
    {
        return Items::latest()->paginate(1);
    }

    public function store(Request $request) // function store new data 
    {
        $this->validate($request,[
            'item_name' => 'required|string|max:191',
            'unit' => 'required|string|max:191',
            'stock' => 'required|string|max:191',
            'price' => 'required|string|max:191',
            'image' => 'required',
        ]);

        if($request->image){ // save photo to folder image
            $name = time().'.' . explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
            Image::make($request->image)->save(public_path('img/public').$name);
            $request->merge(['image' => $name]);

           
        }

        Items::create($request->all());

        return ['message' => 'Success'];

        }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id) // function edit data
    {
        $upload = Items::find($id);

        $this->validate($request,[
            'item_name' => 'required|string|max:191',
            'unit' => 'required|string|max:191',
            'stock' => 'required|string|max:191',
            'price' => 'required|string|max:191',
            'image' => 'required',
        ]);

        $currentPhoto = $upload->photo;

        if($request->photo != $currentPhoto){

            $name = time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];
            Image::make($request->photo)->save(public_path('img/profile/').$name);
            $request->merge(['photo' => $name]);

            $userPhoto = public_path('img/public/').$currentPhoto;

            if(file_exists($userPhoto)){

                @unlink($userPhoto);
                
            }
           
        }

        $upload->update($request->all());

        return ['message' => 'Success'];
    }

    public function destroy($id) // delete record
    {
        $upload = Items::findOrFail($id);

        $upload->delete();

        $currentPhoto = $upload->photo;

        $userPhoto = public_path('img/public/').$currentPhoto; // delete photo 

        if(file_exists($userPhoto)) {

            @unlink($userPhoto);
                
        }

        return [
         'message' => 'Photo deleted successfully'
        ];
    }
}
