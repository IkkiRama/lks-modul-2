<?php

use App\Models\User;
use App\Models\Attendance;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('attdetails', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Attendance::class);
            $table->foreignIdFor(User::class);
            $table->string("attstatus", 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attdetails');
    }
}
