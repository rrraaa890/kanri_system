<?php

namespace App\Http\Controllers;


use App\Exports\Export;
use Illuminate\Http\Request;
use App\Press;

class ManagementController extends Controller
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
        
        if(!empty($request['month'])){
            $query = Press::query();
            
            $month = $request->input('month');
            
            // monthの後ろを大まかに検索
            $managements = \App\Press::where('created_at','LIKE', "$month%")->get();
            
            $presses = $query->get();

            
            return view('managements.export',compact('managements','presses','month'));
        }else{
            // 前の月を取得
            $month = date('Y-m', strtotime('-1 month'));
            return view('managements.index',compact('month'));
            
        }
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function export()
    {
            
        // // // monthの後ろを大まかに検索
        // // $managements = \App\Press::where('created_at','LIKE', "$month%")->get();
        // $query = Press::query();
            
        // // $month = $request->input('month');
        
        // // monthの後ろを大まかに検索
        // $managements = \App\Press::where('created_at','LIKE', "$month%")->get();
        
      
        // $view = \view('managements.export', compact($managements));
        // return \Excel::download(new Export($view), 'managements.xlsx');
        

        // return view('managements.index',[
        //     'managements' => Press::all()
        // ]);
        // return Excel::download(new ManagementsExport, 'output.xlsx');

       
        return Excel::download(new Export($view), 'users.xlsx');
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
        //
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
        //
    }
}
