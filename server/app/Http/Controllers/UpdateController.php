<?php namespace App\Http\Controllers;

use DB;
use Cache;
use Artisan;
use Exception;
use App\Setting;
use App\Services\DotEnvEditor;

class UpdateController extends Controller {
    /**
     * @var DotEnvEditor
     */
    private $dotEnvEditor;

    /**
     * @var Setting
     */
    private $setting;

    /**
     * UpdateController constructor.
     *
     * @param DotEnvEditor $dotEnvEditor
     * @param Setting $setting
     */
	public function __construct(DotEnvEditor $dotEnvEditor, Setting $setting)
	{
	    if ( ! config('site.disable_update_auth')) {
            $this->middleware('auth');
        }

        $this->setting = $setting;
        $this->dotEnvEditor = $dotEnvEditor;
    }

    /**
     * Show update view.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        return view('update');
    }

    /**
     * Perform the update.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update()
	{
        //fix "index is too long" issue on MariaDB and older mysql versions
        \Schema::defaultStringLength(191);

        Artisan::call('migrate', ['--force' => 'true']);
        Artisan::call('db:seed', ['--force' => 'true']);

        //set albums table collation and charset to utf8mb4
        try {
            DB::statement('ALTER TABLE '.DB::getTablePrefix().'albums CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;');
            DB::statement('ALTER TABLE '.DB::getTablePrefix().'tracks CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;');
            DB::statement('ALTER TABLE '.DB::getTablePrefix().'artists CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;');
            DB::statement('ALTER TABLE '.DB::getTablePrefix().'pages CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;');
            DB::statement('ALTER TABLE '.DB::getTablePrefix().'playlists CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;');
        } catch (Exception $e) {
            //
        }

        //versions earlier then 2.1.8 were using symlinmks by default
        if (version_compare(config('site.version'), '2.1.8') === -1) {
            $this->dotEnvEditor->write(['USE_SYMLINKS' => true]);
            Artisan::call('storage:symlink');
        }

        //radio provider should always be spotify
        $this->setting->where('name', 'radio_provider')->update(['value' => 'Spotify']);

        $version = $this->getAppVersion();
        $this->dotEnvEditor->write(['app_version' => $version]);

        Cache::flush();

        return redirect()->back()->with('status', 'Updated the site successfully.');
	}


    /**
     * Get new app version.
     *
     * @return string
     */
    private function getAppVersion()
    {
        try {
            return $this->dotEnvEditor->load(base_path('.env.example'))['app_version'];
        } catch (Exception $e) {
            return '2.1.8';
        }
    }
}