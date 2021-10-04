<?php
use App\Models\User;

function AuthData(){
    return Auth::user();
}
function listAllUsers(){
    return User::all();
}
