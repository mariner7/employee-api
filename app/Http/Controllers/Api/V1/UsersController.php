<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\UsersResource;
use App\Http\Resources\V1\UsersCollection;
use App\Models\Users;
use App\Filters\V1\UsersFilter;
use App\Http\Requests\V1\StoreUsersRequest;
use App\Http\Requests\V1\UpdateUsersRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illumninate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $filter = new UsersFilter();
        $filterItems = $filter->transform($request); // [[column, operator, value]]

        $includeDocuments = $request->query('includeDocuments');

        $users = Users::where($filterItems);
        
        if ($includeDocuments) {
            $users = $users->with('documents');
        }

        return new UsersCollection($users->paginate()->appends($request->query()));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {
        return new UsersResource(Users::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(Users $user)
    {
        $includeDocuments = request()->query('includeDocuments');

        if ($includeDocuments) {
            return new UsersResource($user->loadMissing('documents'));
        }
        return new UsersResource($user);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, Users $user)
    {
        $user->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(Users $user)
    {
        $user->delete();
    }
}
