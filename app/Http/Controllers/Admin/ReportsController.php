<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Level;
use App\Salary;
use Config;
use DB;

class ReportsController extends Controller
{
    public function absent() {
        $students = DB::table('absents')
                ->join('students','absents.student_id','=','students.id')
                ->join('courses','absents.course_id','=','courses.id')
                ->join('centers','absents.center_id','=','centers.id')
                ->select('students.student_name','courses.course_name','centers.center_name','absents.*','students.national_id')
                ->orderBy('id', 'asc')
                ->get();

        return view('admin.pages.reports.absent', compact('students'));
    }

    public function counts() {
        $students = DB::table('payments')
                ->join('students','payments.student_id','=','students.id')
                ->select('students.student_name','payments.*','students.national_id')
                ->orderBy('id', 'asc')
                ->get();

        return view('admin.pages.reports.counts', compact('students'));
    }

    public function grades() {
        $students = DB::table('student_grades')
                ->join('students','student_grades.student_id','=','students.id')
                ->join('materials','student_grades.material_id','=','materials.id')
                ->join('centers','student_grades.center_id','=','centers.id')
                ->select('students.student_name','centers.center_name','materials.material_name','student_grades.*','students.national_id')
                ->orderBy('id', 'asc')
                ->get();

        return view('admin.pages.reports.grades', compact('students'));
    }

    public function attend() {
        $attends = DB::table('attend')
                ->join('teachers','attend.teacher_id','=','teachers.id')
                ->select('teachers.teacher_name','attend.*','teachers.national_id')
                ->orderBy('id', 'asc')
                ->get();

        return view('admin.pages.reports.attend', compact('attends'));
    }

    public function salariesReport() {
        $salaries = DB::table('salaries')
                ->join('teachers','salaries.teacher_id','=','teachers.id')
                ->select('salaries.*','teachers.teacher_name','teachers.national_id')
                ->where('status', 1)
                ->get();
        return view('admin.pages.reports.salaries', compact('salaries'));
    }

    public function store() {
        $counts = DB::table('payments')
                ->join('students','payments.student_id','=','students.id')
                ->select('students.student_name','payments.*','students.national_id')
                ->where('amount','>', 0)
                ->orderBy('id', 'asc')
                ->get();

        $total1 = DB::table('payments')
                ->select('amount')
                ->where('amount','>', 0)
                ->sum('amount');

        $salaries = DB::table('salaries')
                ->join('teachers','salaries.teacher_id','=','teachers.id')
                ->select('teachers.teacher_name','salaries.*','teachers.national_id')
                ->where('status','=', 1)
                ->orderBy('id', 'asc')
                ->get();

        $total2 = DB::table('salaries')
                ->select('final')
                ->where('status','=', 1)
                ->sum('final');

        return view('admin.pages.store', compact('counts','salaries','total1','total2'));
    }

}
