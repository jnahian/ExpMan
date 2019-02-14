<?php

namespace App\Http\Controllers;

use App\Income;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "নতুন আয় যোগ করুন";
        return view( 'income.create', compact( 'title' ) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        $response = [ 'success' => false, 'msg' => '' ];
        $request->validate( [
            'date'   => 'required',
            'source' => 'required',
            'amount' => 'required|numeric',
        ] );

        $income = new Income();
        $income->uuid = Uuid::uuid4();
        $income->user_id = Auth::user()->id;
        $income->date = Carbon::parse( $request->date )->toDateTimeString();
        $income->source = $request->source;
        $income->amount = $request->amount;
        $income->remarks = $request->remarks;
        $income->status = 1;
        $income->save();

        $response['success'] = true;
        $response['msg'] = "Income Saved Successfully!";
        return response()->json( $response );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Income $income
     * @return \Illuminate\Http\Response
     */
    public function show( Income $income )
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Income $income
     * @return \Illuminate\Http\Response
     */
    public function edit( Income $income )
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Income $income
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, Income $income )
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Income $income
     * @return \Illuminate\Http\Response
     */
    public function destroy( Income $income )
    {
        //
    }
}
