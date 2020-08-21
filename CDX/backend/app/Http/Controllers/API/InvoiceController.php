<?php

namespace App\Http\Controllers\API;

use DB;
use PDF;
use Storage;
use App\Models\Counter;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
				$results = Invoice::with(['customer'])
								->advancedFilter();

						return response()
								->json(['collection' => $results]);
    }

		public function create()
		{
				$counter = Counter::where('key', 'invoice')->first();

				$form = [
						'number' => 'CDX00',
						'customer_id' => null,
						'customer' => null,
						'date' => date('d-m-Y'),
						'due_date' => null,
						'reference' => null,
						'discount' => 0,
						'terms_and_conditions' => 'Default terms',
						'items' => [
								[
										'product_id' => null,
										'product'    => null,
										'unit_price' => 0,
										'qty'        => 1
								]
						]
				];

				return response()
						->json(['form' => $form]);
		}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
				$invoice = new Invoice;
				$invoice->fill($request->except('items'));

				$invoice->sub_total = collect($request->items)->sum(function($item) {
						return $item['qty'] * $item['unit_price'];
				});

				$invoice = DB::transaction(function() use ($invoice, $request) {
						$counter = Counter::first();
						$invoice->number = $counter->prefix . $counter->value;

						// custom method from app\helper\hasManyRelation
						$invoice->storeHasMany([
								'items' => $request->items
						]);

						$counter->increment('value');

						return $invoice;
				});

				PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf = PDF::loadView('components.invoice', ['data' => $invoice]);

        $content = $pdf->download()->getOriginalContent();

        // Generate pdf file named from input text
        Storage::put('public/Invoices/' . $invoice->number . '.pdf', $content);

        // Data for email markdown
        $data = array(
            'number' => $invoice->number
        );

				return response()
						->json(
								[
										'saved' => true,
										'id'    => $invoice->id
								]
						);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
				$model = Invoice::with(['customer', 'items.product'])
				 ->findOrFail($id);

				return response()
						 ->json(['model' => $model]);
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
				 $invoice = Invoice::findOrFail($id);

				 $invoice->items()->delete();

				 $invoice->delete();

				 return response()
						 ->json(['deleted' => true]);
    }
}
