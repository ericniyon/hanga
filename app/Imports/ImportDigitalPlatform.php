<?php

namespace App\Imports;

use App\FileManager;
use App\Models\ApplicationSolution;
use App\Models\BusinessSector;
use App\Models\PlatformType;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportDigitalPlatform implements ToCollection,WithHeadingRow,WithChunkReading,ShouldQueue
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $i => $platform){
            $solution = ApplicationSolution::updateOrCreate(
                [
                    "name" => $platform['solution_name'],
                    "dsp_name" => $platform['owner_names']
                ],
                [
                      "name" => $platform['solution_name'],
                      "dsp_name" => $platform['owner_names'],
                      "phone" => $platform['telephone'],
                      "email" => $platform['email'],
                      "website" => $platform['website'],
                      "description" => $platform['description'],
                ]
            );
            if ($platform['android_link']){
                $solution->solutionPlatforms()->updateOrCreate(
                    ['platform_type_id' => 1],
                    [
                    'link' => $platform['android_link'],
                    'platform_type_id' => 1
                ]);
            }
            if ($platform['desktop_link']){
                $solution->solutionPlatforms()->updateOrCreate(
                    ['platform_type_id' => 4],
                    [
                    'link' => $platform['desktop_link'],
                    'platform_type_id' => 4
                ]);
            }
            if ($platform['web_application_link']){
                $solution->solutionPlatforms()->updateOrCreate(
                    ['platform_type_id' => 1],
                    [
                    'link' => $platform['web_application_link'],
                    'platform_type_id' => 1
                ]);
            }
            if ($platform['ios_link']){
                $solution->solutionPlatforms()->updateOrCreate(
                    ['platform_type_id' => 3],
                    [
                    'link' =>$platform['ios_link'],
                    'platform_type_id' => 3
                ]);
            }

            $bizSectors = explode(',',strtolower($platform['specialitiesbusiness_sectorcomma_separated']));
            $bizSectors = $this->createBusinessSector($bizSectors);
            $solution->businessSectors()->sync($bizSectors);
        }

    }
    public function createBusinessSector($sectors): array
    {
        foreach ($sectors as $sector)
        {
            BusinessSector::updateOrCreate(
                ['name'=>$sector],
                [
                    'name'=>$sector
                ]);
        }
        return BusinessSector::whereIn('name', $sectors)->get()->pluck('id')->toArray();
    }

    public function chunkSize(): int
    {
        return 50;
    }
}
