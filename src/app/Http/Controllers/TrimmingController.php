<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\leveler;
use App\Trimming;

class TrimmingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        // キーワードを取得
        $keyword = $request->input('keyword');

        //クエリ作成
        $query = Leveler::query();

        //キーワードが入力されている場合
        if(!empty($keyword)){
        $query->where('h_no', 'like', '%'.$keyword.'%')->orWhere('maker','like','%'.$keyword.'%')->orWhere('surface','like','%'.$keyword.'%')->orWhere('material','like','%'.$keyword.'%')->orWhere('plate_thickness','like','%'.$keyword.'%');
        }   
        $levelers = $query->get();
        
        return view('trimmings.index',compact("levelers","keyword"));
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
        $leveler = leveler::find($id);
        return view('trimmings.create',compact('leveler'));
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
        $trimmings = $request->all();

        Trimming::create($trimmings);

        $levelers = leveler::find($id);

        if($levelers['number_of_sheets']-$request['number_of_sheets'] > 0){
            $levelers -> number_of_sheets = ($levelers['number_of_sheets']-$request['number_of_sheets']);
            // Levelerの枚数をリクエストで送られてきた枚数を引く
            $levelers -> save();
    
            session()->flash('flash_message', '登録が完了しました');
    
            return redirect()->route('trimmings.index');
        }else{
            session()->flash('flash_message', '枚数を確認してください');
            return redirect()->back();
        }
        // levelersの枚数がrequestの枚数を引いた時に０以下にならないように
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $leveler = Leveler::find($id);

        $leveler -> delete();

        session()->flash('flash_message', '削除しました');

        return redirect()->route('trimmings.index');
    }
}
