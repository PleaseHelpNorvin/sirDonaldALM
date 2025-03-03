<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Attributes\Test;
use Illuminate\Support\Facades\Log;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_registers_a_new_user()
    {
        Log::info('Running test: it_registers_a_new_user');
        
        // Test Data
        $userData = [
            'last_name' => 'Doe',
            'first_name' => 'John',
            'middle_name' => 'Smith',
            'gender' => 'male',
            'birthdate' => '1995-06-15',
            'address' => '123 Main St',
            'email' => 'johndoe@example.com',
            'contact_no' => '1234567890',
            'username' => 'johndoe',
            'password' => 'Password@123',
            'password_confirmation' => 'Password@123',
        ];

        // Post request to register route
        $response = $this->post(route('register.submit'), $userData);

        // Assertions
        $this->assertDatabaseHas('users', ['email' => 'johndoe@example.com']);
        $this->assertAuthenticated();
        $response->assertRedirect(route('dashboard.view'));
        
        Log::info('Test passed: it_registers_a_new_user');
    }

    #[Test]
    public function it_requires_valid_registration_data()
    {
        Log::info('Running test: it_requires_valid_registration_data');
        
        // Submit an empty form to test validation
        $response = $this->post(route('register.submit'), []);
        
        // Check that the response contains validation errors for required fields
        $response->assertSessionHasErrors([
            'last_name', 'first_name', 'gender', 'birthdate', 'address',
            'email', 'contact_no', 'username', 'password'
        ]);
        
        Log::info('Test passed: it_requires_valid_registration_data');
    }

    #[Test]
    public function it_prevents_registration_with_duplicate_email()
    {
        Log::info('Running test: it_prevents_registration_with_duplicate_email');
        
        // Create a user with the same email
        User::factory()->create([
            'email' => 'johndoe@example.com',
        ]);

        // Attempt to register with the same email
        $userData = [
            'last_name' => 'Doe',
            'first_name' => 'John',
            'gender' => 'male',
            'birthdate' => '1995-06-15',
            'address' => '123 Main St',
            'email' => 'johndoe@example.com',
            'contact_no' => '1234567890',
            'username' => 'johndoe',
            'password' => 'Password@123',
            'password_confirmation' => 'Password@123',
        ];

        $response = $this->post(route('register.submit'), $userData);
        
        // Assert error message for duplicate email
        $response->assertSessionHasErrors(['email']);
        
        Log::info('Test passed: it_prevents_registration_with_duplicate_email');
    }

    #[Test]
    public function it_logs_in_a_user_with_correct_credentials()
    {
        Log::info('Running test: it_logs_in_a_user_with_correct_credentials');
        
        // Create a user
        $user = User::factory()->create([
            'email' => 'johndoe@example.com',
            'password' => Hash::make('Password@123'),
        ]);

        // Simulate login with correct credentials
        $response = $this->post(route('authenticate'), [
            'email' => 'johndoe@example.com',
            'password' => 'Password@123',
        ]);

        // Assertions
        $this->assertAuthenticatedAs($user);
        $response->assertRedirect(route('dashboard.view'));

        Log::info('Test passed: it_logs_in_a_user_with_correct_credentials');
    }

    #[Test]
    public function it_prevents_login_with_invalid_credentials()
    {
        Log::info('Running test: it_prevents_login_with_invalid_credentials');
        
        // Create a user
        User::factory()->create([
            'email' => 'johndoe@example.com',
            'password' => Hash::make('Password@123'),
        ]);

        // Attempt login with incorrect credentials
        $response = $this->post(route('authenticate'), [
            'email' => 'johndoe@example.com',
            'password' => 'WrongPassword',
        ]);

        // Assert user is not authenticated
        $this->assertGuest();
        $response->assertSessionHasErrors(['email']);
        
        Log::info('Test passed: it_prevents_login_with_invalid_credentials');
    }

    #[Test]
    public function it_logs_out_a_user()
    {
        Log::info('Running test: it_logs_out_a_user');
        
        // Create and authenticate a user
        $user = User::factory()->create();
        $this->actingAs($user);

        // Simulate logout
        $response = $this->post(route('logout'));

        // Assertions
        $this->assertGuest();
        $response->assertRedirect(route('login.view'));

        Log::info('Test passed: it_logs_out_a_user');
    }
}
