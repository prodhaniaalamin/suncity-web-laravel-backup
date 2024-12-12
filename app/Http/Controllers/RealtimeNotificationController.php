<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Events\NotificationEvent;
use App\Models\RealtimeNotification;

class RealtimeNotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = RealtimeNotification::with(['createdBy', 'sendFor']);
        if (role(1) === 1) {
            $notifications = $notifications->where('send_type', 1)->latest()->get();
        } else {
            $notifications = $notifications->where(function ($query) {
                $query->whereNull('send_type');
            })->orWhere(function ($query) {
                $query->where('send_type', user()->role_d);
            })->latest()->get();
        }
        return view('admin.notification.index', ['notificationList' => $notifications]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notification.create');
    }
    public function imageUpload(Request $request)
    {
        return response()->json(['url' => image($this->fileUploadHandle('ckeditorFiles', false, 'upload'))]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sendType = is_numeric($request->send_type) ? intval($request->send_type) : null;
        $whereConditions = $sendType ? ['role_id' => $sendType] : [];
        $users = User::select(['id', 'notifications'])->where($whereConditions)->get();

        $container = $request->all();
        $container['send_type'] = $sendType;
        $container['created_by'] = user()->id;
        $container['school_id'] = user()->school_id;
        $container['attached'] = $this->fileUploadHandle('notificationAttachFiles', false, 'attached');
        $notification = RealtimeNotification::create($container);
        $notification = $notification->toArray();
        unset($notification['content']);
        $id = $notification['id'];

        $users->each(fn ($user) => $user->update(['notifications' => array_merge($user->notifications ?: [], [$id])]));

        // event(new NotificationEvent(json_encode($notification)));
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RealtimeNotification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(RealtimeNotification $notification)
    {
        $user = user();
        $notifications = array_merge($user->notifications ?: [], []);
        unset($notifications[array_search($notification->id, $notifications)]);
        user()->update(['notifications' => empty($notifications) ? null : $notifications]);
        return view('admin.notification.show', ['notification' => $notification]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RealtimeNotification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(RealtimeNotification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RealtimeNotification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RealtimeNotification $notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RealtimeNotification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(RealtimeNotification $notification)
    {
        //
    }
}
