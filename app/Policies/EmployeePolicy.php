<?php

namespace App\Policies;

use App\Models\Employee;
use App\Models\User;

class EmployeePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('employee_management');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Employee $employee): bool
    {
        if (! $user->hasPermissionTo('employee_management')) {
            return false;
        }

        if ($user->hasRole('System Manager')) {
            return true;
        }

        if ($user->hasRole(['Branch System Manager', 'Branch System Operator'])) {
            return $employee->branch_id == $user->branch_id;
        }

        if ($user->hasRole(['Sub-Branch System Manager', 'Sub-Branch System Operator'])) {
            return $employee->sub_branch_id == $user->sub_branch_id;
        }

        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('employee_management');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Employee $employee): bool
    {
        if (! $user->hasPermissionTo('employee_management')) {
            return false;
        }

        if ($user->hasRole('System Manager')) {
            return true;
        }

        if ($user->hasRole(['Branch System Manager', 'Branch System Operator'])) {
            return $employee->branch_id == $user->branch_id;
        }

        if ($user->hasRole(['Sub-Branch System Manager', 'Sub-Branch System Operator'])) {
            return $employee->sub_branch_id == $user->sub_branch_id;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Employee $employee): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Employee $employee): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Employee $employee): bool
    {
        return false;
    }

    public function managePosition(User $user, Employee $employee): bool
    {
        if (! $user->hasPermissionTo('employee_management')) {
            return false;
        }

        if ($user->hasRole('System Manager')) {
            return true;
        }

        if ($user->hasRole(['Branch System Manager', 'Branch System Operator'])) {
            return $employee->branch_id == $user->branch_id;
        }

        if ($user->hasRole(['Sub-Branch System Manager', 'Sub-Branch System Operator'])) {
            return $employee->sub_branch_id == $user->sub_branch_id;
        }

        return false;
    }

    public function manageEducation(User $user, Employee $employee): bool
    {
        if (! $user->hasPermissionTo('employee_management')) {
            return false;
        }

        if ($user->hasRole('System Manager')) {
            return true;
        }

        if ($user->hasRole(['Branch System Manager', 'Branch System Operator'])) {
            return $employee->branch_id == $user->branch_id;
        }

        if ($user->hasRole(['Sub-Branch System Manager', 'Sub-Branch System Operator'])) {
            return $employee->sub_branch_id == $user->sub_branch_id;
        }

        return false;
    }
}
