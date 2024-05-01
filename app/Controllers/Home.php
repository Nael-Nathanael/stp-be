<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        if (session()->get("logged_in")) {
            return redirect()->route("dashboard.landing.index");
        }
        return view('_pages/login');
    }

    public function do_auth()
    {
        if ($this->request->getPost("password") == "admin") {
            session()->set("logged_in", true);
            session()->set("STP_isDev", false);

            return redirect()->route("dashboard.landing.index");
        } elseif ($this->request->getPost("password") == "dev") {
            session()->set("logged_in", true);
            session()->set("STP_isDev", true);

            return redirect()->route("dashboard.landing.index");
        }
        return redirect()->to(base_url());
    }

    public function do_change_lag()
    {
        $backUrl = $this->request->getGet("url");
        session()->set("LANG", $this->request->getPost("lang"));
        return redirect()->to($backUrl);
    }

    public function do_logout()
    {
        session()->destroy();
        return redirect()->to(base_url());
    }
}
