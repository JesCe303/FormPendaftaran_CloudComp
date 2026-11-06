<?php

namespace Tests\Feature;

use App\Mail\RegistrationConfirmation;
use App\Mail\RegistrationNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_registration_is_saved_and_both_emails_are_sent(): void
    {
        Mail::fake();

        $response = $this->post(route('registration.store'), [
            'name' => 'Jessica Citra',
            'email' => 'jessica@example.com',
            'phone' => '08123456789',
            'institution' => 'Universitas Contoh',
            'category' => 'ui_ux',
            'motivation' => 'Saya ingin mengembangkan kemampuan desain dan bertemu peserta lain.',
        ]);

        $response->assertRedirect(route('registration.create'));
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('registrations', [
            'email' => 'jessica@example.com',
            'category' => 'ui_ux',
        ]);
        Mail::assertSent(RegistrationConfirmation::class, fn ($mail) => $mail->hasTo('jessica@example.com'));
        Mail::assertSent(RegistrationNotification::class, fn ($mail) => $mail->hasTo(config('mail.from.address')));
    }

    public function test_invalid_registration_is_not_saved(): void
    {
        $response = $this->post(route('registration.store'), [
            'name' => '',
            'email' => 'not-an-email',
            'category' => 'unknown',
        ]);

        $response->assertSessionHasErrors(['name', 'email', 'phone', 'institution', 'category', 'motivation']);
        $this->assertDatabaseCount('registrations', 0);
    }

    public function test_legacy_root_submission_is_also_processed(): void
    {
        Mail::fake();

        $response = $this->post('/', [
            'name' => 'Peserta Lama',
            'email' => 'peserta@example.com',
            'phone' => '08123456789',
            'institution' => 'Sekolah Contoh',
            'category' => 'programming',
            'motivation' => 'Saya ingin belajar dan mengembangkan kemampuan pemrograman.',
        ]);

        $response->assertRedirect(route('registration.create'));
        $this->assertDatabaseHas('registrations', ['email' => 'peserta@example.com']);
    }
}
