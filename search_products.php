<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

// Produk yang tersedia
$products = [
    [
        'name' => 'Basic Tee',
        'price' => 'Rp. 120.000',
        'color' => 'Black',
        'image' => 'https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg'
    ],
    [
        'name' => 'Jam Antik',
        'price' => 'Rp. 3.000.000',
        'color' => '',
        'image' => 'https://images.unsplash.com/photo-1604151967103-ac170263808e?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTl8fHZpbnRhZ2UlMjBjbG9ja3xlbnwwfHwwfHx8MA%3D%3D'
    ],
    [
        "name" => "Mesin Ketik jadul",
        "price" => "Rp. 9.500.000",
        "color" => "",
        "image" => "https://images.unsplash.com/photo-1526459181387-e472f440e31c?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8b2xkJTIwdHlwZXdyaXRlcnxlbnwwfHwwfHx8MA%3D%3D"
    ],
    [
        "name"=>  "old cell phone",
        "price"=>  "Rp. 600.000",
        "color"=>  "",
        "image"=>  "https://images.unsplash.com/photo-1498582801152-3ebe4158143e?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8b2xkJTIwY2VsbCUyMHBob25lfGVufDB8fDB8fHww"
    ],
    [
        "name"=>  "Sepeda",
        "price"=>  "Rp. 4.100.000",
        "color"=>  "",
        "image"=>  "https://images.unsplash.com/photo-1485965120184-e220f721d03e?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8b2xkJTIwc2Nob29sJTIwYmlrZXxlbnwwfHwwfHx8MA%3D%3D"
    ],
    [
        "name" =>  "Meja Belajar",
        "price" =>  "Rp. 2.150.000",
        "color" =>  "",
        "image" =>  "https://images.unsplash.com/photo-1667892702997-f1add4c1c157?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fE1lamElMjBiZWxhamFyfGVufDB8fDB8fHww"
    ],
    [
        "name" =>  "Jam Tangan Sederhana",
        "price" =>  "Rp. 1.200.000",
        "color" =>  "",
        "image" =>  "https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1598&q=80"
    ]
    // tambahkan produk lain sesuai kebutuhan
];

// Ambil parameter search
$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

// Filter produk berdasarkan query search
$filteredProducts = array_filter($products, function ($product) use ($searchQuery) {
    return stripos($product['name'], $searchQuery) !== false;
});

// Kembalikan hasil dalam format JSON
echo json_encode(array_values($filteredProducts));
