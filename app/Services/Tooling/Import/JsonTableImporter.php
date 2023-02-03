<?php

namespace App\Services\Tooling\Import;

use App\Services\Tooling\Interfaces\UsesTableInterface;
use App\Services\Tooling\Traits\UsesTableTrait;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use stdClass;

class JsonTableImporter implements UsesTableInterface
{

    use UsesTableTrait;

    protected ?Carbon $importDate;

    private int $imported = 0;

    const IMPORT_DIRECTORY = 'import';

    const EXCEPTION_NO_IMPORTS = 'Import storage is empty.';

    const MAX_PARTS = 2;

    const EXPLODE_ON = '-';

    const NOTHING_TO_IMPORT = 'Nothing to import.';

    const FAILED_INSERT = 'Insert failed';

    private function checkImportDirectoryExists() :void
    {
        $exists = Storage::exists(self::IMPORT_DIRECTORY);

        if(!$exists){
            Storage::makeDirectory(self::IMPORT_DIRECTORY);
        }
    }

    /**
     * @return Collection
     */
    private function getFiles() :Collection
    {
        return collect(Storage::files(JsonTableImporter::IMPORT_DIRECTORY));
    }

    /**
     * @return stdClass
     * @throws Exception
     */
    private function getMostRecentImportFile() :stdClass
    {
        $files = $this->getFiles();

        if($files->isEmpty()){
            throw new Exception(JsonTableImporter::EXCEPTION_NO_IMPORTS);
        }


        $filteredFiles = $files->filter(function ($file){
            return $this->isCandidateFileForImport($file);
        });

        return $this->getMostRecentImportFileObject($filteredFiles);
    }

    private function getMostRecentImportFileObject(Collection $collection) :stdClass
    {
        $datedCollection = collect();

        foreach ($collection as $item){
            $datedObject = new stdClass();
            $datedObject->fileName = $item;
            $datedObject->date = $this->getFileImportDate($item);
            $datedCollection->add($datedObject);
        }

        return $datedCollection->sortByDesc('date')->first();
    }

    /**
     * @param string $filePath
     * @return bool
     * @throws Exception
     */
    private function isCandidateFileForImport(string $filePath) :bool
    {
        return $this->tableName == $this->isolateTableNameFromFilePath($filePath);
    }

    /**
     * @param $filePath
     * @return Carbon
     * @throws Exception
     */
    private function getFileImportDate($filePath) :Carbon
    {
        return Carbon::createFromFormat(
            'YmdHis',
            $this->isolateImportDateFromFilePath($filePath)
        );
    }

    /**
     * @param string $path
     * @return string
     * @throws Exception
     */
    private function isolateImportDateFromFilePath(string $path) :string
    {
        $parts = $this->explodeFileName($path);

        return Str::replace('.json','',$parts[1]);
    }

    /**
     * @param string $path
     * @return array
     * @throws Exception
     */
    private function explodeFileName(string $path) :array
    {
        $parts = explode(JsonTableImporter::EXPLODE_ON,$path);
        if(count($parts) != JsonTableImporter::MAX_PARTS){
            throw new Exception('Invalid import found.');
        }

        return $parts;
    }

    /**
     * @param string $path
     * @return string
     * @throws Exception
     */
    private function isolateTableNameFromFilePath(string $path) :string
    {
        $parts = $this->explodeFileName($path);

        return Str::replace('import/','',$parts[0]);
    }

    /**
     * @return bool
     * @throws Exception
     */
    public function import() :bool
    {
        $imported = false;
        $this->checkImportDirectoryExists();

        $file = $this->getMostRecentImportFile();
        $this->importDate = $file->date;

        return $this->doImport($file->fileName);
    }

    /**
     * @param $filePath
     * @return bool
     * @throws Exception
     */
    private function doImport($filePath) :bool
    {
        $inserted = false;
        $contents = collect(json_decode(Storage::get($filePath)));

        if($contents->isEmpty()){
            throw new \Exception(JsonTableImporter::NOTHING_TO_IMPORT);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table($this->tableName)->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        foreach ($contents as $item){
            $itemArray = get_object_vars($item);
            unset($itemArray['id']);

            $inserted = DB::table($this->tableName)->insert($itemArray);

            if(!$inserted){
                throw new \Exception(JsonTableImporter::FAILED_INSERT);
            }

            $this->imported++;
        }

        return $inserted;
    }

    /**
     * @return Carbon
     */
    public function getImportDate() :Carbon
    {
        return $this->importDate;
    }

    /**
     * @return int
     */
    public function getImported() :int
    {
        return $this->imported;
    }
}
