<?php
namespace Milestone\SS\Interact;

use Illuminate\Support\Arr;
use Milestone\SS\Model\Functiondetail;
use Milestone\Interact\Table;
use Milestone\SS\Model\Menu;

class functionR implements Table
{
    private $cache = null;

    public function getModel()
    {
        return Functiondetail::class;
    }

    public function getImportAttributes()
    {
        return ['display_name','abr','category','status'];
    }

    public function getImportMappings()
    {
        return [
            'display_name' => 'DISPLAYNAME',
            'abr' => 'ABR',
            'category' => 'CATEGORY',
            'status' => 'STATUS'
        ];
    }

    public function preImport(){
        $this->cache = Functiondetail::pluck('id','code')->toArray();
    }

    public function getPrimaryIdFromImportRecord($data)
    {
        return Arr::get($this->cache,$data['CODE'],null);
    }

    public function recordImported($record,$id){
        ['CODE' => $fncode, 'DISPLAYNAME' => $name, 'STATUS' => $status] = $record;
        $menu = Menu::updateOrCreate(compact('fncode'),compact('name','status'));
        if(!$menu->icon) $menu->icon = Arr::get(Menu::$default_icons,$fncode);
        if(!$menu->home_display) $menu->home_display = $menu->name;
        if(!$menu->drawer_display) $menu->drawer_display = $menu->name;
        $menu->save();
    }

    public function getExportMappings()
    {
        return [];
    }

    public function getExportAttributes()
    {
        return [];
    }

}