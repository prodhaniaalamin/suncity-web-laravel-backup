<?php

use App\Models\AboutPageTab;
use App\Models\Age;
use App\Models\OurHistory;
use App\Models\OurTeamMember;
use App\Models\Setting;
use App\Models\User;
use App\Models\Role;
use App\Models\WeekDay;
use App\Models\AppLink;
use App\Models\Category;
use App\Models\Color;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Gender;
use App\Models\HealthPackage;
use App\Models\HomeHeaderSlider;
use App\Models\Keyword;
use App\Models\ProductType;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\VideoGallery;
use App\Services\Helpers;
use App\Services\DynamicRole;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Fluent;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Support\Facades\App;

if (!function_exists('translate')) {

    function translate($word, $lang = null)
    {
        return $word;
        if(!$word) return $word;

        $currentLang = $lang ?? App::getLocale();
        return GoogleTranslate::trans($word, $currentLang);
    }
}


if (!function_exists('isLocal')) {
    function isLocal(): bool
    {
        return config('app.env') === 'local';
    }
}
if (!function_exists('assets')) {
    function assets($filePath = ''): string
    {
        $filePath = str_replace(['//', '///'], '/', $filePath);
        $filePath = config('app.env') === 'local' ? $filePath : "public/{$filePath}";
        return asset($filePath);
    }
}

if (!function_exists('image')) {
    function image($filePath = false, $default = false, $onlyPath = false, $needTrueFalse = false)
    {
        $is_tf = !$filePath || strlen($filePath) < 10 || !file_exists(public_path($filePath));

        //======Only check image file is exists======//
        if ($needTrueFalse) return !$is_tf;

        //======if not exist image file then support image service======//
        $is_tf && $filePath = $default === 'user' ? 'assets/backend/img/default-user.png' : ($default ?: 'assets/backend/img/blank-image.svg');

        return $onlyPath ? $filePath : assets($filePath);
    }
}

if (!function_exists('fileIsExists')) {
    function fileIsExists($filePath)
    {
        $is_tf = !$filePath || strlen($filePath) < 10 || !file_exists(public_path($filePath));
        return !$is_tf;
    }
}

if (!function_exists('is_json')) {
    function is_json($string = '')
    {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }
}

if (!function_exists('getStatus')) {
    function getStatus(int $status = 0, $switchRoute = '', $statusData = ['Inactive', 'Active'], $auth = true, $unsuccess = 'danger'): string
    {
        $statusClass = [$unsuccess, 'success'];
        $statusString = $statusData[$status];
        $statusReversText = $statusData[$status > 0 ? 0 : 1];
        return $auth ? "<span data-status-text=\"{$statusReversText}\" data-switch-ai=\"{$switchRoute}\" class=\"switch-button badge badge-light-{$statusClass[$status]}\">{$statusString}</span>" : "<span data-status-text=\"{$statusReversText}\" class=\"badge badge-light-{$statusClass[$status]}\">{$statusString}</span>";
    }
}
if (!function_exists('fluent')) {
    function fluent($data)
    {
        return new Fluent($data);
    }
}

if (!function_exists('usernameGenerate')) {
    function usernameGenerate($schoolId, $userRoleId, $tablePrimaryId)
    {
        //year+role_id+tablePrimaryId
        $currentYear = date('y');
        $common = "{$currentYear}{$userRoleId}";
        $commonLength = strlen("{$common}{$tablePrimaryId}");

        foreach ($commonLength > 7 ? [] : range($commonLength, 7) as $i) {
            $common .= '0';
        }
        return $common .= $tablePrimaryId;
        return [$commonLength, strlen($common), $common];
    }
}

if (!function_exists('roles')) {
    function roles()
    {
        return Cache::remember('roles', 60 * 60 * 24, function () {
            return Role::where('status', 1)->get();
        });
    }
}

if (!function_exists('role')) {
    function role($onlyRoleId = false)
    {
        $user = user();
        if (!$user) return null;
        return $onlyRoleId ? $user->role_id : $user->role;
    }
}

if (!function_exists('user')) {
    function user()
    {
        return auth()->user();
    }
}

if (!function_exists('prefixes')) {
    function prefixes()
    {
        return DynamicRole::$prefixes;
    }
}

