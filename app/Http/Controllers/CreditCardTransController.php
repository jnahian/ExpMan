<?php

namespace App\Http\Controllers;

use App\CreditCardTrans;
use App\Enums\Cards;
use App\Income;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CreditCardTransController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title   = "সকল লেনদেন";
        $ccTrans = new CreditCardTrans();

        if ($request->s) {
            if ($request->from) {
                $from    = Carbon::parse($request->trans_date)->toDateString();
                $ccTrans = $ccTrans->where('date', '>=', $from);
            }
            if ($request->to) {
                $to      = Carbon::parse($request->trans_date)->toDateString();
                $ccTrans = $ccTrans->where('date', '<=', $to);
            }
        }
        $ccTrans = $ccTrans->orderByDesc("trans_date");
        $ccTrans = $ccTrans->paginate(15)->appends($request->all());
        $cards   = getConstants(Cards::class);

        return view('cc-trans.index', compact('title', 'ccTrans', 'cards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $title  = "নতুন লেনদেন যোগ করুন";
        $cards  = getConstants(Cards::class);
        $tenors = getTenors();
        return view('cc-trans.create', compact('title', 'cards', 'tenors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = ['success' => false, 'msg' => '', 'redirect' => false];
        $request->validate([
                               'date'     => 'required',
                               'trans_by' => 'required',
                               'card'     => 'required',
                               'amount'   => 'required|numeric',
                           ]);

        try {
            $ccTrans              = new CreditCardTrans();
            $ccTrans->trans_date  = Carbon::parse($request->date)->toDateTimeString();
            $ccTrans->particulars = $request->particulars;
            $ccTrans->trans_by    = $request->trans_by;
            $ccTrans->amount      = $request->amount;
            $ccTrans->card        = $request->card;
            $ccTrans->emi         = $request->emi;
            $ccTrans->status      = $request->status;
            $ccTrans->save();

            $response['success']  = true;
            $response['redirect'] = $request->previous;
            $response['msg']      = "লেনদেন সফলভাবে সংরক্ষিত হয়েছে।";
        } catch (\Exception $exception) {
            $response['msg'] = $exception->getMessage();
        }

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Income $ccTrans
     * @return \Illuminate\Http\Response
     */
    public function show(Income $ccTrans)
    {
        $title = "বিস্তারিত দেখুন ";
        return view('cc-trans.show', compact('title', 'ccTrans'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Income $ccTrans
     * @return \Illuminate\Http\Response
     */
    public function edit(Income $ccTrans)
    {
        $title = "লেনদেন পরিবর্তন";
        return view('cc-trans.edit', compact('title', 'ccTrans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Income $ccTrans
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Income $ccTrans)
    {
        $response = ['success' => false, 'msg' => '', 'redirect' => false];
        $request->validate([
                               'date'   => 'required',
                               'source' => 'required',
                               'amount' => 'required|numeric',
                           ]);
        try {
            $ccTrans->date    = Carbon::parse($request->date)->toDateTimeString();
            $ccTrans->source  = $request->source;
            $ccTrans->amount  = $request->amount;
            $ccTrans->remarks = $request->remarks;
            $ccTrans->status  = $request->status;
            $ccTrans->save();

            $response['success']  = true;
            $response['redirect'] = $request->previous;
            $response['msg']      = "লেনদেন সফলভাবে আপডেট হয়েছে।";
        } catch (\Exception $exception) {
            $response['msg'] = $exception->getMessage();
        }
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Income $ccTrans
     * @return \Illuminate\Http\Response
     */
    public function destroy(Income $ccTrans)
    {
        $response = ['success' => false, 'msg' => '', 'redirect' => false];

        try {
            $ccTrans->delete();
            $response['success']  = true;
            $response['redirect'] = route('cc-trans.index');
            $response['msg']      = "লেনদেন মুছেফেলা হয়েছে।";
        } catch (\Exception $exception) {
            $response['msg'] = $exception->getMessage();
        }

        return response()->json($response);
    }
}
