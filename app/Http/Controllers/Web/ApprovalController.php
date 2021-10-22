<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Approval;
use Approval\Models\Modification;
class ApprovalController extends Controller
{
    public function index()
    {
        $modifs = Modification::with('modifiable')->get();
        return view('eccomerce/Approval',['modifs'=>$modifs]);
    }
    public function konfirmasi(Request $request,$id){
        $modifs = Modification::find($id);
        $modifs->modifications()->changed()->get();
    }
}
