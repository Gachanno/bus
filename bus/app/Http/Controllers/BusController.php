<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusRoute; // Пример модели, замените на свою

class BusController extends Controller
{
    public function search(Request $request)
    {
        $from = $request->query('from');
        $to = $request->query('to');
        $date = $request->query('date');

        if (!$from || !$to || !$date) {
            return response()->json(['error' => 'Пожалуйста, заполните все поля!'], 400);
        }

        // Поиск маршрутов в базе данных
        $routes = BusRoute::where('from', $from)
            ->where('to', $to)
            ->whereDate('departure_date', $date)
            ->get();

        // Формирование результата
        $result = $routes->map(function ($route) {
            return [
                'bus_number' => $route->bus_number,
                'from' => $route->from,
                'to' => $route->to,
                'departure_time' => $route->departure_time,
                'duration' => $route->duration,
                'price' => $route->price,
            ];
        });

        return response()->json($result);
    }
}

