<?php

namespace app\Http\Controllers\admin;

use App\Models\airtimecon;
use App\Models\big;
use App\Models\data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController
{
public function index()
{
    $product=data::paginate(50);

    return view('admin/product', compact('product'));
}
    public function index1()
    {
        $product=big::paginate(50);

        return view('admin/product1', compact('product'));
    }
public function on(Request $request)
{
    $product = data::where('id', $request->id)->first();

    if ($product->status == "1") {
        $give = "0";
    } else {
        $give = "1";
    }
    $product->status = $give;
    $product->save();

    return redirect('admin/product')->with('success', 'Product update successfully');

}
    public function on1(Request $request)
    {
        $product = big::where('id', $request->id)->first();

        if ($product->status == "1") {
            $give = "0";
        } else {
            $give = "1";
        }
        $product->status = $give;
        $product->save();

        return redirect('admin/product1')->with('success', 'Product update successfully');

    }
public function in(Request $request)
{

    $pro=data::where('id', $request->id)->first();

return view('admin/editproduct', compact('pro'));
}
    public function in1(Request $request)
    {

        $pro=big::where('id', $request->id)->first();

        return view('admin/editproduct1', compact('pro'));
    }
public function edit(Request $request)
{
    $request->validate([
        'id' => 'required',
        'amount' => 'required',
        'tamount' => 'required',
        'ramount' => 'required',
        'name' => 'required',
    ]);
    $pro=data::where('id', $request->id)->first();
    $pro->plan=$request->name;
    $pro->amount=$request->amount;
    $pro->tamount=$request->tamount;
    $pro->ramount=$request->ramount;
    $pro->save();
    return redirect('admin/product')->with('success', 'Product update successfully');

}
    public function edit1(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'amount' => 'required',
            'tamount' => 'required',
            'ramount' => 'required',
            'name' => 'required',
        ]);
        $pro=big::where('id', $request->id)->first();
        $pro->plan=$request->name;
        $pro->amount=$request->amount;
        $pro->tamount=$request->tamount;
        $pro->ramount=$request->ramount;
        $pro->save();
        return redirect('admin/product1')->with('success', 'Product update successfully');

    }


public function air()
{
    $air=DB::table('airtimecons')->get();

    return view('admin/air', compact("air"));
}

public function pair(Request $request)
{
    $air = airtimecon::where('id', $request->id)->first();
    if ($air->status == 1){
        $na= '0';
    }elseif ($air->status == 0){
        $na='1';
    }

    $air->status=$na;
    $air->save();

    return redirect('admin/air')->with('status', 'Server update successfully');

}
function checkrenoproduct()
{

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://renomobilemoney.com/api/listdata',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'apikey: RENO6568c029b7bc56.58727119'
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return $response;
    $data=json_decode($response, true);

}


}
