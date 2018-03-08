<?php namespace App\Http\Controllers;

use App;
use App\Album;
use App\Jobs\IncrementModelViews;
use Illuminate\Http\Request;
use App\Http\Requests\ModifyAlbums;
use App\Services\Albums\AlbumsRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Services\Artists\ArtistAlbumsPaginator;

class AlbumController extends Controller {

    /**
     * @var Request
     */
    private $request;

    /**
     * @var AlbumsRepository
     */
    private $repository;

    /*
     * paginator for artist albums
     */
    private $albumsPaginator;


    /**
     * Create new AlbumController instance.
     *
     * @param AlbumsRepository $repository
     * @param Request $request
     * @param ArtistAlbumsPaginator $albumsPaginator
     */
	public function __construct(AlbumsRepository $repository, Request $request, ArtistAlbumsPaginator $albumsPaginator)
	{
        $this->request = $request;
        $this->repository = $repository;
        $this->albumsPaginator = $albumsPaginator;
    }

	/**
	 * Paginate all albums.
	 *
	 * @return LengthAwarePaginator
	 */
	public function index()
	{
		$this->authorize('index', Album::class);

		$artistId = $this->request->get('artist_id');

	    return is_null($artistId) ? $this->repository->paginate($this->request->all()) : $this->albumsPaginator->paginate($artistId);
	}

    /**
     * Get album matching specified ID.
     *
     * @param number $id
     * @return Album
     */
    public function show($id)
    {
        $this->authorize('show', Album::class);

        $album = $this->repository->load($id);

        dispatch(new IncrementModelViews($album->id, 'album'));

        return $album;
    }

    /**
     * Update existing album.
     *
     * @param  int $id
     * @param ModifyAlbums $validate
     * @return Album
     */
	public function update($id, ModifyAlbums $validate)
	{
		$this->authorize('update', Album::class);

	    return $this->repository->update($id, $this->request->all());
	}

    /**
     * Create a new album.
     *
     * @param ModifyAlbums $validate
     * @return Album
     */
    public function store(ModifyAlbums $validate)
    {
        $this->authorize('store', Album::class);

        return $this->repository->create($this->request->all());
    }

	/**
	 * Remove specified albums.
	 *
	 * @return mixed
	 */
	public function destroy()
	{
	    $this->authorize('destroy', Album::class);

        $this->validate($this->request, [
            'ids'   => 'required|array',
            'ids.*' => 'required|integer'
        ]);

	    $this->repository->delete($this->request->get('ids'));

	    return $this->success();
	}
}
