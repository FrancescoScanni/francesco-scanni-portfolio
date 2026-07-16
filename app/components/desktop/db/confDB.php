<?php
    //env vars
    $host = getenv('MYSQL_HOST') ?: "mysql_db";
    $username = getenv('MYSQL_USER') ?: "root";
    $password = getenv('MYSQL_PASSWORD') ?: "rootpassword";
    $db = getenv('MYSQL_DB') ?: "portfolio";

    $conn = new mysqli($host, $username, $password, $db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    

    $shape_classes = [
        "fumetto"   => "bg-blue-50 text-blue-800 p-3 text-xs font-mono rounded-2xl rounded-tl-none border border-blue-100 transition-all group-data-[active=true]/item:bg-blue-600 group-data-[active=true]/item:text-white",
        "nastro"    => "bg-amber-50 text-amber-900 p-3 text-xs font-mono border-l-4 border-amber-500 shadow-sm transition-all group-data-[active=true]/item:bg-amber-500 group-data-[active=true]/item:text-white",
        "pillola"   => "bg-emerald-50 text-emerald-800 py-2 px-5 text-xs font-mono rounded-full border border-emerald-200 text-center shadow-sm transition-all group-data-[active=true]/item:bg-emerald-600 group-data-[active=true]/item:text-white group-data-[active=true]/item:border-emerald-600",
        "inclinata" => "bg-purple-50 text-purple-800 p-3 text-xs font-mono rounded-md -skew-x-6 border-r-2 border-purple-400 text-center transition-all group-data-[active=true]/item:bg-purple-600 group-data-[active=true]/item:text-white"
    ];
?>