<?php

namespace Database\Seeders;

use App\Models\Ability;
use App\Models\Role;
use Illuminate\Database\Seeder;

class AbilityRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $abilities = [
            'view_any_cases',
            'create_case',
            'triage_case',
            'exam_case',
            'procedure_case',
            'discharge_case',
            'cancel_case',
        ];

        foreach ($abilities as $ability) {
            Ability::create(['name' => $ability]);
        }

        $roles = [
            'officer',
            'nurse',
            'gp_md',
            'er_md',
        ];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        $officer = Role::whereName('officer')->first();
        $officer->allowTo('view_any_cases');
        $officer->allowTo('create_case');
        $officer->allowTo('cancel_case');

        $nurse = Role::whereName('nurse')->first();
        $nurse->allowTo('view_any_cases');
        $nurse->allowTo('triage_case');
        $nurse->allowTo('discharge_case');

        $gp_md = Role::whereName('gp_md')->first();
        $gp_md->allowTo('view_any_cases');
        $gp_md->allowTo('exam_case');

        $er_md = Role::whereName('er_md')->first();
        $er_md->allowTo('view_any_cases');
        $er_md->allowTo('exam_case');
        $er_md->allowTo('procedure_case');
    }
}
