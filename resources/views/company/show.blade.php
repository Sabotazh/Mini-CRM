<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $company->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 max-w-xl">

                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('companies.index') }}">
                                    <x-primary-button>{{ __('Back') }}</x-primary-button>
                                    @if (session('success') === 'company-updated-successfully')
                                        <p
                                            x-data="{ show: true }"
                                            x-show="show"
                                            x-transition
                                            x-init="setTimeout(() => show = false, 2000)"
                                            class="text-sm text-green-600 mt-2"
                                        >{{ __('Company updated successfully') }}</p>
                                    @endif
                                </a>
                            </div>
                        </div>
                    </div>

                    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')

                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $company->name)" required readonly autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $company->email)" required readonly autocomplete="username" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>

                        <div>
                            <x-input-label for="email" :value="__('Website')" />
                            <x-text-input id="website" name="website" type="text" class="mt-1 block w-full" :value="old('website', explode('/', explode('//', $company->website)[1])[0])" required readonly autocomplete="username" />
                            <x-input-error class="mt-2" :messages="$errors->get('website')" />
                        </div>

                        <div>
                            <img src="{{ env('APP_URL' ) . '/logos/' . $company->logo }}" width="200px" alt="logo">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

