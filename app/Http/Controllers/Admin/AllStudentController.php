<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AllStudentController extends Controller
{
    public function index()
    {
        $view = "AdminPanel.allstudent";
        $users = User::paginate(10); 

        return view('AdminView', compact('view', 'users'));
    }
}