if (!function_exists('weekDays')) {
    function weekDays()
    {
        return Cache::remember('week_days' . user()->school_id, 60 * 60 * 24, function () {
            return WeekDay::where(['is_on' => 1, 'school_id' => user()->school_id])->get()->makeHidden(['created_at', 'updated_at']);
        });
    }
}


if (!function_exists('fileDelete')) {
    function fileDelete($path)
    {
        $file = $path ? public_path(str_replace('public/', '', $path)) : false;
        if ($file && file_exists($file)) {
            File::delete($file);
        }
    }
}

if (!function_exists('yearOptions')) {
    function yearOptions($selected = false, $endCurrentPlus = 0, $startCurrentMinus = 1)
    {
        $year = intval(date('Y'));
        $selected = $selected ?: $year;
        return optionHandler(range($year - $startCurrentMinus, $year + $endCurrentPlus), $selected);
    }
}

if (!function_exists('months')) {
    function months($getMonth = false, $onlyMonths = false, $monthNameKey = false)
    {

        $months = array('1' => 'January', '2' => 'February', '3' => 'March', '4' => 'April', '5' => 'May', '6' => 'June', '7' => 'July', '8' => 'August', '9' => 'September', '10' => 'October', '11' => 'November', '12' => 'December');
        $nameByMonth = array('January' => 1, 'February' => 2, 'March' => 3, 'April' => 4, 'May' => 5, 'June' => 6, 'July' => 7, 'August' => 8, 'September' => 9, 'October' => 10, 'November' => 11, 'December' => 12);

        if ($getMonth) {
            $getMonth = strval($getMonth);
            return is_numeric($getMonth) ? ($months[intval($getMonth < 10 && strpos('0', $getMonth) ? str_replace('0', '', $getMonth) : $getMonth)] ?? false) :
                $nameByMonth[$getMonth] ?? false;
        } elseif ($onlyMonths) {
            return $monthNameKey ? $nameByMonth : $months;
        }
        return $months;
    }
}

if (!function_exists('shortMonths')) {
    function shortMonths($getMonth = false, $onlyMonths = false)
    {
        $months = array('1' => 'Jan', '2' => 'Feb', '3' => 'Mar', '4' => 'Apr', '5' => 'May', '6' => 'Jun', '7' => 'Jul', '8' => 'Aug', '9' => 'Sep', '10' => 'Oct', '11' => 'Nov', '12' => 'Dec');

        if ($getMonth) {
            $getMonth = strval($getMonth);
            return is_numeric($getMonth) ? $months[intval($getMonth < 10 && strpos('0', $getMonth) ? str_replace('0', '', $getMonth) : $getMonth)] : array_search($getMonth, $months);
        } elseif ($onlyMonths) {
            return $months;
        }
        return $months;
    }
}

if (!function_exists('getPermissions')) {
    function getPermissions()
    {
        return Helpers::$permissions;
    }
}

if (!function_exists('optionHandler')) {
    function optionHandler($data, $selected = '', $useKey = false)
    {
        $output = '';
        foreach ($data as $key => $value) {
            $key = $useKey ? $key : $value;
            $select = $key === $selected ? ' selected' : '';
            $output .= "<option{$select} value=\"{$key}\">{$value}</option>";
        }
        return $output;
    }
}

if (!function_exists('monthOptions')) {
    function monthOptions($selected = false)
    {
        return optionHandler(months(), $selected, true);
    }
}

if (!function_exists('bloodGroupOptionHandler')) {
    function bloodGroupOptionHandler($selected = false)
    {
        $bloodGroups = ['None', 'A+', 'O+', 'B+', 'AB+', 'A-', 'O-', 'B-', 'AB-'];
        return optionHandler($bloodGroups, $selected);
    }
}

if (!function_exists('genderHandler')) {
    function genderHandler($selected = false)
    {
        return optionHandler(['Male', 'Female', 'Third Gender'], $selected);
    }
}

if (!function_exists('optionsProcess')) {
    function optionsProcess($data, $selected = false, $key = 'name')
    {
        $output = '';
        $selected = !$selected ?: intval($selected);
        foreach ($data as $row) {
            $value = $row->{$key};
            $select = $row->id === $selected ? ' selected' : '';
            $output .= "<option{$select} value=\"{$row->id}\">{$value}</option>";
        }
        return $output;
    }
}

