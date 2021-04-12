<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOtpTokenToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('otp_token')->nullable()->after('remember_token');
            $table->enum('token_status', 
                [User::INACTIVED_TOKEN, User::ACTIVED_TOKEN]
            )->default(User::INACTIVED_TOKEN)->after('otp_token');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('otp_token');
            $table->dropColumn('token_status');
        });
    }
}
