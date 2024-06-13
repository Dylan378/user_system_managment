This is a User Management System:
This system uses vue components for authentication and profile views, as well as blade with tailwind for a better a clean design.

### Setup:
1. Clone the repository in your local machine
2. Install all composer dependencies
3. Create and configure the `.env` file 
4. Set up the database:
    1. To set up the database you need to create two MySQL databases, one for the app, and one for testing.
    2. The first one should be named: `challenge_dylan_celis`
    3. The second one should be named: `challenge_test`
5. Run migrations and seed the database with the command:
    ```bash
    php artisan migrate:fresh --seed
    ```
6. Run the following commands in your console:
    ```bash
    npm run dev
    php artisan serve
    ```
7. Test the system by running:
    ```bash
    php artisan test
    ```