if (!function_exists('toIntval')) {
    function toIntval($data)
    {
        if (!$data) return $data;
        return is_array($data) ?
            array_map(fn ($value) => is_numeric($value) ? intOrFloat($value) : (is_array($value) ? toIntval($value) : $value), $data) : (intOrFloat(is_numeric($data) ? intOrFloat($data) : $data));
    }
}

if (!function_exists('intOrFloat')) {
    function intOrFloat($val)
    {
        return strpos($val, '.') ? floatval($val) : intval($val);
    }
}

if (!function_exists('toObject')) {
    function toObject(array $array)
    {
        return json_decode(is_string($array) ? $array : json_encode($array, FALSE));
    }
}

if (!function_exists('toArray')) {
    function toArray($array, $solidArray = true)
    {
        if (is_array($array)) return $array;
        return $array ? json_decode(is_string($array) ? $array : json_encode($array), $solidArray) : [];
    }
}

if (!function_exists('icons')) {
    function icons($icon = false)
    {
        $icons = [
            '<i class="fs-18 icon-xl fas fa-layer-group"></i>',
            '<i class="fs-18 icon-xl fas fa-book-reader"></i>',
            '<i class="fs-18 icon-xl fas fa-school"></i>',
            '<i class="fs-18 icon-xl fas fa-users"></i>',
            '<i class="fs-18 icon-xl fas fa-calendar-check"></i>',
            '<i class="fs-18 icon-xl fas fa-key"></i>',
            '<i class="fs-18 icon-xl fas fa-fingerprint"></i>',
            '<i class="fs-18 icon-xl far fa-sun"></i>',
            '<i class="fs-18 icon-xl fas fa-cogs"></i>',
            '<i class="fs-18 icon-xl fas fa-money-bill"></i>',
            '<i class="fs-18 icon-xl fas fa fa-filter"></i>',
            '<i class="fs-18 icon-xl fas fa-sms"></i>',
            '<i class="fs-18 icon-xl fas fa-street-view"></i>',
            '<i class="fs-18 icon-xl fas fa-globe-asia"></i>',
            '<i class="fs-18 icon-xl fas fa-restroom"></i>',
            '<i class="fs-18 icon-xl fas fa-bed"></i>',
            '<i class="fs-18 icon-xl fas fa-bus-alt"></i>',
            '<i class="fs-18 icon-xl fas fa-bullseye"></i>',
            '<i class="fs-18 icon-xl fas fa-book"></i>',
            '<i class="fs-18 icon-xl fas fa-bell"></i>',
            '<i class="fs-18 icon-xl far fa-clock"></i>',
            '<i class="fs-18 icon-xl fa fa-edit"></i>',
            '<i class="fs-18 icon-xl fas fa-list-alt"></i>',
            '<i class="fs-18 icon-xl fas fa-money-check-alt"></i>',
            '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 256 256" enable-background="new 0 0 256 256" xml:space="preserve">
            <g><g><path fill="#000000" d="M50.3,150.2v38.9l78,30.8l78.3-31.7V149l39.4-16.7l-39.6-40.6L246,53.6l-78.7-17.4l-36.5,30.1L91.3,36.1L10.7,51.9L51,92h5.2l72.1-23.1L200.7,92l-68,29.6L56.3,93.4v-3.8l-5.6,3.3L10,132.5L50.3,150.2z"/></g></g>
            </svg>',
            '<i class="fs-18 icon-xl fas fa-mail-bulk"></i>',
            '<i class="fs-18 icon-xl fas fa-user-md"></i>',
        ];
        return is_numeric($icon) && isset($icons[$icon]) ? $icons[$icon] : $icons;
    }
}

if (!function_exists('getNaves')) {
    function getNaves($withOutCheck = false)
    {
        $naves = Cache::remember('naves', 60 * 60 * 24, function () {
            return AppLink::where('status', 1)->groupBy('folder_indexing', 'id')->orderBy('folder_indexing')->get();
        });
        return $withOutCheck ? $naves : $naves->whereIn('id', role()->roleRoutes);
    }
}


if (!function_exists('whereFilter')) {
    function whereFilter($data, $filterBy = [])
    {
        return $data->filter(function ($item) use ($filterBy) {
            foreach ($filterBy as $key => $val) {
                if ($item->{$key} !== $val) {
                    return false;
                }
            }
            return true;
        });
    }
}

