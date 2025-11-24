<script setup>
import { Head, Link } from '@inertiajs/vue3';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';

defineProps({
    tenantId: String,
    tenantData: Object,
});
</script>

<template>
    <Head title="Tenant Home" />

    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100">
        <div class="relative flex min-h-screen flex-col items-center justify-center selection:bg-indigo-500 selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="py-10">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="text-4xl font-bold text-gray-900">
                                Multi-Tenant Application
                            </h1>
                            <p class="mt-2 text-lg text-gray-600">
                                Powered by Laravel + Vue + Tenancy
                            </p>
                        </div>
                        <nav class="flex items-center gap-4">
                            <template v-if="$page.props.auth?.user">
                                <Link
                                    :href="route('tenant.dashboard')"
                                    class="rounded-md px-4 py-2 text-gray-900 ring-1 ring-gray-300 transition hover:bg-gray-100"
                                >
                                    Dashboard
                                </Link>

                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <button
                                            type="button"
                                            class="inline-flex items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none"
                                        >
                                            {{ $page.props.auth.user.name }}

                                            <svg
                                                class="-me-0.5 ms-2 h-4 w-4"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20"
                                                fill="currentColor"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"
                                                />
                                            </svg>
                                        </button>
                                    </template>

                                    <template #content>
                                        <DropdownLink :href="route('tenant.profile.edit')">
                                            Profile
                                        </DropdownLink>
                                        <DropdownLink
                                            :href="route('logout')"
                                            method="post"
                                            as="button"
                                        >
                                            Log Out
                                        </DropdownLink>
                                    </template>
                                </Dropdown>
                            </template>
                            <template v-else>
                                <Link
                                    :href="route('login')"
                                    class="rounded-md px-4 py-2 text-gray-900 ring-1 ring-gray-300 transition hover:bg-gray-100"
                                >
                                    Log in
                                </Link>
                                <Link
                                    :href="route('register')"
                                    class="rounded-md bg-indigo-600 px-4 py-2 text-white transition hover:bg-indigo-700"
                                >
                                    Register
                                </Link>
                            </template>
                        </nav>
                    </div>
                </header>

                <main class="mt-6">
                    <div class="grid gap-6 lg:grid-cols-2">
                        <div class="overflow-hidden rounded-lg bg-white p-6 shadow-lg ring-1 ring-gray-900/5">
                            <div class="flex items-center gap-4">
                                <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-indigo-500">
                                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-xl font-semibold text-gray-900">
                                        Tenant Information
                                    </h2>
                                    <p class="mt-1 text-sm text-gray-600">
                                        Your current tenant context
                                    </p>
                                </div>
                            </div>
                            <div class="mt-4 space-y-2">
                                <div class="flex justify-between rounded-md bg-gray-50 p-3">
                                    <span class="font-medium text-gray-700">Tenant ID:</span>
                                    <span class="font-mono text-gray-900">{{ tenantId }}</span>
                                </div>
                                <div v-if="tenantData" class="rounded-md bg-gray-50 p-3">
                                    <span class="font-medium text-gray-700">Tenant Data:</span>
                                    <pre class="mt-2 overflow-auto text-xs text-gray-900">{{ JSON.stringify(tenantData, null, 2) }}</pre>
                                </div>
                            </div>
                        </div>

                        <div class="overflow-hidden rounded-lg bg-white p-6 shadow-lg ring-1 ring-gray-900/5">
                            <div class="flex items-center gap-4">
                                <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-green-500">
                                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-xl font-semibold text-gray-900">
                                        Features
                                    </h2>
                                    <p class="mt-1 text-sm text-gray-600">
                                        Multi-tenancy capabilities
                                    </p>
                                </div>
                            </div>
                            <ul class="mt-4 space-y-3">
                                <li class="flex items-center gap-3">
                                    <svg class="h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-gray-700">Isolated tenant databases</span>
                                </li>
                                <li class="flex items-center gap-3">
                                    <svg class="h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-gray-700">Domain-based identification</span>
                                </li>
                                <li class="flex items-center gap-3">
                                    <svg class="h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-gray-700">Automatic tenant switching</span>
                                </li>
                                <li class="flex items-center gap-3">
                                    <svg class="h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-gray-700">Separate file storage per tenant</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="mt-6 overflow-hidden rounded-lg bg-white p-6 shadow-lg ring-1 ring-gray-900/5">
                        <h2 class="text-xl font-semibold text-gray-900">
                            Getting Started
                        </h2>
                        <p class="mt-2 text-gray-600">
                            This is a multi-tenant Laravel application with Vue.js frontend. Each tenant has its own isolated environment.
                        </p>
                        <div class="mt-4 grid gap-4 md:grid-cols-3">
                            <div class="rounded-lg border border-gray-200 p-4">
                                <h3 class="font-semibold text-gray-900">1. Create Tenants</h3>
                                <p class="mt-2 text-sm text-gray-600">
                                    Use Artisan commands to create and manage tenants
                                </p>
                            </div>
                            <div class="rounded-lg border border-gray-200 p-4">
                                <h3 class="font-semibold text-gray-900">2. Configure Domains</h3>
                                <p class="mt-2 text-sm text-gray-600">
                                    Assign domains to tenants for automatic identification
                                </p>
                            </div>
                            <div class="rounded-lg border border-gray-200 p-4">
                                <h3 class="font-semibold text-gray-900">3. Start Building</h3>
                                <p class="mt-2 text-sm text-gray-600">
                                    Build tenant-specific features with full isolation
                                </p>
                            </div>
                        </div>
                    </div>
                </main>

                <footer class="py-8 text-center text-sm text-gray-600">
                    Laravel {{ $page.props.laravelVersion }} + Vue.js + Stancl Tenancy
                </footer>
            </div>
        </div>
    </div>
</template>
