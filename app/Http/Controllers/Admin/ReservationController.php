<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;
use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Http\Request;
use App\Enums\TableStatus;
use Illuminate\Support\Carbon;


class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tables = Table::where('status', TableStatus::Avaliable)->get();
        return view('admin.reservations.create', compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservationStoreRequest $request)
    {
        $table = Table::findOrFail($request->table_id);
        if($request->guest_number > $table->guest_number){
            return back()->with('warning', 'Please choose the table based on guest');
        }
        $request_date = Carbon::parse($request->res_date);
        foreach ($table->reservations as $res){
            $res_date = Carbon::parse($res->res_date);
            if($res_date->format('Y-m-d') == $request_date->format('Y-m-d')){
                return back()->with('warning', 'This table is reserved for this date.');
            }
        }
        Reservation::create($request->validated());

        return to_route('admin.reservations.index')->with('success','Reservation created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        $tables = Table::where('status', TableStatus::Avaliable)->get();
        $reservation->res_date = Carbon::parse($reservation->res_date);
        return view('admin.reservations.edit', compact('reservation','tables'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReservationStoreRequest $request, Reservation $reservation)
    {
        $table = Table::findOrFail($request->table_id);
        if($request->guest_number > $table->guest_number){
            return back()->with('warning', 'Please choose the table based on guest');
        }
        $request_date = Carbon::parse($request->res_date);
        $reservations = $table->reservations()->where('id', '!=', $reservation->id)->get();
        foreach ($reservations as $res){
            $res_date = Carbon::parse($res->res_date);
            if($res->format('Y-m-d') == $request_date->format('Y-m-d')){
                return back()->with('warning', 'This table is reserved for this date.');
            }
        }

        $reservation->update($request->validated());

        return to_route('admin.reservations.index')->with('success','Reservation created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        
        return to_route('admin.reservations.index')->with('danger','Reservation deleted successfully');
    }
}
