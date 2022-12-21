<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Requests\V1\StoreDocumentsRequest;
use App\Http\Requests\V1\UpdateDocumentsRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\DocumentsResource;
use App\Http\Resources\V1\DocumentsCollection;
use App\Models\Documents;
use App\Filters\V1\DocumentsFilter;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illumninate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $filter = new DocumentsFilter();
        $queryItems = $filter->transform($request); // [[column, operator, value]]

        if (count($queryItems) == 0) {
            return new DocumentsCollection(Documents::all());
        } else {
            return new DocumentsCollection(Documents::where($queryItems)->get());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDocumentsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocumentsRequest $request)
    {
        return new DocumentsResource(Documents::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function show(Documents $document)
    {
        return new DocumentsResource($document);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocumentsRequest  $request
     * @param  \App\Models\Documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocumentsRequest $request, Documents $document)
    {
        $document->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Documents  $documents
     * @return \Illuminate\Http\Response
     */
    public function destroy(Documents $document)
    {
        $document->delete();
    }
}
