<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SettingController extends Controller
{
    protected function cacheReload() {
        Cache::forget('dynamic-data-cache');
        return true;
    }

    protected function setting($key) {
        return dynamicData($key);
    }

    public function sunCityDentalCare() {
        $setting = $this->setting('sunCityDentalCare');
        return view('admin.settings.suncity-dental-care', compact('setting'));
    }

    public function businessInfo()
    {
        $setting = $this->setting('businessInfo');
        return view('admin.settings.business-info', compact('setting'));
    }

    public function healthInsurance()
    {
        $setting = $this->setting('healthInsurance');
        return view('admin.settings.health-insurance', compact('setting'));
    }
    public function consultDoctors()
    {
        $setting = $this->setting('consultDoctors');
        return view('admin.settings.consult-doctors', compact('setting'));
    }

    public function photoGallery()
    {
        $setting = $this->setting('photoGallery');
        return view('admin.settings.photo-gallery', compact('setting'));
    }

    //==========Contact info set==========//
    public function contactInfo() {
        $setting = $this->setting('contactInfo');
        return view('admin.settings.contact-info', compact('setting'));
    }

    //==========Contact info set==========//
    public function logoFavicon() {
        $setting = $this->setting('logoFavicon');
        return view('admin.settings.logo-favicon', compact('setting'));
    }

    public function contactUsPageFooter() {
        $setting = $this->setting('contactUsPageFooter');
        return view('admin.settings.contact-us-page-footer', compact('setting'));
    }

    protected function multipleImageManage($request, $folderPath = 'images-gallery', $attrName = 'gallery_images', $updateKeyName = 'galleryImages') {
        $galleryImages = [];

        if($updateKeyName) {
            $oldImages = $request->$updateKeyName ?: [];

            //=====Start of old images manage====//
            $indexIng = 0;
            foreach ($oldImages as $value) {
                if($value !== null) {
                    $indexIng++;
                    $galleryImages[$indexIng] = $value;
                }
            }
            //=====End of old images manage====//


            //=====Start of new images manage====//
            $indexKey = 1;
            foreach (range(1, $request->$attrName) as $indexNo) {
                $name = $attrName . '_' . $indexKey;
                $newImage = $this->fileUploadHandle($folderPath, $galleryImages[$indexKey] ?? null, $name);
                if($newImage) {
                    $galleryImages[$indexKey] = $newImage;
                    $indexKey++;
                }
            }
            //=====End of new images manage====//

        }else {
            $indexKey = 1;
            $galleryImages = [];
            if ($request->$attrName && $request->hasFile($attrName.'_1')) {
                foreach (range(1, $request->image) as $indexNo) {
                    $image = $this->fileUploadHandle($folderPath, null, $attrName.'_' . $indexKey,);
                    if($image) {
                        $galleryImages[$indexKey] = $image;
                        $indexKey++;
                    }
                }
            }
        }
        // dd([$oldImages, $galleryImages, $request->all()]);
        return $galleryImages;
    }

    public function settingSync(Request $request) {
        $settings = Setting::where('key', $request->key)->first();
        $message = 'Setting updated successfully';
        $inputs = $request->all();
        if(is_array($request->value)) {
            $inputs['value'] = json_encode($request->value);
        }

        if ($request->key == 'sunCityDentalCare') {
            $message = 'Suncity dental care is successfully updated.';
        }

        if ($request->key == 'logoFavicon') {
            $message = 'Company Logo & website favicon is successfully updated.';
            $options['adminLogo'] = $this->fileUploadHandle('logo-favicon', $settings?->getSetting('adminLogo'), 'adminLogo');
            $options['favicon'] = $this->fileUploadHandle('logo-favicon', $settings?->getSetting('favicon'), 'favicon');
            $options['logo'] = $this->fileUploadHandle('logo-favicon', $settings?->getSetting('logo'), 'logo');
            $inputs['options'] = $options;
        }

        if ($request->key == 'healthInsurance') {
            $message = 'Health Insurance is successfully updated.';
            $inputs['options'] = $this->multipleImageManage($request, 'insurances', 'insurances', $settings ? 'oldInsurances': null);
        }

        if ($request->key == 'photoGallery') {
            $message = 'Photo Gallery is successfully updated.';
            $inputs['options'] = $this->multipleImageManage($request, 'photo-gallery', 'gallery', $settings ? 'oldGallery': null);
        }

        $settings ? $settings->update($inputs) : Setting::create(array_merge($inputs, ['created_by' => user()->id]));
        $this->cacheReload();
        return redirect()->back()->withSuccess($message);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        $statuses = ['Inactivated', 'Activated'];
        $setting->status = $setting->status > 0 ? 0 : 1;
        $result = $setting->update();
        $this->cacheReload();
        return $result ? session()->flash('success', "Home Page section one setting is successfully {$statuses[$setting->status]}.") : 0;
    }
}
