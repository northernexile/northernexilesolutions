<?php

namespace App\Services\Tooling\Export;

use App\Services\Tooling\Interfaces\UsesTableInterface;
use App\Services\Tooling\Traits\UsesTableTrait;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class JsonTableExporter implements UsesTableInterface
{
    use UsesTableTrait;

    const STORAGE = 'exports';

    const NULL_TABLE = 'Set table first';

    /**
     * @var int
     */
    private int $recordsExported = 0;

    /** @var string|null  */
    private ?string $fileName;

    protected function ensureCheckStorageDirectoryExists() :void
    {
        if(!Storage::exists(self::STORAGE)){
            Storage::makeDirectory(self::STORAGE);
        }
    }

    private function makeFileName() :void
    {
        $time = Carbon::now()->format('YmdHis');
        $this->fileName = $this->tableName.'-'.$time.'.json';
    }

    /**
     * @return false
     * @throws Exception
     */
    public function create() :bool
    {
        if(is_null($this->tableName)){
            throw new \Exception(self::NULL_TABLE);
        }

        $records = DB::table($this->tableName)->get(['*']);
        $this->recordsExported = collect($records)->count();
        $encoded = json_encode($records);
        $this->ensureCheckStorageDirectoryExists();
        $this->makeFileName();

        return Storage::put(self::STORAGE.'/'.$this->fileName,$encoded);
    }

    /**
     * @return string
     */
    public function getFileName() :string
    {
        return $this->fileName;
    }

    /**
     * @return int
     */
    public function getRecordsExported() :int
    {
        return $this->recordsExported;
    }
}
