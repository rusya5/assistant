<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EquipmentsServiceRequest;
use App\Models\EquipmentsService;
use App\Models\EquipmentsServiceBooking;
use App\Models\EquipmentsServicesType;

class EquipmentsServiceController
{
    public function index(){
        $equipmentsServices = EquipmentsService::with('type')->paginate(20);
        $types = EquipmentsServicesType::get();
        return view('admin.equipments-service.index', compact('equipmentsServices', 'types'));
    }
    public function store(EquipmentsServiceRequest $request){
        $data = $request->validated();
        EquipmentsService::create($data);
        return response()->json(['success' => true], 200);
    }
    public function update($id, EquipmentsServiceRequest $request)
    {
        $data = $request->validated();
        $equipmentsService = EquipmentsService::findOrFail($id);
        $equipmentsService->update($data);

        return response()->json(['success' => true], 200);
    }
    public function destroy($id)
    {
        try {
            $equipmentsService = EquipmentsService::findOrFail($id);
            $equipmentsService->delete();

            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
    public function bookings()
    {
        $bookings = EquipmentsServiceBooking::with('equipmentsServices', 'chat')->paginate(15);
        return view('admin.equipments-service.bookings', compact('bookings'));
    }
}
