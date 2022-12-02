<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ImageController extends Controller
{
    public function index()
    {
        return view('product.product');
    }
    public function manage()
    {
        return view('dashboard.dashboard',['files' => Product::all()]);
    }
    public function store(Request $request)
    {
        $files = [];
        if ($request->file('image'))
        {
            $i=1;
            foreach($request->file('image') as $key => $image)
            {
                $imageName = time().$i++.'.'.$image->extension();
                $image->move(public_path('uploads'), $imageName);
                $files[]['image'] = $imageName;
            }
        }
        foreach ($files as $key => $file)
        {
            Product::create($file);
        }
        return redirect('dashboard')->with('success','You have successfully upload file.');
    }

    public function deleteImage(Request $request)
    {
        $file = Product::find($request->image_id);
        if($request->image_id)
        {
            unlink('uploads/'.$file->image);
        }
        $file->delete();
        return back();
    }
    public function editImage($id)
    {
        return view('product.edit',[
            'files' => Product::find($id)
        ]);
    }
    public function updateImage(Request $request)
    {
        $i=1;
        $files = Product::find($request->image_id);
        $image = $request->file('image');
        $imageName = time().$i++.'.'.$image[0]->extension();
        $image[0]->move(public_path('uploads'), $imageName);
        if ($request->file('image')){
                unlink('uploads/'.$files->image);
        }
        $files->image = $imageName;
        $files->save();
        return redirect('dashboard')->with('success','You have successfully upload file.');
    }
}
