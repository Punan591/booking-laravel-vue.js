<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    // $filters = $request->only([
    //     'priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo'
    // ]);
    // $query = Listing::orderByDesc('created_at');

    //   if ($filters['priceFrom'] ?? false) {
    //       $query->where('price', '>=', $filters['priceFrom']);
    //   }

    //   if ($filters['priceTo'] ?? false) {
    //       $query->where('price', '<=', $filters['priceTo']);
    //   }

    //   if ($filters['beds'] ?? false) {
    //       $query->where('beds', $filters['beds']);
    //   }

    //   if ($filters['baths'] ?? false) {
    //       $query->where('baths', $filters['baths']);
    //   }

    //   if ($filters['areaFrom'] ?? false) {
    //       $query->where('area', '>=', $filters['areaFrom']);
    //   }

    //   if ($filters['areaTo'] ?? false) {
    //       $query->where('area', '<=', $filters['areaTo']);
    //   }
   //  return inertia(
   //      'Listing/Index',
   //      [
   //          'filters' => $filters,
   //          'listings' => $query->paginate(10)
   //             ->withQueryString()
   //      ]
   //  );
    $filters = $request->only([
       'priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo'
    ]);
     return inertia(
        'Listing/Index',
         [
  //  'filters' => $filters,
  //  'listings' => Listing::orderByDesc('created_at')
  //      ->when(
  //          $filters['priceFrom'] ?? false,
  //          fn ($query, $value) => $query->where('price', '>=', $value)
  //      )->when(
  //          $filters['priceTo'] ?? false,
  //          fn ($query, $value) => $query->where('price', '<=', $value)
  //      )->when(
  //          $filters['beds'] ?? false,
  //          fn ($query, $value) => $query->where('beds', (int)$value < 6 ? '=' : '>=', $value)
  //      )->when(
  //          $filters['baths'] ?? false,
  //          fn ($query, $value) => $query->where('baths', (int)$value < 6 ? '=' : '>=', $value)
  //      )->when(
  //          $filters['areaFrom'] ?? false,
  //          fn ($query, $value) => $query->where('area', '>=', $value)
  //      )->when(
  //          $filters['areaTo'] ?? false,
  //          fn ($query, $value) => $query->where('area', '<=', $value)
  //      )->paginate(10)->withQueryString()
           //local scope for scopeMostRecent write -> mostRecent camelCase -> remove scope
            'filters' => $filters,
            'listings' => Listing::mostRecent()
                ->filter($filters)
                ->paginate(10)
                ->withQueryString()
           ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Listing $listing)
    {
        $listing->load(['images']);
        return inertia(
            'Listing/Show',
            [
                'listing' => $listing
            ]
        );
    }
}