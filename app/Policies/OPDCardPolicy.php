<?php

namespace App\Policies;

use App\Models\OPDCard;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OPDCardPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    // 'triage_case',
    public function triage(User $user, OPDCard $opdcard)
    {
        return $user->abilities->contains('triage_case')
            && ! $opdcard->triage;
    }

    // 'exam_case',
    public function exam(User $user, OPDCard $opdcard)
    {
        return $user->abilities->contains('exam_case')
            && $opdcard->triage
            && ! $opdcard->exam_completed_at;
    }

    // 'procedure_case',
    public function procedure(User $user, OPDCard $opdcard)
    {
        return $user->abilities->contains('procedure_case')
            && $opdcard->triage
            && ! $opdcard->exam_completed_at;
    }

    // 'discharge_case',
    public function discharge(User $user, OPDCard $opdcard)
    {
        return $user->abilities->contains('discharge_case')
            && $opdcard->exam_completed_at;
    }

    // 'cancel_case',
    public function cancel(User $user, OPDCard $opdcard)
    {
        return $user->abilities->contains('cancel_case')
            && ! $opdcard->exam_completed_at;
    }
}
