<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookingObject;

class BookingObjectController extends Controller
{
    // Список всех объектов
    public function index()
    {
        $objects = BookingObject::all();
        return response()->json($objects);
    }

    // Просмотр одного объекта
    public function show($id)
    {
        $object = BookingObject::find($id);
        if (!$object) {
            return response()->json(['error' => 'Object not found'], 404);
        }
        return response()->json($object);
    }
}
