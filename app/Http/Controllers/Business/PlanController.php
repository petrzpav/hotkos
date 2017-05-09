<?php

namespace App\Http\Controllers\Business;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Plan;
use App\Models\ActivitiesPlan;

class PlanController extends Controller {

  /**
   * Funkce vytvářející nový plán.
   * @param  String $name        jméno plánu
   * @param  String $description popisek plánu
   * @param  int $userid         identifikátor uživatele
   * @return Array|null          errors
   */
  public function newPlan($name, $description, $userid) {
    $plan = Plan::create([
      "name" => $name,
      "description" => $description,
      "active" => 1,
      "user_ID" => $userid
    ]);
    if($plan->hasErrors()) return $plan->getErrors();
    return null;
  }
  /**
   * Funkce pro změnění plánu.
   * @param  int $id             Identifikátor plánu ke změnění.
   * @param  string $name        Jméno plánu ke změnění.
   * @param  string $description Popis plánu ke změně.
   * @return Array|null
   */
  public function editPlan($id, $name, $description) {
    $plan = Plan::find($id);
    $plan->name = $name;
    $plan->description = $description;
    $plan->save();
    if($plan->hasErrors()) return $plan->getErrors();
    return null;
  }

  /**
   * Funkce pro odstranění aktivity.
   * @param  int  $id Identifikátor aktivity.
   * @return void
   */
  public function removeActivity($id) {
    $a = ActivitiesPlan::find($id);
    $a->active = 0;
    $a->save();
  }

  /**
   * Přidání aktvity k plánu
   * @param int $planid      identifikátor plánu
   * @param int $activityid  identifikátor aktivity
   * @param int $quantity    množství
   * @param int $description popis
   */
  public function addActivity($planid, $activityid, $quantity, $description) {
    $ap = ActivitiesPlan::create([
      "plan_ID" => $planid,
      "activity_ID" => $activityid,
      "description" => $description,
      "quantity" => $quantity,
      'active' => 1,
    ]);
    if($ap->hasErrors()) return $ap->getErrors();
    return null;
  }



}
