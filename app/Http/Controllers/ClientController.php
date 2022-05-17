<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Cart;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use App\Mail\OrderConfirmationMail;
use App\Mail\ReceiveOrderMail;
use Mail;
use Carbon\Carbon;

class ClientController extends Controller
{

    
    /**
     * Store purchase temp and return redirect url
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout(Request $request)
    {
        
        // create response array and temp_items array
        $response = array('response' => '', 'success' => false, 'links' => '');
        // $temp_items = array('sku' => '', 'itemName' => '', 'qty' => '', 'color' => '', 'uPrice' => '', 'currency' => '');

        // get item data from post url
        $temp_items = $request->get('Items');


        // push temp data into session
        session()->put('checkout_detail', [
            'BuyerMail' => $request->get('BuyerMail'),
            'NumberOfItem' => $request->get('NumberOfItem'),
            'TotalAmount' => $request->get('TotalAmount'),
            'OwnerMail' => $request->get('OwnerMail'),
            'ProgressID' => $request->get('ProgressID'),
            'Items' => $temp_items,
        ]);

        // get session data and add temp data to response array
        //$temp_data = $request->session()->get('checkout_detail');

        // redirect link
        $url  = route('checkout.confirm');
 
        // set data into response
        //$response['response'] = [ "data" => ''];
        
       // $response['success'] = true;
        
        $responseUrl = json_encode($url, JSON_UNESCAPED_SLASHES);

        $response['link'] = $responseUrl;
        // return response
        //return Response::json($response, 201);
        
        $response ="Success\n". $responseUrl;
        // return redirect route
        
         return $response;
    }

    /**
     * Store purchase info and response
     *
     * @return \Illuminate\Http\Response
     */
    public function purchase(Request $request)
    {
        $rules = [
            'BuyerMail' => 'required|email',
            'OrderConfirm' => 'required|string',
            'MobileNumber' => 'required|numeric',
            'DeliveringLocation' => 'required|string',
            'ProgressID' => 'required|string',
        ];

        // create response array and temp_items array
        $response = array('response' => '', 'success' => false);

        // make validation of input requesets
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            $response['response'] = $validator->messages();
        }else {

            // check on purchase confirmation Y or N
            if($request->get('OrderConfirm') == 'Y') {

                // save all requests into temporary variable
                $temp_purchase = $request->all();

                if($request->session()->has('checkout_detail')){

                    // generate order number and add to response
                    $orderNumber = $this->generateOrderNumber();

                    // get checkout entry from session 
                    $checkout_details = $request->session()->get('checkout_detail');

              
                    // get buyer ID and name
                    $buyerId = User::where('email', $temp_purchase['BuyerMail'])->pluck('id')->first();
                    $buyerName = User::where('email', $temp_purchase['BuyerMail'])->pluck('name')->first();
                    
                    //store order info into database
                    $order = new Order();
                    $order->order_number = $orderNumber;
                    $order->user_id = $buyerId;
                    $order->subtotal = $checkout_details['TotalAmount'];
                    $order->grand_total = $checkout_details['TotalAmount'];
                    $order->name = $buyerName;
                    $order->email = $temp_purchase['BuyerMail'];
                    $order->phone = $temp_purchase['MobileNumber'];
                    $order->address1 = $temp_purchase['DeliveringLocation'];
                    $order->order_status = 'pending';
                    $order->save();
                    
                    $itemarr = [];
        
                    if($order){
                        $orderedItemsStr = $checkout_details['Items'];
                        
                        $itemsarr =  explode(',', $orderedItemsStr);
                        
                        $result = array_filter($itemsarr);
                        
                    
                        $itemsArray = [];
                        if(isset($result)){
                        	foreach($result as $single_item){
                        	$item = explode(':', $single_item);
                        	array_push($itemsArray, $item);
                        }

                        if(count($itemsArray) > 1 ){
                            foreach($itemsArray as $key => $item){
                                $productId = Product::where('sku', $item[0])->pluck('product_id')->first();
                                
                                if(isset($productId)){
                                    $orderItem = new OrderItem();
                                    $orderItem->product_id = $productId;
                                    $orderItem->order_id = $order->order_id;
                                    $orderItem->price = $item[3];
                                    $orderItem->quantity = $item[2];
                                    $orderItem->save();
                                }else{
                                    // Store product if the item not exist on database
                                    $product = new Product();
                                    $product->product_name =  $item[1];
                                    $product->sku =  $item[0];
                                    $product->short_description = "MP Item";
                                    $product->quantity = $item[2];
                                    $product->price = $item[3];
                                    $product->save();


                                    $orderItem = new OrderItem();
                                    $orderItem->product_id = $product->product_id;
                                    $orderItem->order_id = $order->order_id;
                                    $orderItem->price = $item[3];
                                    $orderItem->quantity = $item[2];
                                    $orderItem->save();
                                }

                            }
                 
                            
                        }else{
                            foreach($itemsArray as $item){
                            $productId = Product::where('sku', $item[0])->pluck('product_id')->first();
                                if(isset($productId)){
                                    $orderItem = new OrderItem();
                                    $orderItem->product_id = $productId;
                                    $orderItem->order_id = $order->order_id;
                                    $orderItem->price = $item[3];
                                    $orderItem->quantity = $item[2];
                                    $orderItem->save();
                                }else {
                                    $orderItem = new OrderItem();
                                    $orderItem->product_id = 1;
                                    $orderItem->order_id = $order->order_id;
                                    $orderItem->price = $item[3];
                                    $orderItem->quantity = $item[2];
                                    $orderItem->save();
                                }
                            }
    
                        }

                    }//check if order save is okay

                    //add order number to purchase array
                    $temp_purchase['orderNumber'] = $orderNumber;

                    // merge two entry
                    $purchase_order = array_merge($checkout_details, $temp_purchase);
                }
                    
                    $buyerMail = $temp_purchase['BuyerMail'];
                    $ownerMail = $checkout_details['OwnerMail'];
                    $currentTime = Carbon::now();
                    $todayDate = Carbon::now()->format('d M, Y');

    
                    //$todayDate = Carbon::now()->format('Y-m-d');

                    $orderData = [
                        'buyer' => $buyerName,
                        'buyerMail' => $buyerMail,
                        'orderNo' => $orderNumber,
                        'orderDate' => $todayDate,
                        'orderTime' => $currentTime->toDateTimeString(),
                        'orderTotal' => $checkout_details['TotalAmount'],
                        'orderItems' => $itemsArray,
                        'orderAddress' => $temp_purchase['DeliveringLocation'],
                    ];

                    // send mail to user and owner
                    Mail::to($buyerMail)->send(new OrderConfirmationMail($orderData));
                    Mail::to($ownerMail)->send(new ReceiveOrderMail($orderData));


                    // set data into response
                    $response['response'] = ["message" => "Order has been confirmed successfully", "data" => $purchase_order];
                    $response['success'] = true;
    
                    // send response entry 1 + 2 to MP server
                    return Response::json($response, 201);
                }else {
                    $response['response'] = ["message" => "No item is selected", "errors" => ''];
                    $response['success'] = true;
                    return Response::json($response, 200);
                }
                
            }else{

                $response['response'] = ["message" => "Order is not accepted", "errors" => 'Confirmation failed'];
                $response['success'] = false;
                return Response::json($response, 400);
            }
        }
    }

    public function generateOrderNumber()
    {
        $latestorders = Order::orderBy('created_at', 'DESC')->first();
        if($latestorders){
            return 'ORD-' . str_pad($latestorders->order_id + 1 , 6, "0", STR_PAD_LEFT);
        }else {
            return 'ORD-' . str_pad( 1 , 6, "0", STR_PAD_LEFT);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {   
        // create response array and temp_items array
        $response = array('response' => '', 'success' => false);
        
        //get ProgressID from request
        $progressId = $request->get('ProgressID');
        
        // retrieve session data
        $checkoutData = session('checkout_detail');
    
        // get progress ID from session
        $pID = $checkoutData['ProgressID'];
        
        if($progressId===$pID){
            $sessionDelete = session()->pull('checkout_detail', 'default');
            
            if($sessionDelete){
                //return ["result" => "Item is canceled"];
                
                $response['response'] = ["result" => "Item is canceled", "errors" => ''];
                $response['success'] = true;
                return Response::json($response, 200);
            }else {
                return ["result" => "Item canceling is failed."];
            }
        }else{
            $response['response'] = ["result" => "", "errors" => 'ProgressId do not match to cancel Item.'];
            $response['success'] = false;
            return Response::json($response, 404);
        }
 
       
    }


}
