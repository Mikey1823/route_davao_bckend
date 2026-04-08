<?php

declare(strict_types=1);

return [
    'file' => [
        'corrupted' => 'The requested file is corrupted or unreadable.',
        'unstorable' => 'The requested file cannot be stored securely.',
    ],
    'auth' => [
        'unauthenticated' => 'You must be logged in to access this resource.',
        'forbidden' => 'You do not have permission to access this resource.',
        'deactivated' => 'Your account has been deactivated. Please contact support for assistance.',
        'registration' => [
            'failed' => 'Registration failed. Please try again later.',
            'token_generation' => [
                'failed' => 'Failed to generate authentication token. Please try logging in.',
            ],
        ],
        'login' => [
            'failed' => 'The provided credentials do not match our records.',
            'unauthorized' => 'You are not authorized to access the admin panel.',
            'not_verified' => 'Your account is not verified. Please check your OTP and try again.',
            'proceed_to_register' => 'No account found with the provided credentials. Please proceed to register.',
            'token_generation' => [
                'failed' => 'Failed to generate authentication token. Please try again.',
            ],
        ],
        'otp' => [
            'invalid' => 'The provided OTP is invalid or has expired.',
            'send_failed' => 'Failed to send OTP. Please try again later.',
            'sent_to' => 'We have sent an OTP to :username.',
            'sms' => 'Your :app_name verification code is: :otp.',
        ],
        'throttle' => 'Too many attempts. Please try again in :date.',
        'verification' => [
            'already_verified' => 'Your account has already been verified.',
            'success' => 'Your account has been successfully verified.',
            'failed' => 'Verification failed. Please check the OTP and try again.',
            'resend_success' => 'A new verification OTP has been sent to your username.',
            'resend_failed' => 'Failed to resend verification OTP. Please try again later.',
        ],
    ],
    'validation' => [
        'phone' => 'Please use a valid Philippine phone number.',
        'phone_number' => 'Please use a valid Philippine phone number.',
    ],
    'form' => [
        'submission_success' => 'Form submitted successfully.',
        'submission_failed' => 'Form submission failed. Please try again later.',
    ],
    'server' => [
        'error' => 'An unexpected server error occurred. Please try again later.',
    ],
    'sms' => [
        'send_failed' => 'Failed to send SMS. Please try again later.',
    ],

];
