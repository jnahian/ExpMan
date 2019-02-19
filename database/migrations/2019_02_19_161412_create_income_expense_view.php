<?php

use Illuminate\Database\Migrations\Migration;

class CreateIncomeExpenseView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::statement( $this->dropView() );

        \Illuminate\Support\Facades\DB::statement( $this->createView() );
    }

    private function dropView(): string
    {
        return <<<SQL
DROP VIEW IF EXISTS `jnn_incomes_expenses`;
SQL;
    }

    private function createView(): string
    {
        return <<<SQL
CREATE VIEW `jnn_incomes_expenses` AS

(SELECT I.date as date, year(I.date) year, month(I.date) month, I.source source, "I" type, I.amount income, null expense, I.updated_at, I.user_id
FROM jnn_incomes I
WHERE I.status = 1 and I.deleted_at is null )

UNION 

(SELECT E.date as date, year(E.date) year, month(E.date) month, E.purpose source, "E" type, null income, E.amount expense, E.updated_at, E.user_id
FROM jnn_expenses E
WHERE E.status = 1 and E.deleted_at is null )

ORDER BY date
SQL;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Illuminate\Support\Facades\DB::statement( $this->dropView() );
    }
}
