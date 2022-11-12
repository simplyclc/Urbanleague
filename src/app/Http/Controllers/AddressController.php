<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use App\Http\Resources\AddressCollection;
use App\Http\Resources\AddressResource;
use Inertia\Inertia;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;

class AddressController extends Controller
{
    public function index() {

        $addr = Address::where('accountId', Auth::user()->accountId)->get();
        // dd($addr);
        return Inertia::render('Addr/Index', [
            'address' => new AddressCollection(
                $addr
            ),
        ]);
    }

    public function create() {
        return Inertia::render('Addr/Create');
    }

    public function store(StoreAddressRequest $request) {
        $validated = $request->validated();
        $user = Auth::user();
        $addr = Address::create([
          'firstName' => $request->firstName,
          'lastName' => $request->lastName,
          'streetAddress' => $request->streetAddress,
          'city' => $request->city,
          'state' => $request->state,
          'country' => $request->country,
          'zipcode' => $request->zipcode,
          'accountId' => $user->accountId,
        ]);

        return Redirect::route('address')->with('success', 'Address created.');
    }

    public function storeFromModal(StoreAddressRequest $request) {
        $validated = $request->validated();
        $user = Auth::user();
        $addr = Address::create([
          'firstName' => $request->firstName,
          'lastName' => $request->lastName,
          'streetAddress' => $request->streetAddress,
          'city' => $request->city,
          'state' => $request->state,
          'country' => $request->country,
          'zipcode' => $request->zipcode,
          'accountId' => $user->accountId,
        ]);

        return Redirect::back()->with('success', 'Address created.');
    }



    public function edit(Address $address) {
        return Inertia::render('Addr/Edit', [
            'address' => new AddressResource($address),
        ]);
    }

    public function update(Address $Address, UpdateAddressRequest $request) {
        $Address->update(
            $request->validated()
        );

        return Redirect::back()->with('success', 'Address updated.');
    }

    public function destroy(Address $Address) {
        $Address->delete();

        return Redirect::back()->with('success', 'Address deleted.');
    }

    public function restore(Address $Address) {
        $Address->restore();

        return Redirect::back()->with('success', 'Address restored.');
    }
}
