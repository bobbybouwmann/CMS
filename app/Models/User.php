<?php

namespace I9T\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['last_activity'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'first_name',
        'last_name',
        'student_id',
        'grade',
        'gender',
        'position',
        'password',
        'last_activity',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the users first and last name.
     *
     * Get the users first and last name, and if those do
     * not exist, return null
     *
     * @return null|string
     */
    public function getName()
    {
        if ($this->first_name && $this->last_name) {
            return "{$this->first_name} {$this->last_name}";
        }

        return null;
    }

    /**
     * Get the users first name or username
     *
     * If the user has set a first name, return that, otherwise
     * return the student_id
     *
     * @return mixed
     */
    public function getFirstNameOrStudentID()
    {
        if ($this->first_name) {
            return $this->first_name;
        }

        return $this->student_id;
    }

    /**
     * Get the users full name or student id
     *
     * Get the users full name or student id
     * by using the getName() function
     *
     * @return mixed|string
     */
    public function getNameOrStudentID()
    {
        if ($this->getName()) {
            return $this->getName();
        }

        return $this->student_id;
    }

    /**
     * Force the users first name to be camel case
     *
     * @param $value
     */
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = ucfirst(strtolower($value));
    }


    /**
     * Force the users last name to be camel case
     *
     * @param $value
     */
    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = ucfirst(strtolower($value));
    }

    /**
     * Check if the user has a specified position
     *
     * @param null $position
     * @return bool
     */
    public function hasPosition($position = null)
    {
        $position = is_array($position) ? $position : func_get_args();

        return in_array($this->position, $position);
    }

    /**
     * Get the users Gravatar avatar
     *
     * @param int $size
     * @return string
     */
    public function getAvatarUrl($size = 45)
    {
        return "https://www.gravatar.com/avatar/" . md5($this->email) . '?s=' . $size . '&d=mm';
    }
}
