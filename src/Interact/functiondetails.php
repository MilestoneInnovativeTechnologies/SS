<?php
namespace Milestone\SS\Interact;

use Illuminate\Support\Arr;
use Milestone\SS\Model\Functiondetail;
use Milestone\Interact\Table;

class functiondetails implements Table
{
    public $mode = null;
    private $functions_cache = null;
    public $update_cache = [];

    public function getModel()
    {
        return Functiondetail::class;
    }

    public function getImportAttributes()
    {
        return ['code','format','digit_length','direction','default_account'];
    }

    public function getImportMappings()
    {
        return [
            'code' => 'CODE',
            'format' => 'NUMBERING_FORMAT',
            'digit_length' => 'DIGIT_LENGTH',
            'default_account' => 'DEFAULTHCODE',
            'direction' => 'getDirectionFromDataRow'
        ];
    }

    public function getDirectionFromDataRow($row){
        return ($row['SIGN'] == '1') ? 'Out' : 'In';
    }

    public function getPrimaryIdFromImportRecord($data)
    {
        return Arr::get($this->functions_cache,$data['CODE']);
    }

    public function preImport(){
        $this->functions_cache = Functiondetail::pluck('id','code')->toArray();
    }

    public function isValidImportRecord($record){
        if(in_array($this->mode,['create','insert'])){
            if(array_key_exists($record['CODE'],$this->functions_cache)){
                $this->update_cache[$this->functions_cache[$record['CODE']]] = array_map(function($key)use($record){ return $record[$key]; },$this->getImportMappings());
                foreach ($this->attributeToColumnMethodMapArray() as $key => $function)
                    $this->update_cache[$this->functions_cache[$record['CODE']]][$key] = call_user_func([$this,$function],$record);
                return false;
            }
        } return true;
    }

    public function postImport(){
        if(is_array($this->update_cache) && !empty($this->update_cache))
            foreach($this->update_cache as $id => $update_array)
                Functiondetail::find($id)->update($update_array);
    }

    public function getExportMappings()
    {
        // TODO: Implement getExportMappings() method.
    }

    public function getExportAttributes()
    {
        // TODO: Implement getExportAttributes() method.
    }

}