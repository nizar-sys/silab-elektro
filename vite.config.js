import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',

                'resources/js/auth/script.js',
                'resources/js/main.js',
                'resources/js/search/script.js',
                'resources/js/app-logistics-dashboard.js',
                'resources/js/console/roles/script.js',
                'resources/js/console/users/script.js',
                'resources/js/console/users/edit_script.js',
                'resources/js/console/users/show_script.js',

                'resources/js/console/attendances/script.js',
                'resources/js/console/attendances/edit_script.js',

                'resources/js/console/borrows/script.js',
                'resources/js/console/borrows/edit_script.js',
                'resources/js/console/borrows/show_script.js',

                'resources/js/console/inventories/script.js',
                'resources/js/console/inventories/edit_script.js',

                'resources/js/console/permissions/script.js',

                'resources/js/console/practical_items/script.js',
                'resources/js/console/practical_items/edit_script.js',
                'resources/js/console/practical_items/show_script.js',

                'resources/js/console/practical_values/script.js',
                'resources/js/console/practical_values/edit_script.js',
                'resources/js/console/practical_values/show_script.js',

                'resources/js/console/practicals/script.js',
                'resources/js/console/practicals/edit_script.js',

                'resources/js/console/rooms/script.js',
                'resources/js/console/rooms/edit_script.js',
                'resources/js/console/rooms/show_script.js',

                'resources/js/console/schedules/script.js',
                'resources/js/console/schedules/edit_script.js',
                'resources/js/console/schedules/show_script.js',

                'resources/js/console/students/script.js',
                'resources/js/console/students/edit_script.js',

                'resources/js/console/subjects/script.js',
                'resources/js/console/subjects/edit_script.js',
                'resources/js/console/subjects/show_script.js',

                'resources/js/profile/script.js',
            ],
            refresh: true,
        }),
    ],
});
