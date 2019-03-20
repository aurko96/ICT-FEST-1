<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ps = Project::all();
        return view('project_showcasing/list')->with('pss',$ps);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project_showcasing/register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_pc = new Project;
        $new_pc->team_name = $request->team_name;
        $new_pc->institution = $request->institution;
        $new_pc->total = 2500;
        $new_pc->paid = 0;
        $new_pc->selected = 'False';


        $new_pc->member_1_name =    $request->member_1_name;
        $new_pc->member_1_contact = $request->member_1_contact;
        $new_pc->member_1_email =   $request->member_1_email;
        $new_pc->member_1_tshirt =  $request->member_1_tshirt;

        $new_pc->member_2_name =    $request->member_2_name;
        $new_pc->member_2_contact = $request->member_2_contact;
        $new_pc->member_2_email =   $request->member_2_email;
        $new_pc->member_2_tshirt =  $request->member_2_tshirt;

        $new_pc->member_3_name =    $request->member_3_name;
        $new_pc->member_3_contact = $request->member_3_contact;
        $new_pc->member_3_email =   $request->member_3_email;
        $new_pc->member_3_tshirt =  $request->member_3_tshirt;
        
        
        
        $new_pc->save();
        alert()->success('Team has been added successfully.')->autoclose(3000);
       
        $ps = Project::all();
        return redirect()->route('ps_list')->with('pss',$ps);
    }

    public function store_front(Request $request)
    {
        $new_pc = new Project;
        $new_pc->team_name = $request->team_name;
        $new_pc->institution = $request->institution;
        $new_pc->total = 2500;
        $new_pc->paid = 0;
        $new_pc->selected = 'False';

        
        $new_pc->member_1_name =    $request->member_1_name;
        $new_pc->member_1_contact = $request->member_1_contact;
        $new_pc->member_1_email =   $request->member_1_email;
        $new_pc->member_1_tshirt =  $request->member_1_tshirt;

        $new_pc->member_2_name =    $request->member_2_name;
        $new_pc->member_2_contact = $request->member_2_contact;
        $new_pc->member_2_email =   $request->member_2_email;
        $new_pc->member_2_tshirt =  $request->member_2_tshirt;

        $new_pc->member_3_name =    $request->member_3_name;
        $new_pc->member_3_contact = $request->member_3_contact;
        $new_pc->member_3_email =   $request->member_3_email;
        $new_pc->member_3_tshirt =  $request->member_3_tshirt;
        
        $new_pc->save();
        alert()->success('Dear '.$request->team_name.', Your registration information has successfully been uploaded. Please check your e-mail and our website for further information.')->autoclose(120000);
        return redirect()->route('front');
    }



    public function delete($id)
    {
        $pc = Project::find($id);
        $pc->delete();
        alert()->warning('Team has been discarded successfully', 'Deleted')->autoclose(3000);
        $pp=Project::all();
        return redirect()->route('ps_list')->with('pss',$pp);
    }

    public function selection($id)
    {
        Project::find($id)->update(['selected' => 'True']);
        
        alert()->warning('Team has been selected successfully', 'Done')->autoclose(3000);
        $mm=Project::all();
        return redirect()->route('ps_list')->with('pss',$mm);
    }

    public function payment($id)
    {
        Project::find($id)->update(['paid' => Project::find($id)->total]);
        
        alert()->warning('Payment has been completed successfully', 'Done')->autoclose(3000);
        $mm=Project::all();
        return redirect()->route('ps_list')->with('pss',$mm);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
