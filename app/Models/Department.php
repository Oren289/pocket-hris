<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'code',
        'description',
        'head_employee_id',
    ];

    /**
     * The employee who heads this department.
     */
    public function head(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'dept_head_id');
    }

    /**
     * Employees belonging to this department.
     *
     * Requires a `department_id` foreign key on the employees table
     * (not included yet, since the employees migration currently
     * stores department as a plain string).
     */
    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class, 'department_id');
    }
}