<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Respon;
use App\Models\ProductReview;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ResponsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add_response($review)
    {
        $response = Respon::where('review_id','=',$review)->get();
        if (!$response->isEmpty()) {
            // dd($response);
        //    return redirect()->intended(route('response.edit',['response'=>$response[0]]));
        }
        $product_review = ProductReview::where('id','=',$review)->with('user','product')->get();
        $admin = Auth::user();
     
        //$admin_id=1;
        return view('admin.respons.addrespons',compact('product_review','admin'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'content' => ['required'],
        ]);

        $response = new Respon();
        $response->review_id = $request->review_id;
        $response->admin_id = $request->admin_id;
        $response->content = $request->content;

        $review = ProductReview::find($request->review_id);
        $user = User::find($review->user_id);
        if ($response->save()) {
            //Notif Admin
            $admin = Admin::find(1);
            $data = [
                'nama'=> 'Admin',
                'message'=>'Response dikirim!',
                'id'=> $review->product_id,
                'category' => 'review'
            ];
            $data_encode = json_encode($data);
            $admin->createNotif($data_encode);

            //Notif User
            $data = [
                'nama'=> $user->user_name,
                'message'=>'Review diresponse!',
                'id'=> $review->product_id,
                'category' => 'review'
            ];
            $data_encode = json_encode($data);
            $user->createNotifUser($data_encode);
        // $response->save();
        return redirect('/products');

        
    }
    // public function edit($id)
    // {
    //     $response = Respon::find($id);
    //     $product_review = ProductReview::where('id', '=', $response->review_id)->with('user', 'product')->get();
    //     $admin = Auth::user();
    //     $content = $response->content;
    //     return view('response.editresponse', compact('product_review', 'admin','response','content'));
    // }
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'content' => ['required'],
    //     ]);

    //     $response=new Respon();
    //     $response=Respon::find($id);
    //     $response->review_id = $request->review_id;
    //     $response->admin_id = $request->admin_id;
    //     $response->content = $request->content;
    //     $response->save(); 
    //     return redirect("/products");
    // }
}
}