<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookLoan;
use App\Models\BookReturn;
use App\Models\Member;

class BookReturnController extends Controller
{
    public function index(){
        $data = BookLoan::with('member', 'book')->where('returned', 0)->get();

        return view('book-return', compact('data'));
    }

    public function store(Request $req){
        $loan = BookLoan::find($req->book_loan_code);
        $loan->returned = 1;
        $loan->save();

        $return = new BookReturn();
        $return->book_loan_code = $req->book_loan_code;
        $return->return_date = now();
        $return->save();

        $borrow_date = strtotime($loan->borrow_date);
        $return_date = strtotime(date('Y-m-d'));
        $diff = $return_date - $borrow_date;
        $diff_round = $diff / 60 / 60 / 24;

        if($diff_round > 7){
            $member = Member::find($loan->member_code);
            $member->penalized = 1;
            $member->penalty_date = now();
            $member->save();

            return back()->with('info', 'A transaction has been returned successfully, but '.$member->name.' is penalized!');
        }

        return back()->with('success', 'A transaction has been returned successfully!');
    }
}
