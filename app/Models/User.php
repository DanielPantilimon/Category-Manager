<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Departments;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


// The method departments as you've written it suggests that it should define a relationship where a User model belongs to a single Departments model.
// However, the method name departments (plural) typically implies a one-to-many or many-to-many relationship,
// which is not the case with a belongsTo relationship.
// For a belongsTo relationship, the method name is usually singular because it returns a single instance of the related model.

// If your intention is that each user belongs to one department, then the method should be named department (singular) to reflect that relationship accurately:

// This method defines a one-to-one relationship where each user belongs to one department.
// Laravel will assume that there is a department_id column in your users table that is used as the foreign key to reference the id column of the departments table.

// Here's what it means in detail:

// belongsTo: This indicates that the User model has a one-to-one relationship with the Departments model. Each user belongs to one department.
// Departments::class: This is the related model that the User model is associated with. It tells Laravel to look for a model named Departments.
// If you have a department_id column in your users table, Laravel will use that column to match the id of the department in the departments table.
// If you need to specify a different column name or a different primary key on the departments table, you can pass them as additional arguments to the belongsTo method:


/*     public function department(){
        return $this->belongsTo(Departments::class, 'foreign_key', 'other_key');
    } */

// foreign_key: The name of the foreign key column on the users table that references the departments table (defaults to department_id).
// other_key: The name of the primary key column on the departments table that is referenced by the users table (defaults to id).

// In summary, if each user is associated with one department, your method should be named department (singular) and use the
// belongsTo relationship. If the method is named departments (plural), it suggests a different type of relationship,
// which could be confusing.

public function departments(){
    return $this->belongsTo(Departments::class, 'department_id', 'department_id');
}


public function department(){
    return $this->belongsTo(Departments::class, 'department_id', 'department_id');
}



public function is_admin(){
    if($this->admin){
        return true;
    }

    return false;
}


}
