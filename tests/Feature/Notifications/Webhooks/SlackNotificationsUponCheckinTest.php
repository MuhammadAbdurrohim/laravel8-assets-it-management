<?php

namespace Tests\Feature\Notifications\Webhooks;

use App\Events\CheckoutableCheckedIn;
use App\Models\Accessory;
use App\Models\Asset;
use App\Models\Component;
use App\Models\LicenseSeat;
use App\Models\Location;
use App\Models\User;
use App\Notifications\CheckinAccessoryNotification;
use App\Notifications\CheckinAssetNotification;
use App\Notifications\CheckinLicenseSeatNotification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

/**
 * @group notifications
 */
class SlackNotificationsUponCheckinTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Notification::fake();
    }

    public function assetCheckInTargets(): array
    {
        return [
            'Asset checked out to user' => [fn() => User::factory()->create()],
            'Asset checked out to asset' => [fn() => Asset::factory()->laptopMbp()->create()],
            'Asset checked out to location' => [fn() => Location::factory()->create()],
        ];
    }

    public function licenseCheckInTargets(): array
    {
        return [
            'License checked out to user' => [fn() => User::factory()->create()],
            'License checked out to asset' => [fn() => Asset::factory()->laptopMbp()->create()],
        ];
    }

    public function testAccessoryCheckinSendsSlackNotificationWhenSettingEnabled()
    {
        $this->settings->enableSlackWebhook();

        $this->fireCheckInEvent(
            Accessory::factory()->create(),
            User::factory()->create(),
        );

        $this->assertSlackNotificationSent(CheckinAccessoryNotification::class);
    }

    public function testAccessoryCheckinDoesNotSendSlackNotificationWhenSettingDisabled()
    {
        $this->settings->disableSlackWebhook();

        $this->fireCheckInEvent(
            Accessory::factory()->create(),
            User::factory()->create(),
        );

        $this->assertNoSlackNotificationSent(CheckinAccessoryNotification::class);
    }

    /** @dataProvider assetCheckInTargets */
    public function testAssetCheckinSendsSlackNotificationWhenSettingEnabled($checkoutTarget)
    {
        $this->settings->enableSlackWebhook();

        $this->fireCheckInEvent(
            Asset::factory()->create(),
            $checkoutTarget(),
        );

        $this->assertSlackNotificationSent(CheckinAssetNotification::class);
    }

    /** @dataProvider assetCheckInTargets */
    public function testAssetCheckinDoesNotSendSlackNotificationWhenSettingDisabled($checkoutTarget)
    {
        $this->settings->disableSlackWebhook();

        $this->fireCheckInEvent(
            Asset::factory()->create(),
            $checkoutTarget(),
        );

        $this->assertNoSlackNotificationSent(CheckinAssetNotification::class);
    }

    public function testComponentCheckinDoesNotSendSlackNotification()
    {
        $this->settings->enableSlackWebhook();

        $this->fireCheckInEvent(
            Component::factory()->create(),
            Asset::factory()->laptopMbp()->create(),
        );

        Notification::assertNothingSent();
    }

    /** @dataProvider licenseCheckInTargets */
    public function testLicenseCheckinSendsSlackNotificationWhenSettingEnabled($checkoutTarget)
    {
        $this->settings->enableSlackWebhook();

        $this->fireCheckInEvent(
            LicenseSeat::factory()->create(),
            $checkoutTarget(),
        );

        $this->assertSlackNotificationSent(CheckinLicenseSeatNotification::class);
    }

    /** @dataProvider licenseCheckInTargets */
    public function testLicenseCheckinDoesNotSendSlackNotificationWhenSettingDisabled($checkoutTarget)
    {
        $this->settings->disableSlackWebhook();

        $this->fireCheckInEvent(
            LicenseSeat::factory()->create(),
            $checkoutTarget(),
        );

        $this->assertNoSlackNotificationSent(CheckinLicenseSeatNotification::class);
    }

    private function fireCheckInEvent(Model $checkoutable, Model $target)
    {
        event(new CheckoutableCheckedIn(
            $checkoutable,
            $target,
            User::factory()->superuser()->create(),
            ''
        ));
    }
}
