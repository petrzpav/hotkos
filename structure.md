=== prezentační vrstva ====

ViewControllers:
- PlanViewController
 -- getViewEvaulation (for week)

- PageViewController
 -- getViewIndex
 -- getViewLogin
 -- getViewRegistration
 -- getViewActivities
 -- getViewPlans
 -- getViewLogs

Views
- layout (to extend)
- main (show friend requests, plans dashboard) => filter by userID, default current user
- login
- registation
- activities
- plans
- logs


=== business vrstva ===

Controllers:
- PlanController
 -- new
 -- update ((de)activate, ..)
 -- copy (from friend)
 -- addActivity
 -- updateActivity (disable old activity && new Activity)
 -- removeActivity (disable activity)

- ReviewController
 -- new (week, plan) => for every activities

- UserController
 -- findByName
 -- createFriend
 -- acceptFriend (reject)
 -- update
 -- register
 -- login
 -- logout

- ActivityController
 -- new
 -- update

- LogController
 -- new (incl. log to activities)


=== Datová vrstva ===

Models
