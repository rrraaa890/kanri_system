<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coil;
use App\leveler;
class LevelerController extends Controller
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
        $query = Coil::query();

        //キーワードが入力されている場合
        if(!empty($keyword)){
        $query->where('h_no', 'like', '%'.$keyword.'%')->orWhere('maker','like','%'.$keyword.'%')->orWhere('surface','like','%'.$keyword.'%')->orWhere('material','like','%'.$keyword.'%')->orWhere('plate_thickness','like','%'.$keyword.'%');
        }
        $coils = $query->get();

        return view('levelers.index',compact("coils","keyword"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $leveler = Leveler::all();
        // return view('levelers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $levelers = $request->all();

        // Leveler::create($levelers);

        // session()->flash('flash_message', '登録が完了しました');

        // return redirect()->route('levelers.index');
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
        $coil = Coil::find($id);
        return view('levelers.create',compact('coil'));
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
        $levelers = $request->all();

        Leveler::create($levelers);

        session()->flash('flash_message', '登録が完了しました');

        return redirect()->route('levelers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $coil = Coil::find($id);

        $coil -> delete();

        session()->flash('flash_message', '削除しました');

        return redirect()->route('levelers.index');
    }
}