// // tow date interval
if (!function_exists('dateInterval')) {
    function dateInterval($from, $to, $nowCheck = true)
    {
        if ($nowCheck && strtotime($to) < strtotime("now")) {
            return 0;
        }
        $from = new DateTime($from);
        $to = new DateTime($to);
        $interval = $from->diff($to);
        return $interval->format('%a'); //now do whatever you like with $days
    }
}

// // to remove null value from array
if (!function_exists('removeNullItem')) {
    function removeNullItem($arrayData)
    {
        return is_array($arrayData) ? array_filter($arrayData, fn ($item) => $item) : $arrayData;
    }
}


if (!function_exists('getPercentage')) {
    function getPercentage($amount, $percentage, $reverse = false)
    {
        $amount = floatval($amount);
        $percentage = floatval($percentage);
        $amount = is_nan($amount) ? 0 : $amount;
        $percentage = is_nan($percentage) ? 0 : $percentage;

        $percentage = $reverse ? ($reverse * 100) / $amount : ($percentage / 100) * $amount;
        $percentage = number_format((float) $percentage, 2, '.', '');
        return is_nan($percentage) ? 0.00 : floatval($percentage);
    }
}

if (!function_exists('getHundredPercent')) {
    function getHundredPercent($totalNumber, $percentageFor)
    {
        return $totalNumber > 0 && $percentageFor > 0 ? number_format((float)($percentageFor * 100) / $totalNumber, 2, '.', '') : 0;
    }
}

if (!function_exists('multipleWhere')) {
    function multipleWhere($collection, array $keyValues)
    {
        return $collection->filter(function ($item) use ($keyValues) {
            $exists = true;
            foreach ($keyValues as $key => $val) {
                $cv = $item->{$key};
                $cv = is_string($cv) && is_numeric($cv) ? intval($cv) : $cv;
                $val = is_string($val) && is_numeric($val) ? intval($val) : $val;
                if ($cv !== $val) {
                    $exists = false;
                }
            }
            return $exists;
        });
    }
}

if (!function_exists('plusMinusDay')) {

    function plusMinusDay($processDate, $day, $format = 'Y-m-d')
    {
        return date($format, strtotime("{$day} day", strtotime($processDate)));
    }
}

if (!function_exists('numberFormat')) {
    function numberFormat($number, $characterNumber = 2)
    {
        return number_format((float) $number, $characterNumber, '.', '');
    }
}

if (!function_exists('superAdminInfo')) {
    function superAdminInfo()
    {
        return Cache::remember('superAdminInfo', 60 * 60 * 24, function () {
            return User::find(1);
        });
    }
}


if (!function_exists('array_filter_by_key')) {
    function array_filter_by_key($arrayData, $numeric = true)
    {
        return $numeric ? array_filter(is_array($arrayData) ? $arrayData : [], fn ($fk) => is_numeric($fk), ARRAY_FILTER_USE_KEY) :
            array_filter(is_array($arrayData) ? $arrayData : [], fn ($fk) => is_string($fk), ARRAY_FILTER_USE_KEY);
    }
}

if (!function_exists('is_contain_dot')) {
    function is_contain_dot($string)
    {
        return strpos($string, ".") !== false;
    }
}


//--------------------------------------------------------------------------------------------------------------------//
if (!function_exists('categories')) {
    function categories($keyBy = false)
    {
        $categories = Cache::remember('categories', 60 * 60 * 24, function () {
            return Category::where('status', 1)->get()->makeHidden(['created_at', 'updated_at']);
        });
        return $keyBy ? $categories->keyBy('id') : $categories;
    }
}

if (!function_exists('departments')) {
    function departments($keyBy = false)
    {
        $departments = Cache::remember('departments', 60 * 60 * 24, function () {
            return Department::where('status', 1)->get()->makeHidden(['created_at', 'updated_at']);
        });
        return $keyBy ? $departments->keyBy('id') : $departments;
    }
}

if (!function_exists('colors')) {
    function colors($keyBy = false)
    {
        $colors = Cache::remember('colors', 60 * 60 * 24, function () {
            return Color::where('status', 1)->get()->makeHidden(['created_at', 'updated_at']);
        });
        return $keyBy ? $colors->keyBy('id') : $colors;
    }
}

