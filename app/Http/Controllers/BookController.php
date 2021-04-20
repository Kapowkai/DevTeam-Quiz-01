<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Book::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return Book::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $Book= Book::find($id);
        $result = json_encode([
            'bookName'=>$Book->bookName,
            'writerName'=>$Book->writerName,
            'price'=>$Book->price,
            'page'=>$Book->page
        ]);

        return view('update',compact('result','id'));
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
        //Book::find($id)->update($request->all());
        $Book = Book::find($id);
        $Book->bookName = $request->get('bookName');
        $Book->writerName = $request->get('writerName');
        $Book->price = $request->get('price');
        $Book->page = $request->get('page');
        $Book->save();
        return response()->json(['message'=>'บันทึกเรียบร้อยแล้ว','status'=>200]);
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
        return Book::destroy($id);
    }
}
