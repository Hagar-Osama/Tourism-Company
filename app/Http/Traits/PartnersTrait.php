<?php

namespace App\Http\Traits;

trait PartnersTrait {

    private function showPartnersImages()
    {
        return $this->partnerModel::get();
    }

    private function getPartnersImageById($id)
    {
        return $this->partnerModel::find($id);
    }
}
