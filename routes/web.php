<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/beranda", function () {
    sleep(5);
    return redirect()->route("homepage");
});


// Normal
// Route::name('admin.')->group(function () {
//     Route::get("admins/", function () {
//         $users = ["Andi", "Bagas", "Bayu", "Eka"];
//         return $users;
//     })->name("list");

//     Route::get("admins/{id}", function ($id) {
//         $users = ["Andi", "Bagas", "Bayu", "Eka"];
//         return $users[$id];
//     })->name("detail");
// });

// Frefix
Route::prefix('admins')->name("admins.")->group(function () {
    Route::get("/", function () {
        $users = ["Andi", "Bagas", "Bayu", "Eka"];
        return $users;
    });

    Route::get("/{id}", function ($id) {
        $users = ["Andi", "Bagas", "Bayu", "Eka"];
        return $users[$id];
    });
});

Route::get('/users', function () {
    return view("users.users", [
        "id" => 1,
        "nama" => "Indra",
        "email" => "indrasaepudin212@gmail.com"
    ]);
});

Route::get('/users/{id?}', function (?string $id = null) {
    $users = [
        [
            "id" => 1,
            "nama" => "Indra Saepudin",
            "age" => 17
        ],
        [
            "id" => 2,
            "nama" => "Indra",
            "age" => 22
        ],
        [
            "id" => 3,
            "nama" => "Saepudin",
            "age" => 20
        ]
    ];

    $result = [];
    if ($id != null) {
        foreach ($users as $user) {
            if ($user['id'] == $id) {
                $result = $user;
            }
        }
    } else {
        $result = $users;
    }
    return $result;
})->name("users.detail");

Route::get("/home", function (Request $request) {
    return $request->query();
});


Route::get('/users/id', function (Request $request) {
    $users = [
        [
            "id" => 1,
            "nama" => "Indra Saepudin",
            "age" => 17
        ],
        [
            "id" => 2,
            "nama" => "Indra",
            "age" => 22
        ],
        [
            "id" => 3,
            "nama" => "Saepudin",
            "age" => 20
        ]
    ];

    $result = [];
    if ($request->query() != null) {
        // jika ada parameter di url maka menampilkan detail user berdasarkan id yang dikirimkan melalui url
        foreach ($users as $user) {
            if (
                $user["id"] == $request->id ||
                $user["nama"] == $request->nama ||
                $user["umur"] == $request->umur
            ) {
                array_push($result, $user);
            }
        }
    } else {
        $result = $users;
    }
    return $result;
});