if (!function_exists('ages')) {
    function ages($keyBy = false)
    {
        $ages = Cache::remember('ages', 60 * 60 * 24, function () {
            return Age::where('status', 1)->get()->makeHidden(['created_at', 'updated_at']);
        });
        return $keyBy ? $ages->keyBy('id') : $ages;
    }
}

if (!function_exists('keywords')) {
    function keywords($keyBy = false)
    {
        $keywords = Cache::remember('keywords', 60 * 60 * 24, function () {
            return Keyword::where('status', 1)->get()->makeHidden(['created_at', 'updated_at']);
        });
        return $keyBy ? $keywords->keyBy('id') : $keywords;
    }
}

if (!function_exists('genders')) {
    function genders($keyBy = false)
    {
        $genders = Cache::remember('genders', 60 * 60 * 24, function () {
            return Gender::where('status', 1)->get()->makeHidden(['created_at', 'updated_at']);
        });
        return $keyBy ? $genders->keyBy('id') : $genders;
    }
}

if (!function_exists('productTypes')) {
    function productTypes($keyBy = false)
    {
        $productTypes = Cache::remember('productTypes', 60 * 60 * 24, function () {
            return ProductType::where('status', 1)->get()->makeHidden(['created_at', 'updated_at']);
        });
        return $keyBy ? $productTypes->keyBy('id') : $productTypes;
    }
}

if (!function_exists('folderAllFileFetch')) {
    function folderAllFileFetch($fromFolder, $toFolder = false, $isMove = false, $rename = false, $extension = false)
    {
        $fileNames = [];
        $fromPath = substr($fromFolder, 0, strlen($fromFolder) - 1);
        $toPath = $toFolder ? substr($toFolder, 0, strlen($toFolder) - 1) : false;

        if ($toFolder && !File::isDirectory($toPath)) {
            File::makeDirectory($toPath, 0777, true, true);
        }

        if (!File::isDirectory($fromPath)) {
            File::makeDirectory($fromPath, 0777, true, true);
        }

        $path = public_path(substr($fromFolder, 0, strlen($fromFolder) - 1));
        $files = File::allFiles($path);

        foreach ($files as $file) {
            $pathInfo = pathinfo($file);
            $fileName = $pathInfo['filename'];
            $fromPath = public_path("{$fromFolder}{$fileName}.{$pathInfo['extension']}");
            $toPath = $fromPath;

            if ($rename) {
                $fileNewName = time() . random_int(5, 95) . '.' . ($extension ?: $pathInfo['extension']);
                $toPath = public_path("{$toFolder}{$fileNewName}");
            }

            if ($isMove) {
                File::move($fromPath, $toPath);
            } elseif (isset($fileNewName)) {
                File::copy($fromPath, $toPath);
            }

            $fileNames[$fromPath] = $toPath;
        }

        return $fileNames;
    }
}

if (!function_exists('getCatch')) {
    function getCatch($keys = [], $toObject = false)
    {
        if (is_string($keys)) return session()->get($keys) ?: [];

        $keys = $keys ?: ['wishCatch', 'cartCatch'];
        foreach ($keys as $key) {
            $keys[$key] = session()->get($key) ?: [];
        }
        return $toObject ? fluent($keys) : $keys;
    }
}

if (!function_exists('homePageSliders')) {
    function homePageSliders($keyBy = false)
    {
        $sliders = Cache::remember('home-page-header-sliders', 60 * 60 * 24, function () {
            return HomeHeaderSlider::where('status', 1)->get()->makeHidden(['created_at', 'updated_at']);
        });
        return $keyBy ? $sliders->keyBy('id') : $sliders;
    }
}


if (!function_exists('testimonials')) {
    function testimonials($keyBy = false)
    {
        $testimonials = Cache::remember('testimonial-list', 60 * 60 * 24, function () {
            return Testimonial::where('status', 1)->get()->makeHidden(['created_at', 'updated_at']);
        });
        return $keyBy ? $testimonials->keyBy('id') : $testimonials;
    }
}

if (!function_exists('ourHistories')) {
    function ourHistories($keyBy = false)
    {
        $ourHistories = Cache::remember('our-histories', 60 * 60 * 24, function () {
            return OurHistory::where('status', 1)->get()->makeHidden(['created_at', 'updated_at']);
        });
        return $keyBy ? $ourHistories->keyBy('id') : $ourHistories;
    }
}

