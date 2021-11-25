<?php

    namespace App\Http\Controllers;

    use Carbon\Carbon;
    use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
    use Illuminate\Foundation\Bus\DispatchesJobs;
    use Illuminate\Foundation\Validation\ValidatesRequests;
    use Illuminate\Routing\Controller as BaseController;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;

    class Controller extends BaseController
    {
        use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

        public function __construct ()
        {
            $this->middleware('auth');
        }

        public function deleteRecord ()
        {
            $user = Auth::user();
            $base_table = $_REQUEST['base_table'];
            $base_table_id_value = $_REQUEST['base_table_id'];
            DB::table($base_table)
              ->where('id', $base_table_id_value)
              ->update(
                  array('deletedstatus' => '1',
                      'deleted_by' => $user->id,
                      'deleted_at' => Carbon::now()->toDateTimeString()));
        }
    }
