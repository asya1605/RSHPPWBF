<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SoftDeleteHelper
{
    /**
     * ### Melakukan soft delete pada satu record
     * @param string $table Nama tabel
     * @param string $pk Nama primary key
     * @param int|string $id Nilai primary key
     */
    public static function delete($table, $pk, $id)
    {
        try {
            DB::table($table)
                ->where($pk, $id)
                ->update([
                    'deleted_at' => now(),
                    'deleted_by' => Auth::id(),
                ]);
        } catch (\Throwable $e) {
            Log::error("SoftDeleteHelper Error [delete] on table {$table}: " . $e->getMessage());
            throw $e;
        }
    }


     ### Filter hanya data yang belum dihapus

    public static function active($query)
    {
        return $query->whereNull('deleted_at');
    }

    
    ### Mengembalikan data yang sudah dihapus 

    public static function trashed($query)
    {
        return $query->whereNotNull('deleted_at');
    }

    /**
     *  Restore data yang sudah dihapus
     * 
     * @param string $table Nama tabel
     * @param string $pk Nama primary key
     * @param int|string $id Nilai primary key
     */
    public static function restore($table, $pk, $id)
    {
        try {
            DB::table($table)
                ->where($pk, $id)
                ->update([
                    'deleted_at' => null,
                    'deleted_by' => null,
                ]);
        } catch (\Throwable $e) {
            Log::error("SoftDeleteHelper Error [restore] on table {$table}: " . $e->getMessage());
            throw $e;
        }
    }
}
