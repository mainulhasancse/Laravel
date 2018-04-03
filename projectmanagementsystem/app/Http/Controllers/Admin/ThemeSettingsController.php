<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Reply;
use App\Http\Requests\UpdateThemeSetting;
use App\Setting;
use App\ThemeSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ThemeSettingsController extends AdminBaseController
{

    public function __construct() {
        parent:: __construct();
        $this->pageTitle = __('app.menu.themeSettings');
        $this->pageIcon = 'icon-settings';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['adminTheme'] = ThemeSetting::where('panel', 'admin')->first();
        $this->data['projectAdminTheme'] = ThemeSetting::where('panel', 'project_admin')->first();
        $this->data['employeeTheme'] = ThemeSetting::where('panel', 'employee')->first();
        $this->data['clientTheme'] = ThemeSetting::where('panel', 'client')->first();
        return view('admin.theme-settings.edit', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateThemeSetting $request)
    {
        $adminTheme = ThemeSetting::where('panel', 'admin')->first();
        $adminTheme->header_color = $request->theme_settings[1]['header_color'];
        $adminTheme->sidebar_color = $request->theme_settings[1]['sidebar_color'];
        $adminTheme->sidebar_text_color = $request->theme_settings[1]['sidebar_text_color'];
        $adminTheme->link_color = $request->theme_settings[1]['link_color'];
        $adminTheme->save();

        $projectAdminTheme = ThemeSetting::where('panel', 'project_admin')->first();
        $projectAdminTheme->header_color = $request->theme_settings[2]['header_color'];
        $projectAdminTheme->sidebar_color = $request->theme_settings[2]['sidebar_color'];
        $projectAdminTheme->sidebar_text_color = $request->theme_settings[2]['sidebar_text_color'];
        $projectAdminTheme->link_color = $request->theme_settings[2]['link_color'];
        $projectAdminTheme->save();

        $employeeTheme = ThemeSetting::where('panel', 'employee')->first();
        $employeeTheme->header_color = $request->theme_settings[3]['header_color'];
        $employeeTheme->sidebar_color = $request->theme_settings[3]['sidebar_color'];
        $employeeTheme->sidebar_text_color = $request->theme_settings[3]['sidebar_text_color'];
        $employeeTheme->link_color = $request->theme_settings[3]['link_color'];
        $employeeTheme->save();

        $clientTheme = ThemeSetting::where('panel', 'client')->first();
        $clientTheme->header_color = $request->theme_settings[4]['header_color'];
        $clientTheme->sidebar_color = $request->theme_settings[4]['sidebar_color'];
        $clientTheme->sidebar_text_color = $request->theme_settings[4]['sidebar_text_color'];
        $clientTheme->link_color = $request->theme_settings[4]['link_color'];
        $clientTheme->save();

        $setting = Setting::find(1);
        if ($request->hasFile('login_background')) {
            $request->login_background->storeAs('public', 'login-background.jpg');
            $setting->login_background = 'login-background.jpg';
        }
        $setting->save();

        return Reply::redirect(route('admin.theme-settings.index'), __('messages.settingsUpdated'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}