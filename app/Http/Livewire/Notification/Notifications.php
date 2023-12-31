<?php

namespace App\Http\Livewire\Notification;

use Livewire\Component;

class Notifications extends Component
{
    public  $count, $showCount = 3;

    protected $listeners = ['notification'];

    public function mount()
    {
        $this->notification();
    }

    public function notification()
    {
        //$this->notifications = auth()->user()->notifications;
        $this->count = auth()->user()->unreadNotifications->count();
    }

    public function render()
    {
        return view('livewire.notification.notifications');
    }

    public function getNotificationsProperty()
    {
        return auth()->user()->notifications()->take($this->showCount)->get();
    }

    public function loadMore()
    {
        $this->showCount += 3;
    }

    public function resetNotificationCount()
    {
        auth()->user()->notification = 0;
        auth()->user()->save();
    }

    public function read($notification_id)
    {
        $notification = auth()->user()->notifications()->findOrFail($notification_id);
        $notification->markAsRead();
    }
}
