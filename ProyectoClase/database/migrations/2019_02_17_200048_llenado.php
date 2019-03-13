<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class Llenado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::insert("insert into aeropuerto(nombre,pais,ciudad) values  ('Aeropuerto Internacional La Aurora','Guatemala','Guatemala')");
        DB::insert("insert into aeropuerto(nombre,pais,ciudad) values  ('Aeropuerto Internacional Mundo Maya','Guatemala','Ciudad Santa Elena de la Cruz, Flores Petén')");
        DB::insert("insert into aeropuerto(nombre,pais,ciudad) values  ('Aeropuerto Internacional de El Salvador','La Paz','El Salvador')");
        DB::insert("insert into aeropuerto(nombre,pais,ciudad) values  ('Aeropuerto Internacional Toncontín','Tegucigalpa','Honduras')");
        DB::insert("insert into aeropuerto(nombre,pais,ciudad) values  ('Aeropuerto Internacional Panamá Pacífico','Balboa','Panamá')");
        DB::insert("insert into avion(capacidad,codigo,estado,marca) values  ('416','A7575','1','Avión comercial Boeing 747')");
        DB::insert("insert into avion(capacidad,codigo,estado,marca) values  ('416','A7580','1','Avión comercial Boeing 747')");
        DB::insert("insert into avion(capacidad,codigo,estado,marca) values  ('50','A7585','1','Avión comercial Boeing 747')");
        DB::insert("insert into avion(capacidad,codigo,estado,marca) values  ('220','A7590','0','Avión comercial Airbus A320')");
        DB::insert("insert into avion(capacidad,codigo,estado,marca) values  ('220','A7595','0','Avión comercial Airbus A320')");
        DB::insert("insert into vuelo(aeropuertosalida,aeropuertodestino) values  ('1','2')");
        DB::insert("insert into vuelo(aeropuertosalida,aeropuertodestino) values  ('2','1')");
        DB::insert("insert into vuelo(aeropuertosalida,aeropuertodestino) values  ('1','3')");
        DB::insert("insert into vuelo(aeropuertosalida,aeropuertodestino) values  ('3','1')");
        DB::insert("insert into vuelo(aeropuertosalida,aeropuertodestino) values  ('1','4')");
        DB::insert("insert into vuelo(aeropuertosalida,aeropuertodestino) values  ('4','1')");
        DB::insert("insert into vuelo(aeropuertosalida,aeropuertodestino) values  ('1','5')");
        DB::insert("insert into vuelo(aeropuertosalida,aeropuertodestino) values  ('5','1')");
        DB::insert("INSERT INTO `cliente` (`id`, `nombre`, `apellido`, `dpi`, `created_at`, `updated_at`) VALUES (NULL, 'ayd2', 'grupo4', '12345678', '2019-02-16 00:00:00', '2019-02-16 00:00:00')");
        DB::insert("INSERT INTO `registro_vuelo` (`id`, `fechasalida`, `horasalida`, `fechallegada`, `horallegada`, `vuelo`, `avion`, `created_at`, `updated_at`) VALUES (NULL, '2019-02-16', '08:00:00', '2019-02-16', '13:00:00', '3', '1', '2019-02-16 00:00:00', '2019-02-16 00:00:00')");
        DB::insert("INSERT INTO `registro_vuelo` (`id`, `fechasalida`, `horasalida`, `fechallegada`, `horallegada`, `vuelo`, `avion`, `created_at`, `updated_at`) VALUES (NULL, '2019-02-17', '05:00:00', '2019-02-17', '10:00:00', '1', '2', '2019-02-16 00:00:00', '2019-02-16 00:00:00')");
        DB::insert("INSERT INTO `registro_vuelo` (`id`, `fechasalida`, `horasalida`, `fechallegada`, `horallegada`, `vuelo`, `avion`, `created_at`, `updated_at`) VALUES (NULL, '2019-02-17', '08:00:00', '2019-02-16', '11:00:00', '2', '3', '2019-02-16 00:00:00', '2019-02-16 00:00:00')");
        DB::insert("INSERT INTO `reservacion` (`id`, `fechahora`, `estado`, `cliente_id`, `registrovuelo_id`, `created_at`, `updated_at`) VALUES (NULL, '2019-02-15 00:00:00', '0', '1', '1', '2019-02-15 00:00:00', '2019-02-15 00:00:00')");
        DB::insert("INSERT INTO `reservacion` (`id`, `fechahora`, `estado`, `cliente_id`, `registrovuelo_id`, `created_at`, `updated_at`) VALUES (NULL, '2019-02-15 00:00:00', '0', '1', '2', '2019-02-15 00:00:00', '2019-02-15 00:00:00')");
        DB::insert("INSERT INTO `reservacion` (`id`, `fechahora`, `estado`, `cliente_id`, `registrovuelo_id`, `created_at`, `updated_at`) VALUES (NULL, '2019-02-15 00:00:00', '0', '1', '3', '2019-02-15 00:00:00', '2019-02-15 00:00:00')");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
    }
}
