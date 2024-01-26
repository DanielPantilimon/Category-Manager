<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Departments extends Model
{

    protected $primaryKey = 'department_id';

    protected $fillable = [
        'name',
    ];

    protected $hidden = [
        'remember_token',
    ];


// In the Departments model, a method named user (singular) would typically suggest a one-to-one relationship,
// where each department is associated with a single user.
// However, this is not a common scenario, as departments usually have multiple users associated with them.
// Therefore, it's more likely that you would want to define a one-to-many relationship,
// which would mean that each department can have multiple users.

// For a one-to-many relationship, the method should be named in the plural form, such as users,
// to reflect that a department can have many users.
// Here's how you would define a one-to-many relationship in the Departments model:

/* public function users()
{
    return $this->hasMany(User::class, 'department_id', 'id');
} */

// In the above example:

// hasMany: This indicates that the Departments model has a one-to-many relationship with the User model. Each department can have many users.
// User::class: This is the related model that the Departments model is associated with. It tells Laravel to look for a model named User.
// 'department_id': The name of the foreign key column on the users table that references the departments table (defaults to department_id if the method name is users and the related model is User).
// 'id': The name of the primary key column on the departments table that is referenced by the users table (defaults to id).

// With this relationship defined, you can access all users associated with a department using $department->users,
// and Laravel will return a collection of User model instances that belong to that department.

    public function user(){
        return $this->hasMany(User::class, 'department_id', 'department_id');
    }

    public function childs() {
        return $this->hasMany(Departments::class,'parent_id','department_id') ;
    }

}
