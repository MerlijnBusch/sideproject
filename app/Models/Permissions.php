<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    use HasFactory;

    public function getAllPermissions() {
        try {
            $reflectionClass = new ReflectionClass($this);
            return $reflectionClass->getConstants();
        } catch (\ReflectionException $e) {
            abort(500, "Internal Server Error");
        }
    }

    public const __ADMIN__ = 'Admin';
}