if (!function_exists('dynamicData')) {
    function dynamicData($key = false, $subKey = false)
    {
        $dynamicData = Cache::remember('dynamic-data-cache', 60 * 60 * 24, function () {
            return Setting::where('status', 1)->get()->makeHidden(['created_at', 'updated_at']);
        });

        $data = $key ? ($dynamicData->firstWhere('key', $key) ?: new Setting()) : $dynamicData;
        if(!$subKey) return $data;

        return $data->options[$subKey] ?? '';
    }
}


if (!function_exists('ourTeam')) {
    function ourTeam($key = false)
    {
        $ourTeam = Cache::remember('our-team-members', 60 * 60 * 24, function () {
            return OurTeamMember::where('status', 1)->get()->makeHidden(['created_at', 'updated_at']);
        });
        return $key ? ($ourTeam->firstWhere('key', $key) ?: new Setting()) : $ourTeam;
    }
}

if (!function_exists('doctors')) {
    function doctors($id = false)
    {
        $doctors = Cache::remember('our-doctors', 60 * 60 * 24, function () {
            return Doctor::where('status', 1)->get()->makeHidden(['created_at', 'updated_at'])->map(function($d) {
                if($d->options && $d->options->social_media) {
                    $options = $d->options;
                    $socialMedia = json_decode($d->options->social_media);
                    $options->social_media = $socialMedia;
                    $d->options = $options;
                }
                return $d;
            });
        });
        return $id ? ($doctors->firstWhere('id', $id) ?: new Doctor()) : $doctors;
    }
}

if (!function_exists('services')) {
    function services($id = false)
    {
        $services = Cache::remember('services', 60 * 60 * 24, function () {
            return Service::where('status', 1)->get()->makeHidden(['created_at', 'updated_at']);
        });
        return $id ? ($services->firstWhere('id', $id) ?: new Service()) : $services;
    }
}

if (!function_exists('healthPackages')) {
    function healthPackages($id = false)
    {
        $packages = Cache::remember('health-packages', 60 * 60 * 24, function () {
            return HealthPackage::where('status', 1)->get()->makeHidden(['created_at', 'updated_at']);
        });
        return $id ? ($packages->firstWhere('id', $id) ?: new HealthPackage()) : $packages;
    }
}

if (!function_exists('videoGallery')) {
    function videoGallery($id = false)
    {
        $videoGallery = Cache::remember('video-gallery-cache', 60 * 60 * 24, function () {
            return VideoGallery::where('status', 1)->get()->map(function($v) {
                $v->video_link = getEmbedLink($v->video);
                return $v;
            })->makeHidden(['created_at', 'updated_at']);
        });
        return $id ? ($videoGallery->firstWhere('id', $id) ?: new VideoGallery()) : $videoGallery;
    }
}
if (!function_exists('aboutPageTabs')) {
    function aboutPageTabs($id = false)
    {
        $aboutPageTabs = Cache::remember('about-page-tabs', 60 * 60 * 24, function () {
            return AboutPageTab::where('status', 1)->get()->makeHidden(['created_at', 'updated_at']);
        });
        return $id ? ($aboutPageTabs->firstWhere('id', $id) ?: new AboutPageTab()) : $aboutPageTabs;
    }
}

if (!function_exists('getEmbedLink')) {

    function getEmbedLink($youtubeLink)
    {
        if(!is_string($youtubeLink)) return $youtubeLink;

        $position = strpos($youtubeLink, 'www.youtube.com/embed');
        if ($position >= 2 && $position < 10) return trim($youtubeLink);
        $embedCode = preg_replace(
            "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
            "<iframe src=\"//www.youtube.com/embed/$2\"></iframe>",
            $youtubeLink
        );
        $doc = new \DOMDocument();
        $doc->loadHTML($embedCode);
        $xpath = new \DOMXPath($doc);
        return $xpath->evaluate("string(//iframe/@src)");
    }
}

if (!function_exists('languagePicker')) {

    function languagePicker($lang = 'en')
    {
        $languages = [
            'en' => 'English',
            'bn' => 'বাংলা',
            'ar' => 'عربي',
            'ur' => 'اردو',
            'ps' => 'پښتو',
            'hi' => 'हिंदी',
            'ml' => 'കേരളം',
        ];
        return $languages[$lang] ?? 'English';
    }
}
