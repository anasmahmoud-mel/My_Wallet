<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Product;
use App\User;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{

    public function index()
    {

        return view('product.welcome');
    }

    public function uploadpage()
    {

        return view('product.product');
    }

    public function store(Request $request)
    {

        $request->validate([
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048',
            'name' => 'required',
            'description' => 'required',
            
        ]);
        $data = new product();


        $file = $request->file;

        $filename = time() . '.' . $file->getClientOriginalExtension();

        $request->file->move('assets', $filename);

        $data->file = $filename;


        $data->name = $request->name;
        $data->description = $request->description;


        $data->save();
        return redirect()->back()->with('success', 'File has been uploaded.')
            ->with('product', $data);
        //  return view('product.showproduct');

    }


    public function show()
    {

        $data = product::all();
        return view('home.index', compact('data'));
    }
    public function showdash()
    {

        $file = product::all();
        return view('dashboard_view.file.index', compact('file'));
    }


    public function download(Request $request, $file)
    {


        return response()->download(public_path('assets/' . $file));
    }



    public function view($id)
    {
        $data = Product::find($id);

        return view('product.viewproduct', compact('data'));
    }

    public function search(Request $request)
    {

        $search_text = $request->get('search');

        $file = DB::table('products')->where('name', 'like', '%' . $search_text . '%')->paginate(5);
        // $file = DB::table('users')->where('username', 'like', '%' . $search_text . '%')->paginate(5);

        // am trying to redirect to another page when result not found(false) but i cant ....

        //return view('layouts.partials.search',['file' => $file]);
        return view('layouts.partials.search', compact('file'));
    }

    public function  viewdash($id)
    {
        $data = Product::find($id);

        return view('dashboard_view.file.view', compact('data'));
    }
    public function delete_file(Request $request)
    {
        $booking = DB::table('products')->where('id', $request->id)->delete();
        return response()->json(
            [
                'success' => true,
                'message' => 'Data Deleted'
            ]
        );
        return redirect('/Dashboard/File/Show');
    }
    public function getdata()
    {
        $user = User::find(1);

        $products = $user->products;

        dd($products);
    }
}
