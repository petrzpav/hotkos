<?php

namespace App\Http\Controllers;

use App\Models\Pokoj;
use Illuminate\Http\Request;

use Auth;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class PageViewController extends Controller
{

    /**
     * Show main page
     */
    public function getViewIndex() {
      $freeRooms = Pokoj::where('rezervovany', 0)->get();
      return view('main', [
        'freeRooms' => $freeRooms,
      ]);
    }
    /**
     * Zobrazuje stránku s editací plánu
     * @param  int  $id Identifikátor plánu.
     * @return View
     */
    public function getEditPlan($id) {
      $plan = Plan::find($id);
      $activities = $plan->activitiesPlan;
      return view('editplan', [
        'plan' => $plan,
        'activities' => $activities
      ]);
    }

    /**
     * Zpracovává požadavek na vytvoření nového plánu
     * @param  Request $r           požadavek
     * @return RedirectResponse     přesměrování s chybovou / úspěšnou hláškou
     */
    public function newPlan(Request $r) {
      $user = Auth::user();
      $errors = app('App\Http\Controllers\Business\PlanController')
        ->newPlan($r->input('name'), $r->input('description'), $user->user_ID);
      if(!is_null($errors)) return back()->withInput()->withErrors($errors);
      $lastid = DB::getPdo()->lastInsertId();
      return redirect()
        ->action('PageViewController@getEditPlan', $lastid)
        ->with('success', sprintf("Plán %s byl úspěšně vytvořen", $r->input('name')));
    }

    /**
     * Zpracovává požadavek na editaci plánu
     * @param  Request $r           požadavek
     * @param  int  $planid         identifikátor plánu
     * @return RedirectResponse     přesměrování s chybovou / úspěšnou hláškou
     */
    public function postEditPlan(Request $r, $planid) {
      $errors = app('App\Http\Controllers\Business\PlanController')
        ->editPlan($planid, $r->input('name'), $r->input('description'));
      if(!is_null($errors)) return back()->withInput()->withErrors($errors);
      return redirect()
        ->action('PageViewController@getEditPlan', $planid)
        ->with('success', sprintf("Plán %s byl úspěšně upraven", $r->input('name')));
    }

    /**
     * Zpracovává požadavek na odstranění aktivity z plánu
     * @param  Request $r          požadavek
     * @param  int  $planid        Identifikátor plánu, ze kterérho se odebírá aktivita.
     * @param  int  $activityid    Identiikátor aktivity, která se odebírá.
     * @return RedirectResponse    přesměrování s chybovou / úspěšnou hláškou
     */
    public function removeActivity(Request $r, $planid, $activityid) {
      $errors = app('App\Http\Controllers\Business\PlanController')
        ->removeActivity($activityid);
      if(!is_null($errors)) return back()->withInput()->withErrors($errors);
      return redirect()
        ->action('PageViewController@getEditPlan', $planid)
        ->with('success', sprintf("Aktivita %s byla úspěšně odstraněna z plánu", $r->input('activity')));
    }

    /**
     * Přidání jedné či více aktivit k danému plánu
     * @param Request $r      požadavek
     * @param int  $planid    identifikátor plánu
     */
    public function addActivity(Request $r, $planid) {
      $errors = [];
      $activities = [$r->input("activityid")];
      $it = new \RecursiveIteratorIterator(new \RecursiveArrayIterator($activities));
      foreach($it as $activityid) {
        $e = app('App\Http\Controllers\Business\PlanController')
          ->addActivity($planid, $activityid, $r->input("quantity$activityid"), $r->input("description$activityid"));
        if(is_null($e)) continue;
        $errors = array_merge($errors, $e);
      }
      if(count($errors)) return back()->withInput()->withErrors($errors);
      return redirect()
        ->action('PageViewController@getEditPlan', $planid)
        ->with('success', "Aktivity byly úspěšně přidány k plánu");
    }

}
