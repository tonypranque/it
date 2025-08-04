<?php
// app/Http/Controllers/ContactController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
public function store(Request $request)
{
$request->validate([
'name' => 'required|string|max:255',
'email' => 'required|email',
'message' => 'required|string',
]);

// Здесь отправка email, сохранение в БД и т.д.

return back()->with('success', 'Thank you! We will contact you soon.');
}
}
