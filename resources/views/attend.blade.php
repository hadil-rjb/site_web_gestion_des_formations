<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-md px-12 py-10 bg-white rounded-lg shadow-md">
          <div class="text-center">
            <h2 class="text-2xl font-bold text-gray-700 mb-4">Confirmation de compte en attente</h2>
            <p class="text-gray-600">Votre compte a été créé avec succès. Cependant, nous devons encore confirmer votre compte avant que vous puissiez accéder à notre interface. Veuillez patienter jusqu'à ce que nous vous envoyions une confirmation.</p>
          </div>
          <div class="mt-6">
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="w-full py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Se déconnecter
              </button>
            </form>
          </div>
        </div>
      </div>
</x-guest-layout>
