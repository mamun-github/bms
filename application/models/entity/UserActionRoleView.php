<?php

namespace entity;

class UserActionRoleView {
    public static $query = "
    select app_rl.user_id, app_rl.role_ids, app_ac.action_ids from
  (select app_user.id as user_id, group_concat(user_role.role_id) as role_ids from app_user
    left join user_role on user_role.user_id = app_user.id
  group by app_user.id) app_rl
  left join
  (select r_ac.role_id,
     case
     when (isnull(r_ac.ac_ids) and isnull(a_ac.ids)) then ''
     when (isnull(r_ac.ac_ids)) then a_ac.ids
     when (isnull(a_ac.ids)) then r_ac.ac_ids
     else concat(a_ac.ids, ',', r_ac.ac_ids)
     end
       as action_ids from
     (select role.id as role_id, group_concat(role_action.action_id) as ac_ids from role
       left join role_action on role_action.role_id = role.id
     group by role.id) r_ac,
     (select group_concat(id) as ids from action where action.is_anonymous = true) a_ac) app_ac
    on app_ac.role_id in (app_rl.role_ids)
    ";
}