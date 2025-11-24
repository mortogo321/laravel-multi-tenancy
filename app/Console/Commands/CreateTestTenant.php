<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Tenant;

class CreateTestTenant extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenant:create-test {name=test} {domain=test.localhost}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a test tenant with a domain';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $domain = $this->argument('domain');

        $this->info("Creating tenant: {$name}");

        $tenant = Tenant::create([
            'id' => $name,
        ]);

        $tenant->domains()->create([
            'domain' => $domain,
        ]);

        $this->info("Tenant created successfully!");
        $this->info("Tenant ID: {$tenant->id}");
        $this->info("Domain: {$domain}");
        $this->newLine();
        $this->info("Don't forget to run: php artisan tenants:migrate");
        $this->info("Access the tenant at: http://{$domain}");

        return Command::SUCCESS;
    }
}
