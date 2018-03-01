<?php
/**
 * Created by PhpStorm.
 * User: tm30user
 * Date: 27/02/2018
 * Time: 1:58 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Artists\ArtistRequestRepository;

class ArtistRequestsController extends Controller
{
    /**
     * @var Request
     */
    private $request;

    /**
     * @var ArtistRequestRepository
     */
    private $repository;

    /**
     * Create new ArtistController instance.
     *
     * @param Request $request
     * @param ArtistRequestRepository $repository
     */
    public function __construct(Request $request, ArtistRequestRepository $repository)
    {
        $this->request = $request;
        $this->repository = $repository;
    }

    /**
     * Retrieve user's current request.
     *
     */
    public function get()
    {
//        $this->authorize('index', Artist::class);
        $response = $this->repository->get();
        \Log::info($response);
        return $response['status'] == true ? $this->success($response['body']) : $this->error($response['body']);
    }


    /**
     * Create a new artist request.
     * @return
     */
    public function create()
    {
//        $this->authorize('store', Artist::class);
        $response = $this->repository->create($this->request->all());
        \Log::info($response);
        return $response['status'] === true ? $this->success($response['body']) : $this->error($response['body']);
    }

}