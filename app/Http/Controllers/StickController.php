<?php

namespace App\Http\Controllers;

use App\Repository\StickRepository;
use App\Stick;
use function Couchbase\basicDecoderV1;
use Illuminate\Http\Request;

class StickController extends Controller
{
private $stickRepository;

    public function __construct()
    {
        $this->stickRepository=new StickRepository();
        $this->middleware('AdminCheck')->except('all');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sticks=$this->stickRepository->index(10);

        return view('stick.stickmanage',compact('sticks'));

    }

    public function manage()
    {
        return view('stick.StickPane');
    }
    public function all()
    {
        return $this->stickRepository->all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sticks=Stick::all();
        return view('stick.addStick',['sticks'=>$sticks]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->stickRepository->create($request);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stick=Stick::find($id);

        return view('stick.updateStick',compact('stick'));
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
        $stick=Stick::find($id);
        $input=$request->all();
        if($stick->update($input))
        {
            return back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Stick::destroy($id);
       return back();
    }

}
