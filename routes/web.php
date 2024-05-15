<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('home'));
Route::get('/ticket', function () {
    $results = collect([
        (object)[
            "id" => "001/Ticket/I/24",
            "name" => "Irfan",
            "date" => "02-01-2024",
            "description" => "Bluescreen",
            "status" => "draft",
        ],
        (object)[
            "id" => "002/Ticket/I/24",
            "name" => "Nur",
            "date" => "05-01-2024",
            "description" => "Bluescreen",
            "status" => "draft",
        ],
        (object)[
            "id" => "003/Ticket/I/24",
            "name" => "Muhammad",
            "date" => "10-01-2024",
            "description" => "Bluescreen",
            "status" => "waiting",
        ],
        (object)[
            "id" => "004/Ticket/I/24",
            "name" => "Fulan",
            "date" => "11-01-2024",
            "description" => "Bluescreen",
            "status" => "waiting",
        ],
        (object)[
            "id" => "005/Ticket/I/24",
            "name" => "Fulanah",
            "date" => "14-01-2024",
            "description" => "Bluescreen",
            "status" => "Completed",
        ],
        (object)[
            "id" => "006/Ticket/I/24",
            "name" => "Erik",
            "date" => "18-01-2024",
            "description" => "Bluescreen",
            "status" => "Completed",
        ],

    ]);

    return view('ticket',compact('results'));
 });

 Route::get('/workplan', function () {
    $results = collect([

        (object)[
            "id" => "003/Ticket/I/24",
            "name" => "Muhammad",
            "date" => "10-01-2024",
            "description" => "Bluescreen",
            "status" => "waiting",
        ],
        (object)[
            "id" => "004/Ticket/I/24",
            "name" => "Fulan",
            "date" => "11-01-2024",
            "description" => "Bluescreen",
            "status" => "waiting",
        ],
        (object)[
            "id" => "01/Backup/I/24",
            "name" => "IT Team",
            "date" => "18-01-2024",
            "description" => "Backup Data",
            "status" => "waiting",
        ],
        (object)[
            "id" => "02/Backup/I/24",
            "name" => "IT Team",
            "date" => "01-02-2024",
            "description" => "Backup Data",
            "status" => "Completed",
        ],
    ]);
    return view('workplan',compact('results'));
 });

Route::get('/review', function () {
    $results = collect([
        (object)[
            "id" => "005/Ticket/I/24",
            "name" => "Fulanah",
            "date" => "14-01-2024",
            "description" => "Fixed",
            "status" => "Completed",
        ],
        (object)[
            "id" => "006/Ticket/I/24",
            "name" => "Erik",
            "date" => "18-01-2024",
            "description" => "Fixed",
            "status" => "Completed",
        ],

    ]);

    return view('review',compact('results'));
});
Route::get('/realization', fn () => view('realization'));

