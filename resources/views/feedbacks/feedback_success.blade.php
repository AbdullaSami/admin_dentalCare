<!DOCTYPE html>
  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
      <head>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <meta name="csrf-token" content="{{ csrf_token() }}">

          <title>{{ config('app.name', 'Laravel') }}</title>

          <!-- Fonts -->
          <link rel="preconnect" href="https://fonts.bunny.net">
          <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

          <!-- Scripts -->
          @vite(['resources/css/app.css', 'resources/js/app.js'])
      </head>
      <body class="font-sans antialiased">
          <div class="min-h-screen">

            <main class="grid min-h-full place-items-center bg-white px-6 py-24 sm:py-32 lg:px-8">
                <div class="text-center">
                    <p class="text-base font-semibold text-green-600">Success!</p>
                    <h1 class="mt-4 text-balance text-5xl font-semibold tracking-tight text-gray-900 sm:text-7xl">Your Feedback is Submitted</h1>
                    <p class="mt-6 text-pretty text-lg font-medium text-gray-500 sm:text-xl/8">Thank you for your valuable feedback. We appreciate your input.</p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <a href="https://dentalcarecorp.com/" class="rounded-md bg-green-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Go Back Home</a>
                    </div>
                </div>
            </main>

          </div>
      </body>
  </html>
