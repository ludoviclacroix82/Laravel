

$restaurant = new App\Models\Restaurants;
$restaurant->name = "Le Gourmet";
$restaurant->address = "123 Rue de la Gastronomie";
$restaurant->zip_code = 75001;
$restaurant->country = "France";
$restaurant->description = "Un restaurant élégant offrant une cuisine française raffinée.";
$restaurant->review = 5;
$restaurant->save();
