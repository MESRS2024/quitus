<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class progresServices
{
    private $authUrl = 'https://progres.mesrs.dz/api/authentication/v1/';
    private $rolesUrl = "https://progres.mesrs.dz/api/infos/affectations/"; //{IdIndividu}

    public function getAuth(array $data)
    {
        try {
            $result = Http::acceptJson()->post($this->authUrl, $data);
            return $result;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function getRoles($id, $token)
    {
        try {
            $result = Http::withHeaders(['Authorization'=>$token])->get($this->rolesUrl.$id);
            return $result;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function getStrecture($id, $role, $token)
    {
        try {
            $result = Http::withHeaders(['Authorization'=>$token])->get($this->rolesUrl.$id.'/'.$role);

            return  [
                        'structure_id'=>$result?->json()[0]['idStructure'],
                        'group_id'=>$result?->json()[0]['structureIdRefEtablissement']
                    ];
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


}
