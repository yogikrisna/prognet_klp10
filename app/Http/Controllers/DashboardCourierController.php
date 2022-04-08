<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courier;

class DashboardCourierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // $kurirs=Courier::all();
        // return view ('kurir.index', compact('kurirs')) ->name('kurir');

        return view('kurir.index', [
            "title" => "All Posts",
            // "posts" => Post::all()
            "active" => "Posts",
            "kurirs" => Courier::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kurir.create', [
            'title' => 'Created',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'courier' => 'required|max:100',
        ]);


        $courier = Courier::create($validateData);

        return redirect('/admin/kurir')->with('success', 'new post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('kurir.show', [
            'title' => 'Detail kurir',
            'kurir' => Courier::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kurirs = Courier::find($id);
        return view('kurir.edit', [
            'kurir' => $kurirs,
            'title' => 'Edit kurir',
            ]);
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
         // dd($request->kurir_id);
         $rules = [
            'courier' => 'required|max:100',
        ];

        $validateData = $request->validate($rules);

        Courier::find($id)->update($validateData);

        return redirect('/admin/kurir/')->with('success', 'Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $courier = Courier::find($id); 
        $courier->delete();
        // return ProductCategoriesDetails::destroy($kategori->id);

        return redirect('/admin/kurir')->with('success', 'Post has been deleted!');
    }
}
