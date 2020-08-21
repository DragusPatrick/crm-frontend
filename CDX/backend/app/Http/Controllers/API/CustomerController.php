<?php

namespace App\Http\Controllers\API;

use DB;
use App\Models\Customer;
use App\Models\Project;
use App\Models\Counter;
use App\Models\Payment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
				$results = Customer::with('contact')->advancedFilter();

				return response()
						->json(['collection' => $results]);
    }

		public function getCustomerProjects(Request $request, $id)
		{
				$results = Project::where('customer_id', $id)->orderBy('id', 'DESC')->get();

				return response()
						->json(['collection' => $results]);
		}

		public function getCustomerPayments(Request $request, $id)
		{
				$results = Payment::where('customer_id', $id)->orderBy('id', 'DESC')->get();

				return response()
						->json(['collection' => $results]);
		}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

				$request->validate([
					 'cif'			  => 'required',
					 'name' 			=> 'required',
					 'reg_com' 		=> 'required',
					 'address' 		=> 'required',
					 'country' 		=> 'required',
					 'city' 			=> 'required',
					 'iban' 			=> 'required',
					 'bank' 			=> 'required',
					 'email' 			=> 'required',
					 'contact_id' => 'required',
					 'phone' 			=> 'required',
					 'website'	  => 'required',
				]);

				$customer = new Customer;
				$customer->fill($request->all());

				$customer = DB::transaction(function() use ($customer, $request) {
						$counter = Counter::where('key', 'customer')->first();

						$customer->number = $counter->prefix . $counter->value;

						$counter->increment('value');

						return $customer;
				});
				$customer->save();

				return response()->json($customer, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
				$customer = Customer::with('contact')->findOrFail($id);

				return response()
						->json([
								'customer' => $customer,
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
				$customer = Customer::findOrFail($id);

				// Delete the article
				$customer->delete();
				return ['message' => 'Deleted'];
    }
}
