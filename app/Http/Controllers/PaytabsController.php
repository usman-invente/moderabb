<?php

namespace App\Http\Controllers;

use App\Models\PaytabsInvoice;
use Basel\Paytabs\Paytabs;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;

class PaytabsController extends Controller
{

    public function index(Request $request)
    {
        try {
             $order = new Order;
             $order->reference_no = mt_rand(100000,999999);;
             $order->course_id = 8;
             $order->name = Auth::user()->name;;
             $order->user_id = Auth::user()->id;
             $order->price =   $request->session()->get('total');
             $order->certificate =   $request->session()->get('certificate');
             $order->save();
             return redirect()->back()->with('message','Your Order Completd Successfully');
             
        } catch (\Throwable $th) {
            return $th->getMessage();
            return redirect()->back()->with('error','Some Thing Wrong');
        }
      
        // $pt = app('paytabs'); //the instance through the register service provider singleton

        // $result = Paytabs::getInstance()->create_pay_page(array(

        //     //Customer's Personal Information
        //     'cc_first_name' => "Muhammad",          //This will be prefilled as Credit Card First Name
        //     'cc_last_name' => "Usman",            //This will be prefilled as Credit Card Last Name
        //     'cc_phone_number' => "03066522195",
        //     'phone_number' => "03066522195",
        //     'email' => "worlstone101@gmail.com",

        //     //Customer's Billing Address (All fields are mandatory)
        //     //When the country is selected as USA or CANADA, the state field should contain a String of 2 characters containing the ISO state code otherwise the payments may be rejected.
        //     //For other countries, the state can be a string of up to 32 characters.
        //     'billing_address' => "manama bahrain",
        //     'city' => "sargodha",
        //     'state' => "manama",
        //     'postal_code' => "40100",
        //     'country' => "",

        //     //Customer's Shipping Address (All fields are mandatory)
        //     'address_shipping' => "Juffair bahrain",
        //     'city_shipping' => "manama",
        //     'state_shipping' => "manama",
        //     'postal_code_shipping' => "00973",
        //     'country_shipping' => "BHR",

        //     //Product Information
        //     "products_per_title" => "Product1 || Product 2 || Product 4",   //Product title of the product. If multiple products then add “||” separator
        //     'quantity' => "1 || 1 || 1",                                    //Quantity of products. If multiple products then add “||” separator
        //     'unit_price' => "2 || 2 || 6",                                  //Unit price of the product. If multiple products then add “||” separator.
        //     "other_charges" => "91.00",                                     //Additional charges. e.g.: shipping charges, taxes, VAT, etc.
        //     'amount' => "101.00",                                          //Amount of the products and other charges, it should be equal to: amount = (sum of all products’ (unit_price * quantity)) + other_charges
        //     'discount' => "1",                                                //Discount of the transaction. The Total amount of the invoice will be= amount - discount

        //     //Invoice Information
        //     'title' => "John Doe",               // Customer's Name on the invoice
        //     "reference_no" => "1231231",        //Invoice reference number in your system

        // ));


        // dd($result);

        // if ($result->response_code == 4012) {
        //     return redirect($result->payment_url);
        // }
        // if ($result->response_code == 4094) {
        //     return $result->details;
        // }

        // return $result->result;
    }

    public function response(Request $request)
    {

        $result = Paytabs::getInstance()->verify_payment($request->payment_reference);

        if ($result->response_code == 100) {
            //success
            $this->createInvoice((array)$result);
        }
        return $result->result;
    }

    public function createInvoice($request)
    {
        $request['order_id'] = $request["reference_no"];
        PaytabsInvoice::create($request);
    }
}
