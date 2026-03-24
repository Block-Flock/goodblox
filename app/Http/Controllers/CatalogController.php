<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CatalogItem;

class CatalogController
{
    // Create a new catalog item
    public function create(Request $request): CatalogItem
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        $item = new CatalogItem();
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->save();

        return $item;
    }

    // Retrieve a catalog item
    public function show(int $id): ?CatalogItem
    {
        return CatalogItem::find($id);
    }

    // Update a catalog item
    public function update(Request $request, int $id): ?CatalogItem
    {
        $item = CatalogItem::find($id);
        if (!$item) {
            return null;
        }

        $this->validate($request, [
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
        ]);

        $item->name = $request->name ?: $item->name;
        $item->description = $request->description ?: $item->description;
        $item->price = $request->price ?: $item->price;
        $item->save();

        return $item;
    }

    // Delete a catalog item
    public function destroy(int $id): bool
    {
        $item = CatalogItem::find($id);
        if (!$item) {
            return false;
        }

        return $item->delete();
    }
}
