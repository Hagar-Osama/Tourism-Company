<?php
namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\PartnerInterface;
use App\Http\Traits\PartnersTrait;
use App\Http\Traits\UploaderTrait;
use App\Models\Partner;
use Illuminate\Support\Facades\Session;

class PartnerRepository implements PartnerInterface
{
    use PartnersTrait;
    use UploaderTrait;
    private $partnerModel;

    public function __construct(Partner $partner)
    {
        $this->partnerModel = $partner;

    }

    public function index()
    {
        $partners = $this->showPartnersImages();
        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function upload($request)
    {
        $image = $request->file('image');
        $imageName = $this->uploadFile($image, 'partners');
        $this->partnerModel::create([
            'image' => $imageName
        ]);
        Session::flash('done', 'Images Uploaded successfully');
        return redirect(route('admin.partners.index'));
    }

    public function edit($id)
    {
        $partner = $this->getPartnersImageById($id);
        return view('admin.partners.edit', compact('partner'));
    }

    public function update($request)
    {
        $partner = $this->getPartnersImageById($request->partner_id);
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $this->uploadFile($image, 'partners', $partner->image);
        }
        $partner->update([
            'image' => (isset($imageName)) ? $imageName : $partner->image
        ]);
        Session::flash('done', 'Images Updated successfully');
        return redirect(route('admin.partners.index'));
    }

    public function destroy($request)
    {
        $partner = $this->getPartnersImageById($request->partner_id);
        $partner->delete();
        if($partner->image) {
            $this->deleteFile($partner->image);
        }
        Session::flash('done', 'Images deleted successfully');
        return redirect(route('admin.partners.index'));
    }
}
