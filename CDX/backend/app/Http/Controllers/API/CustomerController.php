<?php

namespace App\Http\Controllers\API;

use App\Models\Customer;
use App\Models\Project;
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
				$results = Customer::advancedFilter();

				return response()
						->json(['collection' => $results]);
    }

		public function getCustomerProjects(Request $request, $id)
		{
				$results = Project::where('customer_id', $id)->orderBy('id', 'DESC')->get();

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
				return Customer::create([
						'cif'           => $request['cif'],
						'name'          => $request['name'],
						'reg_com'       => $request['reg_com'],
						'client_code'   => $request['client_code'],
						'address'       => $request['address'],
						'country'       => $request['country'],
						'city'          => $request['city'],
						'bank'          => $request['bank'],
						'iban'          => $request['iban'],
						'email'         => $request['email'],
						'contact_id'    => $request['contact_id'],
						'phone'         => $request['phone'],
						'website'       => $request['website'],
				]);
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
        //
    }
}
