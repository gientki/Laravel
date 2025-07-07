<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use App\Services\PetApiService;

class PetController extends Controller
{
    public function __construct(PetApiService $api)
    {
        $this->api = $api;
    }
    // Lista 
    public function index()
    {
        try {
            $deletedId = session('deleted_id');
    
            $pets = collect($this->api->getAllPets())
                ->filter(fn($pet) => isset($pet['id']) && $pet['id'] != $deletedId)
                ->map(function ($pet) {
                    return (object)[
                        'id' => $pet['id'],
                        'name' => $pet['name'] ?? '(brak nazwy)',
                        'status' => $pet['status'] ?? '(brak statusu)',
                        'category' => $pet['category']['name'] ?? '',
                        'tags' => collect($pet['tags'] ?? [])->pluck('name')->implode(', '),
                        'photo_url' => $pet['photoUrls'][0] ?? null,
                    ];
                });
                // \Log::info('Pet photo URL:', [$pet['photoUrls'][0] ?? null]);
            return view('pets.index', compact('pets'));
        } catch (\Throwable $e) {
            // \Log::error('Błąd przy pobieraniu listy zwierzaków: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Nie udało się pobrać listy zwierzaków.');
        }
    }
    


    // Formularz dodawania
    public function create()
    {
        return view('pets.create');
    }

    // Zapis nowego 
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:available,pending,sold',
            'category' => 'nullable|string|max:255',
            'photo_url' => 'nullable|url',
            'tags' => 'nullable|string',
        ]);

        // \Log::info('Dane wysyłane do API (store):', $validated);

        try {
            $created = $this->api->createPet($validated);

            // \Log::info('Odpowiedź API (store):', $created);

            return redirect()->route('pets.index')->with('success', 'Zwierzak dodany! ID: ' . ($created['id'] ?? 'brak ID'));
        } catch (\Exception $e) {
            // \Log::error('Błąd przy dodawaniu zwierzaka: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Nie udało się dodać zwierzaka.');
        }
    }
    // Widok pojedynczego 
    public function show($id)
    {
        try {
            $data = $this->api->getPet($id);
        } catch (\Exception $e) {
            \Log::error("Błąd przy pobieraniu zwierzaka ID $id: " . $e->getMessage());
            return redirect()->route('pets.index')->with('error', 'Nie udało się pobrać danych o zwierzaku.');
        }
    
        if (!$data || isset($data['code']) && $data['code'] == 404) {
            return redirect()->route('pets.index')->with('error', 'Nie znaleziono zwierzaka.');
        }
    
        $pet = (object)[
            'id' => $data['id'],
            'name' => $data['name'],
            'status' => $data['status'],
            'category' => $data['category']['name'] ?? '',
            'tags' => collect($data['tags'] ?? [])->pluck('name')->implode(', '),
            'photo_url' => $data['photoUrls'][0] ?? null,
        ];
    
        return view('pets.show', compact('pet'));
    }
    
    //edycja
    public function edit($id)
    {
        try {
            $data = $this->api->getPet($id);
    
            if (!$data || !isset($data['id'])) {
                return redirect()->route('pets.index')->with('error', 'Nie znaleziono zwierzaka do edycji.');
            }
    
            $pet = (object)[
                'id' => $data['id'],
                'name' => $data['name'],
                'status' => $data['status'],
                'category' => $data['category']['name'] ?? '',
                'tags' => collect($data['tags'] ?? [])->pluck('name')->implode(', '),
                'photo_url' => $data['photoUrls'][0] ?? '',
            ];
    
            return view('pets.edit', compact('pet'));
        } catch (\Throwable $e) {
            // \Log::error("Błąd przy edycji zwierzaka ID $id: " . $e->getMessage());
            return redirect()->route('pets.index')->with('error', 'Wystąpił błąd podczas edycji.');
        }
    }
    

    //Aktualizacja 
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:available,pending,sold',
            'category' => 'nullable|string|max:255',
            'photo_url' => 'nullable|url',
            'tags' => 'nullable|string',
        ]);

        try {
            $validated['id'] = $id;

            $updated = $this->api->updatePet($validated);

            if (!$updated || !isset($updated['id'])) {
                return redirect()->back()->with('error', 'Aktualizacja nie powiodła się.');
            }

            return redirect()->route('pets.index')->with('success', 'Zwierzak zaktualizowany!');
        } catch (\Throwable $e) {
            // \Log::error("Błąd przy aktualizacji zwierzaka ID $id: " . $e->getMessage());
            return redirect()->back()->with('error', 'Wystąpił błąd przy aktualizacji.');
        }
    }


    
    //Usuwanie
    public function destroy($id)
    {
        session()->flash('deleted_id', $id);
        try {
            $result = $this->api->deletePet($id);
    
            // API może zwrócić null albo error
            if (isset($result['code']) && $result['code'] == 404) {
                return redirect()->route('pets.index')->with('error', 'Nie znaleziono zwierzaka.');
            }
    
            return redirect()->route('pets.index')->with('success', 'Zwierzak usunięty.');
        } catch (\Exception $e) {
            // \Log::error("Błąd przy usuwaniu zwierzaka ID {$id}: " . $e->getMessage());
    
            return redirect()->route('pets.index')->with('error', 'Nie udało się usunąć zwierzaka.');
        }
    }
    
    
}
