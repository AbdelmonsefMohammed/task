<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\ProductAdded;
use App\Product;
use App\Http\Requests\ProductRec;
use App\Http\Requests\ProductUpdateRec;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('welcome')->with('products', Product::all());
    }

    public function fetch_data(Request $request)
    {
        if($request->ajax())
        {
            $data = Product::all();
            echo json_encode($data);
        }
    }

    public function store(ProductRec $request)
    {
        
        $request->validated();
        $main_image=$request->file('main_image');
        $main_image_name= time() . $main_image->getClientOriginalName();
        $main_image->move(public_path() . '/images', $main_image_name);



        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->main_image = $main_image_name;

        if($request->hasfile('multiple_image'))
        {
            foreach ($request->file('multiple_image') as $image) {
                $name = time() . 'SubImage' . $image->getClientOriginalName();
                $image->move(public_path() . '/images', $name);
                $data[] = $name;
            }
            $product->multiple_image = json_encode($data);
        }

        $product->description = $request->description;
        $product->save();

        //send mail
        Mail::to('abdomohammed929@gmail.com')
        ->send(new ProductAdded());


        return response()->json([
            'success' => true,
            'message' => 'Product Created successfully',
        ]);

    }

    public function update(ProductUpdateRec $request, Product $product)
    {
        $request->validated();

        $product->name = $request->name;
        $product->price = $request->price;

        if($request->hasfile('main_image')){
            if($product->main_image){       
                //remove old photo
                unlink('images/' . $product->main_image); 
            }
            $main_image=$request->file('main_image');
            $main_image_name= time() . $main_image->getClientOriginalName();
            $main_image->move(public_path() . '/images', $main_image_name);

            $product->main_image = $main_image_name;
        }
        if($request->hasfile('multiple_image'))
        {
            if($product->multiple_image){       
                //remove old photo
                foreach (json_decode($product->multiple_image) as $image)
                {
                    unlink('images/' . $image); 
                }  
            }
            foreach ($request->file('multiple_image') as $image) {
                $name = time() . 'SubImage' . $image->getClientOriginalName();
                $image->move(public_path() . '/images', $name);
                $data[] = $name;
            }
            $product->multiple_image = json_encode($data);
        }

        $product->description = $request->description;
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product Updated successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product Deleted Successfully');
    }
}
