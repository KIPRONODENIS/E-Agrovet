<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Rinvex\Subscriptions\Models\PlanFeature;
class CreatePlanSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(config('rinvex.subscriptions.tables.plan_subscriptions'), function (Blueprint $table) {
            $table->increments('id');
            $table->morphs('user');
            $table->integer('plan_id')->unsigned();
            $table->string('slug');
            $table->{$this->jsonable()}('name');
            $table->{$this->jsonable()}('description')->nullable();
            $table->dateTime('trial_ends_at')->nullable();
            $table->dateTime('starts_at')->nullable();
            $table->dateTime('ends_at')->nullable();
            $table->dateTime('cancels_at')->nullable();
            $table->dateTime('canceled_at')->nullable();
            $table->string('timezone')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // Indexes
            $table->unique('slug');
            $table->foreign('plan_id')->references('id')->on(config('rinvex.subscriptions.tables.plans'))
                  ->onDelete('cascade')->onUpdate('cascade');
        });

$plan = app('rinvex.subscriptions.plan')->create([                              'name' => 'Pro',                                                                'description' => 'Pro plan',                                                    'price' => 300.00,                                                              'signup_fee' => 0.00,                                                           'invoice_period' => 1,                                                          'invoice_interval' => 'month',                                                  'trial_period' => 0,                                                            'trial_interval' => 'day',                                                      'sort_order' => 1,                                                              'currency' => 'KSH',                                                        ]);


// Create multiple plan features at once
$plan->features()->saveMany([

    new PlanFeature(['name' => 'Orders', 'value' => 5, 'sort_order' => 5]),
    new PlanFeature(['name' => 'listing_duration_days', 'value' => 30, 'sort_order' => 10, 'resettable_period' => 1, 'resettable_interval' => 'month']),
    new PlanFeature(['name' => 'listing_title_bold', 'value' => 'Y', 'sort_order' => 15])
]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(config('rinvex.subscriptions.tables.plan_subscriptions'));
    }

    /**
     * Get jsonable column data type.
     *
     * @return string
     */
    protected function jsonable(): string
    {
        $driverName = DB::connection()->getPdo()->getAttribute(PDO::ATTR_DRIVER_NAME);
        $dbVersion = DB::connection()->getPdo()->getAttribute(PDO::ATTR_SERVER_VERSION);
        $isOldVersion = version_compare($dbVersion, '5.7.8', 'lt');

        return $driverName === 'mysql' && $isOldVersion ? 'text' : 'json';
    }
}
