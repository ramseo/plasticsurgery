<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Price;
use App\Models\Service;
use Illuminate\Http\Request;
use Log;
use Flash;
use Validator;

class PriceController extends Controller
{
    public function index(Request $request)
    {
        $vendor = getData('vendors', 'user_id', auth()->user()->id);
        $services = Service::where('type_id', $vendor->type_id)->get();
        $prices = Price::where('vendor_id', $vendor->id)->get();
        $pricesData = array();
        if($prices){
            foreach ($prices as $price){
                $pricesData[$price->service_id]['service_type']=$price->service_type;
                $pricesData[$price->service_id]['description']=$price->description;
            }
        }
        return view('backend.prices.index', compact('vendor', 'services', 'pricesData'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $vendor = getData('vendors', 'user_id', auth()->user()->id);
        $services = Service::where('type_id', $vendor->type_id)->get();

        foreach ($services as $service) {
            $price = Price::where(array('vendor_id' => $vendor->id, 'service_id' => $service->id))->first();
            $data =array();
            $data['vendor_id'] = $vendor->id;
            $data['service_id'] = $service->id;
            $data['service_type'] = $request->service_type[$service->id];
            $data['description'] = $request->description[$service->id];
            if ($price) {
                $price->update($data);
            } else {
                $price = Price::create($data);
            }
            $price->save();
            Log::info(label_case('Image Store | ' . $price->service_type . '(ID:' . $price->id . ')  by User:' . auth()->user()->name . '(ID:' . auth()->user()->id . ')'));
        }

        Flash::success("<i class='fas fa-check'></i> New Image Added")->important();

        return redirect("vendor/price");
    }

}