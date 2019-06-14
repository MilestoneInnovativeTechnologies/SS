<?php

    namespace Milestone\SS\Interact;

    use Illuminate\Support\Arr;
    use Milestone\Interact\Table;
    use Milestone\SS\Model\StockTransfer;
    use Milestone\SS\Model\Transaction;

    class stock_transfer implements Table
    {
        public function getModel()
        {
            return StockTransfer::class;
        }

        public function getImportAttributes()
        {
            return ['id','out','in','verified_by','verified_at'];
        }

        public function getImportMappings()
        {
            return [
                'out' => 'getTransactionOutID',
                'in' => 'getTransactionInID'
            ];
        }

        public function getPrimaryIdFromImportRecord($data)
        {
            Arr::get(StockTransfer::where(['out' => $this->getTransactionOutID($data),'in' => $this->getTransactionInID($data)])->first(),'id');
        }

        public function getExportMappings()
        {
            return [
                'out' => 'getTransactionOutReference',
                'in' => 'getTransactionInReference'
            ];
        }

        public function getExportAttributes()
        {
            return ['id','out','in','verified_by','verified_at'];
        }

        public function getTransactionOutReference($record){ return Arr::get(Transaction::find($record['out']),'_ref'); }
        public function getTransactionInReference($record){ return Arr::get(Transaction::find($record['in']),'_ref'); }

        public function getTransactionOutID($record){ return Arr::get(Transaction::where('_ref',$record['out'])->first(),'id'); }
        public function getTransactionInID($record){ return Arr::get(Transaction::where('_ref',$record['in'])->first(),'id'); }

        public function preExportGet($query){
            return $query->whereNull('in');
        }
    }