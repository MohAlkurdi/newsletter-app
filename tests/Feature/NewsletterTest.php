<?php
use App\Mail\Newsletter;
use App\Models\SendEmail;
use App\Models\Subscriber;
use Illuminate\Foundation\Testing\RefreshDatabase;

// it('check if a user can subscribe to the newsletter and see the success message', function () {
//     $response = $this->post(
//         '/subscribe',
//         ['email' => 'a@a.com']
//     );

//     $response->assertRedirect('/');
//     $this->assertTrue(session()->has('success'));
// });

uses(RefreshDatabase::class);

it('allows a user to subscribe and see success message', function () {
    $response = $this->post('/subscribe', ['email' => 'test@example.com']);

    $response->assertRedirect('/');
    expect(session('success'))->toBe('You have subscribed successfully!');
});

it('displays the email', function () {
    $subscriber = Subscriber::factory()->create(['email' => 'test@example.com']);

    $response = $this->get('/');

    $response->assertSee($subscriber->email);
});

it('allows a user to unsubscribe', function () {
    $subscriber = Subscriber::factory()->create();
    $unsubscribeUrl = route('unsubscribe', ['email' => $subscriber->email, 'hash' => $subscriber->unsubscribe_hash]);

    $response = $this->get($unsubscribeUrl);

    $response->assertViewIs('mail.unsubscribe_confirmation');
    expect($subscriber->refresh()->unsubscribed_at)->not()->toBeNull();
});
