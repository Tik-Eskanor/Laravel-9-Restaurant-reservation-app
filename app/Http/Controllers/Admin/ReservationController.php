<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Table; //added
use App\Http\Requests\ReservationStoreRequest; //added
use App\Enums\TableStatus; //added
use Illuminate\Support\Carbon; //added

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservations.index',compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tables = Table::where('status',TableStatus::Available)->get();
        return view('admin.reservations.create',compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservationStoreRequest $request)
    {
        $table = Table::findOrFail($request->table_id);

        if($request->guest_number > $table->guest_number)
        {
            return back()->with('warning','Guest number should not exceed the table capacity');
        }

        $res_date = Carbon::parse($request->res_date);
        foreach($table->reservation as $res)
        {
           if(Carbon::parse($res->res_date)->format('Y-m-d') == $res_date->format('Y-m-d'))
           {
            return back()->with('warning','This table is already reserved for this day');
           }
        }
        
        Reservation::create($request->validated());
        return redirect(route('admin.reservations.index'))->with('success','Reservation created successfully');
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
    public function edit(Reservation $reservation)
    {
        $tables = Table::where('status',TableStatus::Available)->get();
        return view('admin.reservations.edit',compact('reservation','tables'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReservationStoreRequest $request, Reservation $reservation)
    {
        $table = Table::findOrFail($request->table_id);

        if($request->guest_number > $table->guest_number)
        {
            return back()->with('warning','Guest number should not exceed the table capacity');
        }

        $res_date = Carbon::parse($request->res_date);
        $reservations = $table->reservation()->where('id','!=',$reservation->id)->get();
        foreach($reservations as $res)
        {
           if(Carbon::parse($res->res_date)->format('Y-m-d') == $res_date->format('Y-m-d'))
           {
            return back()->with('warning','This table is already reserved for this day');
           }
        }
        
        $reservation->update($request->validated());
        return redirect(route('admin.reservations.index'))->with('success','Reservation Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($res)
    {
        Reservation::where('id',$res)->delete();
       return redirect(route('admin.reservations.index'))->with('danger','Table deleted successfully');
    }
}
