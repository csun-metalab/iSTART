<?php

namespace App\Http\Controllers;

use App\Events\ModulesEvent;
use App\Models\ModuleProgress;
use App\Jobs\SendReminderModuleEmail;
use Illuminate\Http\Request;
use App\Contracts\ModuleProgressContract;
use App\Jobs\SendNewModuleEmail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use App\Models\ModuleProgress;

class ModuleProgressController extends Controller
{
    protected $moduleProgressUtility = null;

    public function __construct(ModuleProgressContract $moduleProgressContract)
    {
        $this->moduleProgressUtility = $moduleProgressContract;
    }

    public function getModuleProgress(Request $request)
    {
        $validator = $request->validate([
            'user_id' => 'required',
            'current_module' => 'required',
        ]);

        $data = [
            'user_id' => $request->user_id,
            'current_module' => $request->current_module,
        ];

        return $this->moduleProgressUtility->getModuleProgress($data);
    }

    public function setModuleProgress(Request $request)
    {
        $validator = $request->validate([
            'user_id' => 'required',
            'current_module' => 'required',
            'current_page' => 'required',
            'max_page' => 'required'
        ]);

        $data = [
            'user_id' => $request->user_id,
            'current_module' => $request->current_module,
            'current_page' => $request->current_page,
            'max_page' => $request->max_page
        ];

        $this->moduleProgressUtility->getModuleProgress($data);
    }
    public function moduleComplete(Request $request){

        $user = $request->all();
        $moduleComplete = ModuleProgress::find($user['user_id']);

        $job = (new SendNewModuleEmail($moduleComplete))
            ->delay(Carbon::now()->addSeconds(env('MODULE_COMPLETION')));
        $this->dispatch($job);


        return 'true';
    }

    public function remindUserofModule(Request $request){


        $user = $request->all();
        $moduleInfo = ModuleProgress::find($user['user_id']);

        $this->dispatch(new SendReminderModuleEmail($moduleInfo));


        return 'true';

    }
}
