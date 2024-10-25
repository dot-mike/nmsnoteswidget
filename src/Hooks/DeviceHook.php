<?php

namespace DotMike\NmsNotesWidget\Hooks;

use DotMike\NmsNotesWidget\Models\CustomField;

use App\Plugins\Hooks\DeviceOverviewHook;

class DeviceHook extends DeviceOverviewHook
{
    public string $view = 'nmsnoteswidget::device.overview';

    public function data(\App\Models\Device $device): array
    {
        return [
            'title' => 'Device Notes',
            'device' => $device,
            'url' => url('device/' . $device->device_id . '/notes'),
        ];
    }
}
