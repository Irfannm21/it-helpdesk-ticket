<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);



Route::prefix('/ticket')->name('ticket.')->group(function () {
    Route::get('/', function () {
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

        return view('ticket.index', compact('results'));
    });

    Route::get('/create', function () {
        return view('ticket.create');
    })->name('create');

    Route::get('/{id}/edit', function ($id) {
        dd($id);
        return view('ticket.edit', compact('id'));
    })->name('edit');
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
    ]);
    return view('workplan', compact('results'));
});


Route::get('/realization', function () {
    $results = collect([
        (object)[
            "id" => "005/Ticket/I/24",
            "name" => "Irfan Nur (IT Support)",
            "date" => "15-01-2024",
            "description" => "Install Ulang",
            "status" => "Completed",
        ],
        (object)[
            "id" => "006/Ticket/I/24",
            "name" => "Hadiandi (IT Support)",
            "date" => "20-01-2024",
            "description" => "Install Ulang",
            "status" => "Completed",
        ],

        (object)[
            "id" => "02/Backup/I/24",
            "name" => "Yudi (IT Staff)",
            "date" => "03-02-2024",
            "description" => "Backup to HDD External",
            "status" => "Completed",
        ],
    ]);
    return view('realization', compact('results'));
});

Route::get('/review', function () {
    $results = collect([
        (object)[
            "id" => "005/Ticket/I/24",
            "name" => "Irfan Nur (IT Support)",
            "date" => "15-01-2024",
            "review" => "Komputer Lancaar Kembali",
            "status" => "Completed",
        ],
        (object)[
            "id" => "006/Ticket/I/24",
            "name" => "Hadiandi (IT Support)",
            "date" => "20-01-2024",
            "review" => NULL,
            "status" => "Completed",
        ],

    ]);

    return view('review', compact('results'));
});
