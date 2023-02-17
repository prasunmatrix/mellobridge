<?php

namespace App\Imports;

use App\Models\MasterCountry;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CountryDataImport implements ToCollection {

    public $data;

    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection) {
        $row_count = 0;
        $data = [];
//        $data['errors'] = [];
//        $data['success'] = [];
        $format_ok = false;
        $header_arr = [
            'Sl no',
            'Country',
        ];

            $format_ok = true;
        
        if ($format_ok) {
            foreach ($collection as $key => $row) {
                if ($key > 0 && $row[1] != '') {
                        $is_ok = true;
                        $validate = true;
                        $validate_msg = '';
                       
                        if ($validate) {
                            \DB::beginTransaction();
                            try {
                                $insert_country = new MasterCountry;
                               
                                $insert_country->country_name = $row[1];
                                $insert_country->save();
                                $data['success'][$key] = 'Row no ' . ($key + 1) . " inserted succesfully.";
                            } catch (\Exception $e) {
                                $data['type'] = 'error';
                                $data['errors'][$key] = $e->getMessage();
                                $is_ok = false;
                            }
                            if ($is_ok) {
                                \DB::commit();
                                $data['type'] = 'success';
                                $data['msg'] = 'ok';
                            } else {
                                \DB::rollback();
                            }
                        } else {
                            $data['errors'][$key] = 'Row no ' . ($key + 1) . $validate_msg;
                        }
                    
                } else {
                    if ($key > 0) {
                        $data['errors'][$key] = 'Row no ' . ($key + 1) . " not inserted (valid email and company name must be required).";
                    }
                }
            }
            $data['type'] = 'success';
            $data['msg'] = 'ok';
        } else {
            $data['type'] = 'error';
            $data['msg'] = 'Invalid csv formatt.';
        }
        $this->data = $data;
    }



   
    

}
