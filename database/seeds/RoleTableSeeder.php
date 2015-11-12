<?php

use Illuminate\Database\Seeder;
use Bican\Roles\Models\Role;
use Bican\Roles\Models\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
            'name' => "Admin",
            'slug' => "admin",
            'description' => "Administrator",
            'level' => 30
        ]);

        $agent = Role::create([
            'name' => "Agent",
            'slug' => "agent",
            'description' => "Agent",
            'level' => 20
        ]);

        $client = Role::create([
            'name' => "Client",
            'slug' => "client",
            'description' => "Client",
            'level' => 10
        ]);

        $newTicketPermission = Permission::create([
            'name' => "Create new ticket",
            'slug' => "ticket.create",
            'description' => "Create new ticket"
        ]);

        $editTicketPermission = Permission::create([
            'name' => "Edit ticket",
            'slug' => 'ticket.edit',
            'description' => "Edit ticket"
        ]);

        $deleteTicketPermission = Permission::create([
            'name' => "Delete ticket",
            'slug' => 'ticket.delete',
            'description' => "Delete ticket"
        ]);

        $newUserPermission = Permission::create([
            'name' => "Create new user",
            'slug' => "user.create",
            'description' => "Create new user"
        ]);

        $editUserPermission = Permission::create([
            'name' => "Edit user",
            'slug' => 'user.edit',
            'description' => "Edit user"
        ]);

        $deleteUserPermission = Permission::create([
            'name' => "Delete user",
            'slug' => "user.delete",
            'description' => "Delete user"
        ]);

        $newDepartmentPermission = Permission::create([
            'name' => "Create new department",
            'slug' => "department.create",
            'description' => "Create new department"
        ]);

        $editDepartmentPermission = Permission::create([
            'name' => "Edit department",
            'slug' => "department.edit",
            'description' => "Edit department"
        ]);

        $deleteDepartmentPermission = Permission::create([
            'name' => "Delete department",
            'slug' => "department.delete",
            'description' => "Delete department"
        ]);

        $newPriorityPermission = Permission::create([
            'name' => "Create new priority",
            'slug' => "priority.create",
            'description' => "Create new priority"
        ]);

        $editPriorityPermission = Permission::create([
            'name' => "Edit priority",
            'slug' => "priority.edit",
            'description' => "Edit priority"
        ]);

        $deletePriorityPermission = Permission::create([
            'name' => "Delete priority",
            'slug' => "priority.delete",
            'description' => "Delete priority"
        ]);

        $newStatusPermission = Permission::create([
            'name' => "Create new status",
            'slug' => "status.create",
            'description' => "Create new status"
        ]);

        $editStatusPermission = Permission::create([
            'name' => "Edit status",
            'slug' => "status.edit",
            'description' => "Edit status"
        ]);

        $deleteStatusPermission = Permission::create([
            'name' => "Delete status",
            'slug' => "status.delete",
            'description' => "Delete status"
        ]);

        $newCommentPermission = Permission::create([
            'name' => "Create new comment",
            'slug' => "comment.create",
            'description' => "Create new comment"
        ]);

        $editCommentPermission = Permission::create([
            'name' => "Edit comment",
            'slug' => "comment.edit",
            'description' => "Edit comment"
        ]);

        $deleteCommentPermission = Permission::create([
            'name' => "Delete comment",
            'slug' => "comment.delete",
            'description' => "Delete comment"
        ]);

        $changeTicketStatusPermission = Permission::create([
            'name' => "Change ticket status",
            'slug' => "ticket.status.edit",
            'description'=> "Changing ticket status"
        ]);

        $indexPriorityPermission = Permission::create([
            'name' => "List priorities",
            'slug' => "priority.index",
            'description' => "List priorities"
        ]);

        $indexStatusPermission = Permission::create([
            'name' => "List statuses",
            'slug' => "status.index",
            'description' => "List statuses"
        ]);

        $admin->attachPermission($editTicketPermission);
        $admin->attachPermission($deleteTicketPermission);
        $admin->attachPermission($newUserPermission);
        $admin->attachPermission($editUserPermission);
        $admin->attachPermission($deleteUserPermission);
        $admin->attachPermission($newDepartmentPermission);
        $admin->attachPermission($editDepartmentPermission);
        $admin->attachPermission($deleteDepartmentPermission);
        $admin->attachPermission($newStatusPermission);
        $admin->attachPermission($editStatusPermission);
        $admin->attachPermission($deleteStatusPermission);
        $admin->attachPermission($newPriorityPermission);
        $admin->attachPermission($editPriorityPermission);
        $admin->attachPermission($deletePriorityPermission);
        $admin->attachPermission($newCommentPermission);
        $admin->attachPermission($editCommentPermission);
        $admin->attachPermission($deleteCommentPermission);
        $admin->attachPermission($changeTicketStatusPermission);
        $admin->attachPermission($indexPriorityPermission);
        $admin->attachPermission($indexStatusPermission);

        $agent->attachPermission($changeTicketStatusPermission);
        $agent->attachPermission($newCommentPermission);

        $client->attachPermission($newTicketPermission);
        $client->attachPermission($newCommentPermission);

    }
}
