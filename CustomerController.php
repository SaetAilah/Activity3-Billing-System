<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CustomerController extends Controller
{
    public function CustomerBill()
    {
        $customerName = "Michelle Ailah Saet";
        $customerType = "Regular";
        $consumption = 50;

        if ($customerType == "Lifeline") {
            $rate = 5.00;
            $fixedCharge = 0;
            $discountpercent = 0.20;
        } elseif ($customerType == "Regular") {
            $rate = 9.50;
            $fixedCharge = 50;
            $discountpercent = 0;
        } elseif ($customerType == "Commercial") {
            $rate = 12.00;
            $fixedCharge = 200;
            $discountpercent = 0.05;
        } else {
            return "Invalid customer type";
        }

        $baseBill = $consumption * $rate;
        $discount = $baseBill * $discountpercent;
        $totalBill = $baseBill + $fixedCharge - $discount;

        $output="
            <script>
                alert('Customer: $customerName\\nType: $customerType\\nConsumption: $consumption\\nBase Bill: $baseBill\\nTotal Bill: $totalBill');
            </script>
        ";
        return response()->make($output);

        return response()->make(
            "Customer Name: $customerName<br>" .
            "Customer Type: $customerType<br>" .
            "Consumption: $consumption<br>" .
            "Base Bill: $baseBill<br>" .
            "Total Bill: $totalBill"
        );

        
    }
}
