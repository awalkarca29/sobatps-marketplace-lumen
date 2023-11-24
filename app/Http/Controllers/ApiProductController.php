<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductShow;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ApiProductController extends Controller
{
    public function indexCategory()
    {
        $category = Category::all();
        return response()->json($category, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::latest()->get();

        if ($request['search_category']) {
            $searchCategory = $request['search_category'];
            $products = Product::where('category_id', 'like', '%' . $searchCategory . '%')->latest()->get();
        }

        if ($request['search_product']) {
            $searchProduct = $request['search_product'];
            $products = Product::where('title', 'like', '%' . $searchProduct . '%')->latest()->get();
        }

        foreach ($products as $key => $val) {
            $products[$key]['category_id'] = json_decode($val['category_id']);
        }

        return response()->json($products, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'source' => 'required',
            'function' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'image' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        $user = auth()->guard('api')->user();

        $product = $user->products()->create([
            'category_id' => request('category_id'),
            'title' => request('title'),
            'description' => request('description'),
            'source' => request('source'),
            'function' => request('function'),
            'stock' => request('stock'),
            'published_at' => date("Y-m-d H:i:s"),
            'price' => request('price'),
        ]);

        $filename = "";
        if ($request->hasFile('image')) {
            $filename = $request->file('image')->store('product-images', 'public_uploads');
        }
        $product->image = $filename;
        $product->save();

        return response()->json($product, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::find($id);

        if ($products === null) {
            return response()->json([
                "success" => false,
                "message" => "Product not found.",
            ], 404);
        }

        return response()->json(new ProductShow($products), 200);
    }

    public function updateProduct(Request $request, $id)
    {
        $validator = Validator::make(request()->all(), [
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'source' => 'required',
            'function' => 'required',
            'stock' => 'required',
            'price' => 'required',
            'isSold' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        $user = auth()->guard('api')->user();
        $product = Product::find($id);

        if ($product === null) {
            return response()->json([
                "success" => false,
                "message" => "Product not found.",
            ], 404);
        }

        if ($user->id != $product->user_id) {
            return response()->json([
                "success" => false,
                "message" => "You're not the owner of the product!",
            ], 403);
        }

        if ($request->hasFile('image')) {
            if ($product->image) {
                $destination = public_path('img/' . $product->image);
                if (File::exists($destination)) {
                    File::delete($destination);
                }
            }
            $filename = $request->file('image')->store('product-images', 'public_uploads');
            $product->image = $filename;
        }

        $product->category_id = $request->category_id;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->source = $request->source;
        $product->function = $request->function;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->isSold = $request->isSold;
        $product->save();

        return response()->json($product, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = auth()->guard('api')->user();
        $product = Product::find($id);

        if ($product === null) {
            return response()->json([
                "success" => false,
                "message" => "Product not found.",
            ], 404);
        }

        if ($user->id != $product->user_id) {
            return response()->json([
                "success" => false,
                "message" => "You're not the owner of the product!",
            ], 403);
        }

        if ($product->image) {
            $destination = public_path('img/' . $product->image);
            if (File::exists($destination)) {
                File::delete($destination);
            }
        }

        $product->delete();

        return response()->json([
            "success" => true,
            "message" => "Successfully deleted",
        ], 200);
    }
}
