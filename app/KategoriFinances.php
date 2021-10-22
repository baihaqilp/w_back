<?php

namespace App;

use Approval\Traits\RequiresApproval;
use Illuminate\Database\Eloquent\Model;

class KategoriFinances extends Model
{
    use RequiresApproval;
    protected $table = 'kategoris';
   

    protected function requiresApprovalWhen(array $modifications) : bool
{
    // Handle some logic that determines if this change requires approval
    //
    // Return true if the model requires approval, return false if it
    // should update immediately without approval.
    return true;
}
}
