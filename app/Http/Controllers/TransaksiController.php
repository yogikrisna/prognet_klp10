<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\User;
use App\Models\Admin;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\ProductCategory;

use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use App\Models\UserNotification as ModelsUserNotification;
use App\Notifications\UserNotification;
use App\Notifications\AdminNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class TransaksiController extends Controller
{
  
    public function index()
    {
        // $transaksi = Transaksi::with('user')->where(['user_id', '=', Auth::user()->id])->get();
        // // $produk = TransaksiDetail::with('product')->where(['user_id', '=', Auth::user()->id])->get();
        // return view('transaksi.mytransaksi', compact('transaksi'));
        $user_id = Auth::id();
        $transaksi = Transaksi::with('user')->where('user_id', $user_id)->orderBy('created_at', 'DESC')->get();
        return view('transaksi.mytransaksi', compact('transaksi'));
    }
    public function adminIndex()
    {
        $transactions = Transaksi::with('user')->orderBy('created_at', 'DESC')->get();
        $title = "All Posts";
        $active = "Posts"; 
        // return $transactions;
        return view('transaksi.admin.transaksi', compact('title', 'active','transactions'));
      
    }


    public function detail($id){
         $title ="Kelompok 21 - Toko Sepatu";
         $kategori = ProductCategory::all();  
         $transaksi = Transaksi::with('transaction_details', 'transaction_details.product')->find($id);
        return view('transaksi.checkout.checkout-detail')->with(compact('transaksi','title','kategori'));
        //  return $transaksi;
    }

    public function upload_pembayaran($id, Request $request){
        // dd($request);
        $user = User::where('id', '=', Auth::user()->id)->get()->first();
        $admin = Admin::all();

        $gambar = $request->gambar;
        $name = 'produk_' . time() . '.' . $gambar->getClientOriginalExtension();
        $transaksi = Transaksi::where('id','=', $id)->first();  
        $transaksi->proof_of_payment = $name;
        $transaksi->update();

        Storage::disk('asset')->put('assets/images/'.$name, file_get_contents($request->file('gambar')));

        $admin = Admin::find(1);
        $data = [
            'nama'=> $user->user_name,
            'message'=>'mengupload bukti pembayaran!',
            'id'=> $request->transaction_id,
            'category' => 'transaction'
        ];
        $data_encode = json_encode($data);
        $admin->createNotif($data_encode);

        //Notif User
        $data = [
            'nama'=> $user->user_name,
            'message'=>'Bukti pembayaran diupload!',
            'id'=> $request->transaction_id,
            'category' => 'transaction'
        ];
        $data_encode = json_encode($data);
        $user->createNotifUser($data_encode);
        return back();
        // return $transaksi;
    }

    public function upload_review_user($id, Request $request){
        
        $i = 0;
        $j = 0;
        $k = 0;
        $user = User::where('id', '=', Auth::user()->id)->get()->first();
        $admin = Admin::all();
        foreach($request->product_id as $pp){
            foreach($request->rate as $rate){
                $temp = (int)$rate;
                foreach($request->content as $content){
                    if($i == $j && $i==$k)
                    ProductReview::create([
                        'product_id' => $pp,
                        'user_id' => Auth::user()->id,
                        'rate' => $temp,
                        'content' => $content,
                    ]);

                    $transaksi = Transaksi::where('id', '=', $id)->first();
                    $transaksi->is_review = 1;
                    $transaksi->update();
                    $k++;
                }
                $j++;
            }$i++;
            
        }
        $admin = Admin::find(1);
            $data = [
                'nama'=> $user->user_name,
                'message'=>'mereview product!',
                'id'=> $id,
                'category' => 'review'
            ];
            $data_encode = json_encode($data);
            $admin->createNotif($data_encode);

            //Notif User
            $data = [
                'nama'=> $user->user_name,
                'message'=>'Review dikirimkan!',
                'id'=> $id,
                'category' => 'review'
            ];
            $data_encode = json_encode($data);
            $user->createNotifUser($data_encode);
        return back();
    }
    public function checkout(){
       
        // $kategori = ProductCategory::all();
        $user = User::where('id', '=', Auth::user()->id)->get()->first();
        $admin = Admin::all();  
        $carts = Cart::with('product')->where([['user_id', '=', Auth::user()->id],['status','=', 'notyet']])->get();
        

        // $user->notify(new UserNotification ('Checkout Berhasil'));
        // $admin->notify(new AdminNotification ('Terdapat Checkout Baru'));

        $admin = Admin::find(1);
        $data = [
            'nama'=> Auth::user()->user_name,
            'message'=>'melakukan transaksi!',
            // 'id'=> $transaksi_id,
            'category' => 'transaction'
        ];
        $data_encode = json_encode($data);
        $admin->createNotif($data_encode);

        //Notif User
        // $user = User::find($transaksi->user_id);
        $data = [
            'nama'=>Auth::user()->user_name,
            'message'=>'Upload bukti pembayaran!',
            // 'id'=>$transaksi_id,
            'category' => 'transaction'
        ];
        $data_encode = json_encode($data);
        $user->createNotifUser($data_encode);

        return view('transaksi.checkout.detail-trans',compact( 'carts'));
        // return $carts;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  
    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            "address" => "required",
            "regency" => "required",
            "province" => "required",
            "shipping_cost" => "required",
            "courier_id" => "required",
            // 'products' => "required",
        ]);
        $date = Carbon::now('Asia/Makassar');

        $carts = Cart::with('product')->where([['user_id', '=', Auth::user()->id],['status','=', 'notyet']])->get();
        $temp_subtotal=0;
        $temp_total_weight=0;
        foreach($carts as $dd){
            $temp_subtotal=$temp_subtotal+($dd->product->price*$dd->qty);
            $temp_total_weight=$temp_total_weight+$dd->product->weight*$dd->qty;
        }
        
        $timeout = $date->addHours(24);
        $transaksi = Transaksi::create([
            'timeout' => $timeout,
            'address' => $request->address,
            'regency' => $request->regency,
            'province' => $request->province,
            'total' => $temp_subtotal+$request->shipping_cost,
            'shipping_cost' => $request->shipping_cost,
            'sub_total' => $temp_subtotal,
            'user_id' => Auth::user()->id,
            'courier_id' => $request->courier_id,
            'proof_of_payment' => null,
            'status' => 'unverified'
        ]);

        $i=0;

        foreach($carts as $dd){
            $trx_detail = TransaksiDetail::create([
                'transaction_id' => $transaksi->id,
                'product_id' => $dd->product->id,
                'qty' => $dd->qty,
                'discount_id' => NULL,
                'selling_price' => $dd->product->id
            ]);

            Cart::where('product_id', $dd->product->id)
                ->where('user_id', Auth::user()->id)->where('status', 'notyet')
                ->update([
                    'status' => 'checkedout'
                ]);
        }
        // return $transaksi;
        return redirect()->route('transaksi.detail', $transaksi->id);
    }
    
   
    public function adminDetail($id)
    {
        $transactions = Transaksi::where('id', $id)->get();
        return view('transaksi.admin.detail', compact('transactions', 'id'));
    }

    public function adminApprove($id)
    {
        Transaksi::where('id', $id)
                ->update([
                    'status' => 'verified'
                ]);
        $user = User::where('id', '=', Auth::user()->id)->get()->first();
        $admin = Admin::all();
        $transaction = Transaksi::where('id', $id)->first();
        $transaction_detail = TransaksiDetail::where('transaction_id', $id)->get();
        $user = User::find($transaction->user_id);

        foreach ($transaction_detail as $detail) {
            $product = Product::where('id', $detail->product_id)->first();
            Product::where('id', $detail->product_id)
                ->update([
                    'stock' => $product->stock - $detail->qty
            ]);
        }

        $admin = Admin::find(1);
        $data = [
            'nama'=> $user->user_name,
            'message'=>'Pesanan terverifikasi!',
            'id'=> $id,
            'category' => 'transaction'
        ];
        $data_encode = json_encode($data);
        $admin->createNotif($data_encode);

        //Notif User
        $data = [
            'nama'=> $user->user_name,
            'message'=>'Pesanan terverifikasi!',
            'id'=> $id,
            'category' => 'approved'
        ];
        $data_encode = json_encode($data);
        $user->createNotifUser($data_encode);
        return redirect('/admin/transactions');
    }

    public function adminDelivered($id)
    {
        $transaction = Transaksi::where('id', $id)->first();
        $user = User::find($transaction->user_id);
        $usern = User::where('id', '=', Auth::user()->id)->get()->first();
        $admin = Admin::all();
        Transaksi::where('id', $id)
                ->update([
                    'status' => 'delivered'
                ]);
                
        $admin = Admin::find(1);
        $data = [
            'nama'=> $user->user_name,
            'message'=>'Pesanan dikirim!',
            'id'=> $id,
            'category' => 'transaction'
        ];
        $data_encode = json_encode($data);
        $admin->createNotif($data_encode);

        //Notif User
        $data = [
            'nama'=> $user->user_name,
            'message'=>'Pesanan dikirim!',
            'id'=> $id,
            'category' => 'delivered'
        ];
        $data_encode = json_encode($data);
        $user->createNotifUser($data_encode);
        return redirect('/admin/transactions');
    }

    public function adminCanceled($id)
    {
        $transaction = Transaksi::where('id', $id)->first();
        $user = User::find($transaction->user_id);
        $usern = User::where('id', '=', Auth::user()->id)->get()->first();
        $admin = Admin::all();
        Transaksi::where('id', $id)
                ->update([
                    'status' => 'canceled'
                ]);
        
                $admin = Admin::find(1);
                $data = [
                    'nama'=> 'Admin',
                    'message'=>'membatalkan pesanan!',
                    'id'=> $id,
                    'category' => 'transaction'
                ];
                $data_encode = json_encode($data);
                $admin->createNotif($data_encode);
        
                //Notif User
                $data = [
                    'nama'=> $user->user_name,
                    'message'=>'Pesanan dibatalkan!',
                    'id'=> $id,
                    'category' => 'canceled'
                ];
                $data_encode = json_encode($data);
                $user->createNotifUser($data_encode);   

        return redirect('/admin/transactions');
    }

    public function adminExpired($id)
    {
        $transaction = Transaksi::where('id', $id)->first();
        $user = User::find($transaction->user_id);
        $usern = User::where('id', '=', Auth::user()->id)->get()->first();
        $admin = Admin::all();
        Transaksi::where('id', $id)
                ->update([
                    'status' => 'expired'
                ]);

        //Notif Admin
        $admin = Admin::find(1);
        $data = [
            'nama'=> $user->user_name,
            'message'=>'Pesanan expired!',
            'id'=> $id,
            'category' => 'transaction'
        ];
        $data_encode = json_encode($data);
        $admin->createNotif($data_encode);

        //Notif User
        $data = [
            'nama'=> $user->user_name,
            'message'=>'Pesanan expired!',
            'id'=> $id,
            'category' => 'expired'
        ];
        $data_encode = json_encode($data);
        $user->createNotifUser($data_encode); 

        return redirect('/admin/transactions');
    }

    public function transactionsTimeout($id)
    {
        $transaction = Transaksi::where('id', $id)->first();
        $user = User::find($transaction->user_id);
        $usern = User::where('id', '=', Auth::user()->id)->get()->first();
        $admin = Admin::all();
        Transaksi::where('id', $id)
                ->update([
                    'status' => 'expired'
                ]);

                $admin = Admin::find(1);
                $data = [
                    'nama'=> $user->user_name,
                    'message'=>'Pesanan expired!',
                    'id'=> $id,
                    'category' => 'transaction'
                ];
                $data_encode = json_encode($data);
                $admin->createNotif($data_encode);
        
                //Notif User
                $data = [
                    'nama'=> $user->user_name,
                    'message'=>'Pesanan expired!',
                    'id'=> $id,
                    'category' => 'expired'
                ];
                $data_encode = json_encode($data);
                $user->createNotifUser($data_encode); 
        
        return redirect('/users/cartTransaksi');
    }

    public function userSuccess($id)
    {
        $transaction = Transaksi::where('id', $id)->first();
        $user = User::find($transaction->user_id);
        $usern = User::where('id', '=', Auth::user()->id)->get()->first();
        $admin = Admin::all();
        Transaksi::where('id', $id)
                ->update([
                    'status' => 'success'
                ]);
        
        $admin = Admin::find(1);
        $data = [
            'nama'=> $user->user_name,
            'message'=>'Pesanan diterima!',
            'id'=> $id,
            'category' => 'transaction'
        ];
        $data_encode = json_encode($data);
        $admin->createNotif($data_encode);

        //Notif User
        $data = [
            'nama'=> $user->user_name,
            'message'=>'Pesanan diterima!',
            'id'=> $id,
            'category' => 'success'
        ];
        $data_encode = json_encode($data);
        $user->createNotifUser($data_encode);
        
        // return $transaction;
        return redirect('/cartTransaksi');
    }

    public function userCanceled($id)
    {
        $transaction = Transaksi::where('id', $id)->first();
        $user = User::find($transaction->user_id);
        $usern = User::where('id', '=', Auth::user()->id)->get()->first();
        $admin = Admin::all();
        Transaksi::where('id', $id)
                ->update([
                    'status' => 'canceled'
                ]);
                $admin = Admin::find(1);
                $data = [
                    'nama'=> $user->user_name,
                    'message'=>'membatalkan pesanan!',
                    'id'=> $id,
                    'category' => 'transaction'
                ];
                $data_encode = json_encode($data);
                $admin->createNotif($data_encode);
        
                //Notif User
                $data = [
                    'nama'=> $user->user_name,
                    'message'=>'Pesanan dibatalkan!',
                    'id'=> $id,
                    'category' => 'canceled'
                ];
                $data_encode = json_encode($data);
                $user->createNotifUser($data_encode);
        return redirect('/cartTransaksi');
        // return $transaction;
    }
}
