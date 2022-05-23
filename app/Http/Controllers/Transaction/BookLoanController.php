<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookLoan;
use App\Models\Member;
use Illuminate\Http\Request;

class BookLoanController extends Controller
{
    public function index(){
        $members = Member::all();
        $books = Book::all();

        return view('book-loan', compact('members', 'books'));
    }

    public function store(Request $req){
        $member = Member::find($req->member_code);
        if($member->penalized){
            $penalty_date = strtotime($member->penalty_date);
            $current_date = strtotime(date('Y-m-d'));
            $diff = $current_date - $penalty_date;
            $diff_round = $diff / 60 / 60 / 24;

            if($diff_round >= 3){
                $member->penalized = 0;
                $member->penalty_date = null;
                $member->save();
            }
            else{
                return back()->with('error', ucwords($member->name)." is currently penalized!");
            }
        }

        $book = Book::find($req->book_code);
        if($req->qty > $book->stock){
            return back()->with('warning', '"'.ucwords($book->title).'" book stock is lower than your request!');
        }

        if($req->qty > 2){
            return back()->with('warning', "Quantity can't be more than 2");
        }

        $book_loan = new BookLoan();
        $transaction_code = strtotime(now());
        $book_loan->code = $transaction_code;
        $book_loan->member_code = $req->member_code;
        $book_loan->book_code = $req->book_code;
        $book_loan->qty = $req->qty;
        $book_loan->borrow_date = now();
        $book_loan->save();

        $book->stock = $book->stock - $req->qty;
        $book->save();

        return back()->with('success', "A new loan has been made successfully!");
    }
}
