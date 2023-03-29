<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class EditController extends Controller
{

    public function destroy($id)
    {
        $admin = Admin::find($id);
        $admin->delete();

        return redirect()->back()->with('success', 'Admin deleted successfully.');
    }

}
