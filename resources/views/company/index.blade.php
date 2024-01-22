<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="">
                    @if (session('success') === 'company-deleted-successfully')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 2000)"
                            class="text-sm text-red-600 mb-4"
                        >{{ __('Company deleted successfully') }}</p>
                    @endif
                    <section>
                        <div class="relative h-full w-full rounded-xl bg-white mb-3 shadow-[0px_0px_0px_1px_rgba(9,9,11,0.07),0px_2px_2px_0px_rgba(9,9,11,0.05)] dark:bg-zinc-900 dark:shadow-[0px_0px_0px_1px_rgba(255,255,255,0.1)] dark:before:pointer-events-none dark:before:absolute dark:before:-inset-px dark:before:rounded-xl dark:before:shadow-[0px_2px_8px_0px_rgba(0,_0,_0,_0.20),_0px_1px_0px_0px_rgba(255,_255,_255,_0.06)_inset] forced-colors:outline">
                            <div class="grid h-full w-full overflow-hidden place-items-start justify-items-center p-6 py-8 sm:p-8 lg:p-12">
                                <div class="w-full min-w-0">
                                    <div class="flow-root">
                                        <div class="[--gutter:theme(spacing.6)] sm:[--gutter:theme(spacing.8)] lg:[--gutter:theme(spacing.12)] -mx-[--gutter] overflow-x-auto whitespace-nowrap">
                                            <div class="inline-block min-w-full align-middle sm:px-[--gutter]">
                                                <table class="min-w-full text-left text-sm/6">
                                                    <thead class="text-zinc-500 dark:text-zinc-400">
                                                    <tr class="">
                                                        <th class="border-b border-b-zinc-950/10 px-4 py-2 font-medium first:pl-[var(--gutter,theme(spacing.2))] last:pr-[var(--gutter,theme(spacing.2))] dark:border-b-white/10 sm:first:pl-2 sm:last:pr-2">
                                                            №
                                                        </th>
                                                        <th class="border-b border-b-zinc-950/10 px-4 py-2 font-medium first:pl-[var(--gutter,theme(spacing.2))] last:pr-[var(--gutter,theme(spacing.2))] dark:border-b-white/10 sm:first:pl-2 sm:last:pr-2">
                                                            Name
                                                        </th>
                                                        <th class="border-b border-b-zinc-950/10 px-4 py-2 font-medium first:pl-[var(--gutter,theme(spacing.2))] last:pr-[var(--gutter,theme(spacing.2))] dark:border-b-white/10 sm:first:pl-2 sm:last:pr-2">
                                                            Email
                                                        </th>
                                                        <th class="border-b border-b-zinc-950/10 px-4 py-2 font-medium first:pl-[var(--gutter,theme(spacing.2))] last:pr-[var(--gutter,theme(spacing.2))] dark:border-b-white/10 sm:first:pl-2 sm:last:pr-2">
                                                            Website
                                                        </th>
                                                        <th class="border-b border-b-zinc-950/10 px-4 py-2 font-medium first:pl-[var(--gutter,theme(spacing.2))] last:pr-[var(--gutter,theme(spacing.2))] dark:border-b-white/10 sm:first:pl-2 sm:last:pr-2">
                                                            Actions
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @forelse($companies as $company)
                                                        <tr>
                                                            <td class="text-zinc-500 dark:text-zinc-400 relative px-4 first:pl-[var(--gutter,theme(spacing.2))] last:pr-[var(--gutter,theme(spacing.2))] border-b border-zinc-950/5 dark:border-white/5 py-4 sm:first:pl-2 sm:last:pr-2">
                                                                {{ $company->id }}
                                                            </td>
                                                            <td class="relative px-4 first:pl-[var(--gutter,theme(spacing.2))] last:pr-[var(--gutter,theme(spacing.2))] border-b border-zinc-950/5 dark:border-white/5 py-4 sm:first:pl-2 sm:last:pr-2">
                                                                <div class="flex items-center gap-2">
                                                                    <span
                                                                        data-slot="avatar"
                                                                        class="relative size-5 inline-grid align-middle *:col-start-1 *:row-start-1 rounded-full *:rounded-full"><img
                                                                            src="{{ env('APP_URL' ) . '/logos/' . $company->logo }}"
                                                                            alt=""><span
                                                                            class="ring-1 ring-inset ring-black/5 dark:ring-white/5 forced-colors:outline"
                                                                            aria-hidden="true"></span></span><span
                                                                        class="font-medium">{{ $company->name }}</span></div>
                                                            </td>
                                                            <td class="relative px-4 first:pl-[var(--gutter,theme(spacing.2))] last:pr-[var(--gutter,theme(spacing.2))] border-b border-zinc-950/5 dark:border-white/5 py-4 sm:first:pl-2 sm:last:pr-2">
                                                                <div class="flex items-center gap-2">
                                                                    {{ $company->email }}
                                                                </div>
                                                            </td>
                                                            <td class="relative px-4 first:pl-[var(--gutter,theme(spacing.2))] last:pr-[var(--gutter,theme(spacing.2))] border-b border-zinc-950/5 dark:border-white/5 py-4 sm:first:pl-2 sm:last:pr-2">
                                                                <div class="flex items-center gap-2">
                                                                    {{ explode('/', explode('//', $company->website)[1])[0] }}
                                                                </div>
                                                            </td>
                                                            <td class="text-zinc-500 relative px-4 first:pl-[var(--gutter,theme(spacing.2))] last:pr-[var(--gutter,theme(spacing.2))] border-b border-zinc-950/5 dark:border-white/5 py-4 sm:first:pl-2 sm:last:pr-2">
                                                                <x-modal name="confirm-company-deletion">
                                                                    <form method="post" action="{{ route('companies.destroy', $company) }}" class="p-6">
                                                                        @csrf
                                                                        @method('delete')

                                                                        <h2 class="text-lg font-medium text-gray-900">
                                                                            {{ __('Are you sure you want to delete company?') }}
                                                                        </h2>

                                                                        <p class="mt-1 text-sm text-gray-600">
                                                                            {{ __('Once company is deleted, all of its resources and employees will be permanently deleted. Please confirm you would like to permanently delete company.') }}
                                                                        </p>

                                                                        <div class="mt-6">
                                                                            <x-input-error :messages="$errors->get('company')" class="mt-2" />
                                                                        </div>

                                                                        <div class="mt-6 flex justify-end">
                                                                            <x-secondary-button x-on:click="$dispatch('close')">
                                                                                {{ __('Cancel') }}
                                                                            </x-secondary-button>

                                                                            <x-danger-button class="ms-3">
                                                                                {{ __('Delete Company') }}
                                                                            </x-danger-button>
                                                                        </div>
                                                                    </form>
                                                                </x-modal>
                                                                <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')

                                                                    <a class="btn btn-info" href="{{ route('companies.show', $company->id) }}">
                                                                    <span class="-my-0.5 inline-flex items-center gap-x-1.5 rounded-md px-1.5 py-0.5 text-sm/5 font-medium sm:text-xs/5 forced-colors:outline bg-lime-400/20 text-lime-700 group-data-[hover]:bg-lime-400/30 dark:bg-lime-400/10 dark:text-lime-300 dark:group-data-[hover]:bg-lime-400/15">
                                                                        Show
                                                                    </span>
                                                                    </a>

                                                                    <a class="btn btn-primary" href="{{ route('companies.edit', $company->id) }}">
                                                                    <span class="-my-0.5 inline-flex items-center gap-x-1.5 rounded-md px-1.5 py-0.5 text-sm/5 font-medium sm:text-xs/5 forced-colors:outline bg-yellow-400/20 text-lime-700 group-data-[hover]:bg-lime-400/30 dark:bg-lime-400/10 dark:text-lime-300 dark:group-data-[hover]:bg-lime-400/15">
                                                                        Edit
                                                                    </span>
                                                                    </a>

                                                                    <button type="submit" class="btn btn-danger">
{{--                                                                            x-data=""--}}
{{--                                                                            x-on:click.prevent="$dispatch('open-modal', 'confirm-company-deletion')">--}}
                                                                        <span class="-my-0.5 inline-flex items-center gap-x-1.5 rounded-md px-1.5 py-0.5 text-sm/5 font-medium sm:text-xs/5 forced-colors:outline bg-red-400/20 text-lime-700 group-data-[hover]:bg-lime-400/30 dark:bg-lime-400/10 dark:text-lime-300 dark:group-data-[hover]:bg-lime-400/15">
                                                                            Delete
                                                                        </span>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <p>There are no companies.</p>
                                                    @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {!! $companies->links() !!}
                    </section>

                    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                        <form method="post" action="{{ route('companies.destroy', $company) }}" class="p-6">
                            @csrf
                            @method('delete')

                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Are you sure you want to delete company?') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                {{ __('Once company is deleted, all of its resources and employees will be permanently deleted. Please confirm you would like to permanently delete company.') }}
                            </p>

                            <div class="mt-6">
                                <x-input-error :messages="$errors->get('company')" class="mt-2" />
                            </div>

                            <div class="mt-6 flex justify-end">
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    {{ __('Cancel') }}
                                </x-secondary-button>

                                <x-danger-button class="ms-3">
                                    {{ __('Delete Company') }}
                                </x-danger-button>
                            </div>
                        </form>
                    </x-modal>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
