<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use Response;
use Validator;


class DepartmentController extends Controller
{
    //
    public function department_add(Request $req)
    {
        // Validate the input data
        $validator = Validator::make($req->all(), [
            'department_name' => 'required',
            'department_code' => 'required'
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->toArray()
            ], 400);
        }

        // Create a new instance of the Department model
        $department = new Department();

        // Set the properties of the new department using the input data
        $department->department_name = $req->department_name;
        $department->department_code = $req->department_code;
        $department->status = 'active';

        // Save the new department to the database
        $department->save();

        // Return the new department
        return response()->json($department, 201);
    }

    public function department_modify(Request $req)
    {
        // Find the department in the database based on the provided department ID
        $department = Department::find($req->department_id);

        // Check if the department exists
        if (!$department) {
            return response()->json(['error' => 'Department not found'], 404);
        }

        // Update the status of the department
        $department->status = $req->department_status;

        // Save the modified department to the database
        $department->save();

        // Return a JSON response containing the modified department data
        return response()->json($department);
    }

    public function department_update(Request $req)
    {
        // Validate the input data
        $validator = Validator::make($req->all(), [
            'department_name' => 'required',
            'department_code' => 'required'
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 400);
        }

        // Find the department in the database
        $department = Department::find($req->department_id);

        // Check if the department exists
        if (!$department) {
            return response()->json([
                'success' => false,
                'errors' => ['Department not found']
            ], 404);
        }

        // Update the department properties
        $department->department_name = $req->department_name;
        $department->department_code = $req->department_code;
        $department->save();

        // Return the updated department data
        return response()->json($department);
    }
}
