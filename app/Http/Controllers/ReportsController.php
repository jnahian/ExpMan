<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Income;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index()
    {
        $title = "রিপোর্টস";
        return view( 'reports.index', compact( 'title' ) );
    }

    public function daily_income_expense( Request $request )
    {
        $title = "প্রতিদিনের আয় / ব্যায়";
        $incomes = $this->getDailyIncomeReport( $request );
        $expenses = $this->getDailyExpanseReport( $request );
        return view( 'reports.daily-income-expense', compact( 'title', 'incomes', 'expenses' ) );
    }

    public function getDailyIncomeReport( Request $request )
    {
        $incomes = new Income();

        if ( $request->s ) {
            if ( $request->from ) {
                $from = Carbon::parse( $request->from )->toDateString();
                $incomes = $incomes->where( 'date', '>=', $from );
            }
            if ( $request->to ) {
                $to = Carbon::parse( $request->to )->toDateString();
                $incomes = $incomes->where( 'date', '<=', $to );
            }
        }
        $incomes = $incomes->where( 'status', 1 )->orderByDesc( "date" )->get();
        return $incomes;
    }

    public function getDailyExpanseReport( Request $request )
    {
        $expenses = new Expense();

        if ( $request->s ) {
            if ( $request->from ) {
                $from = Carbon::parse( $request->from )->toDateString();
                $expenses = $expenses->where( 'date', '>=', $from );
            }
            if ( $request->to ) {
                $to = Carbon::parse( $request->to )->toDateString();
                $expenses = $expenses->where( 'date', '<=', $to );
            }
        }
        $expenses = $expenses->where( 'status', 1 )->orderByDesc( "date" )->get();
        return $expenses;
    }
}
