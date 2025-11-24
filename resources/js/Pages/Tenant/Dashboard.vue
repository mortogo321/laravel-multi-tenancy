<script setup>
import TenantAuthenticatedLayout from '@/Layouts/TenantAuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    tenantId: String,
});
</script>

<template>
    <Head title="Tenant Dashboard" />

    <TenantAuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Tenant Dashboard
                </h2>
                <span class="rounded-md bg-indigo-100 px-3 py-1 text-sm font-medium text-indigo-800">
                    Tenant: {{ tenantId }}
                </span>
            </div>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="mb-6 grid gap-6 md:grid-cols-3">
                    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-blue-500">
                                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-600">Total Users</p>
                                    <p class="text-2xl font-semibold text-gray-900">0</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-green-500">
                                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-600">Active Status</p>
                                    <p class="text-2xl font-semibold text-gray-900">Live</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-purple-500">
                                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-600">Tenant ID</p>
                                    <p class="truncate text-sm font-mono font-semibold text-gray-900">
                                        {{ tenantId }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="mb-4 text-lg font-semibold">Welcome to Your Tenant Dashboard!</h3>
                        <p class="mb-4 text-gray-600">
                            You're logged in to a multi-tenant application. This dashboard is isolated to your tenant context.
                        </p>

                        <div class="rounded-lg bg-blue-50 p-4">
                            <h4 class="mb-2 font-semibold text-blue-900">Tenant Isolation Features:</h4>
                            <ul class="space-y-2 text-sm text-blue-800">
                                <li class="flex items-start gap-2">
                                    <svg class="mt-0.5 h-5 w-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    <span>Your data is completely isolated from other tenants</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <svg class="mt-0.5 h-5 w-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    <span>Each tenant has its own database and file storage</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <svg class="mt-0.5 h-5 w-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    <span>Cache and sessions are scoped to your tenant</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <svg class="mt-0.5 h-5 w-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    <span>Domain-based automatic tenant identification</span>
                                </li>
                            </ul>
                        </div>

                        <div class="mt-6 rounded-lg bg-gray-50 p-4">
                            <h4 class="mb-2 font-semibold text-gray-900">Next Steps:</h4>
                            <ol class="list-decimal space-y-2 pl-5 text-sm text-gray-700">
                                <li>Customize this dashboard with tenant-specific data</li>
                                <li>Add more features and functionality for your tenants</li>
                                <li>Configure additional tenant settings as needed</li>
                                <li>Set up tenant-specific branding and customization</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </TenantAuthenticatedLayout>
</template>
