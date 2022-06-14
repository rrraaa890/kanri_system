<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trimming;
use App\Press;

class PressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // キーワードを取得
        $keyword = $request->input('keyword');

        //クエリ作成
        $query = Trimming::query();

        //キーワードが入力されている場合
        if(!empty($keyword)){
        $query->where('h_no', 'like', '%'.$keyword.'%')->orWhere('maker','like','%'.$keyword.'%')->orWhere('surface','like','%'.$keyword.'%')->orWhere('material','like','%'.$keyword.'%')->orWhere('plate_thickness','like','%'.$keyword.'%');
        }   
        $trimmings = $query->get();
        
        return view('press.index',compact("trimmings","keyword"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trimming = trimming::find($id);
        return view('press.create',compact('trimming'));
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
        $trimmings = trimming::find($id);
        
        if($trimmings['number_of_sheets']-$request['good']-$request['bad'] >= 0){
            // pressのDBを触る
            $press = $request->all();
    
            Press::create($press);
            
            // trimmingのDBを触る
            $trimmings -> number_of_sheets = ($trimmings['number_of_sheets']-$request['good']-$request['bad']);
            // trimmingの枚数をリクエストで送られてきた枚数を引く
            $trimmings -> save();
    
            session()->flash('flash_message', '登録が完了しました');
    
            return redirect()->route('press.index');
        }else{
            session()->flash('flash_message', '枚数を確認してください');
            return redirect()->back();
        }
        // trimmingの枚数がrequestの枚数を引いた時に０以下にならないように
        
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
