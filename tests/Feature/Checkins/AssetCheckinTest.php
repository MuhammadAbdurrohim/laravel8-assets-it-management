<?php

namespace Tests\Feature\Checkins;

use App\Events\CheckoutableCheckedIn;
use App\Models\Asset;
use App\Models\CheckoutAcceptance;
use App\Models\LicenseSeat;
use App\Models\Location;
use App\Models\Statuslabel;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class AssetCheckinTest extends TestCase
{
    public function testCheckingInAssetRequiresCorrectPermission()
    {
        $this->actingAs(User::factory()->create())
            ->post(route('hardware.checkin.store', [
                'assetId' => Asset::factory()->assignedToUser()->create()->id,
            ]))
            ->assertForbidden();
    }

    public function testCannotCheckInAssetThatIsNotCheckedOut()
    {
        $this->actingAs(User::factory()->checkinAssets()->create())
            ->post(route('hardware.checkin.store', ['assetId' => Asset::factory()->create()->id]))
            ->assertSessionHas('error')
            ->assertRedirect(route('hardware.index'));
    }

    public function testAssetCanBeCheckedIn()
    {
        Event::fake([CheckoutableCheckedIn::class]);

        $user = User::factory()->create();
        $location = Location::factory()->create();
        $status = Statuslabel::first() ?? Statuslabel::factory()->create();
        $asset = Asset::factory()->assignedToUser($user)->create([
            'expected_checkin' => now()->addDay(),
            'last_checkin' => null,
            'accepted' => 'accepted',
        ]);

        $this->assertTrue($asset->assignedTo->is($user));

        $currentTimestamp = now();

        $this->actingAs(User::factory()->checkinAssets()->create())
            ->post(
                route('hardware.checkin.store', ['assetId' => $asset->id, 'backto' => 'user']),
                [
                    'name' => 'Changed Name',
                    'status_id' => $status->id,
                    'location_id' => $location->id,
                ],
            )
            ->assertRedirect(route('users.show', $user));

        $this->assertNull($asset->refresh()->assignedTo);
        $this->assertNull($asset->expected_checkin);
        $this->assertNotNull($asset->last_checkin);
        $this->assertNull($asset->assignedTo);
        $this->assertNull($asset->assigned_type);
        $this->assertNull($asset->accepted);
        $this->assertEquals('Changed Name', $asset->name);
        $this->assertEquals($status->id, $asset->status_id);
        $this->assertTrue($asset->location()->is($location));

        Event::assertDispatched(function (CheckoutableCheckedIn $event) use ($currentTimestamp) {
            // this could be better mocked but is ok for now.
            return Carbon::parse($event->action_date)->diffInSeconds($currentTimestamp) < 2;
        }, 1);
    }

    public function testLocationIsSetToRTDLocationByDefaultUponCheckin()
    {
        $rtdLocation = Location::factory()->create();
        $asset = Asset::factory()->assignedToUser()->create([
            'location_id' => Location::factory()->create()->id,
            'rtd_location_id' => $rtdLocation->id,
        ]);

        $this->actingAs(User::factory()->checkinAssets()->create())
            ->post(route('hardware.checkin.store', ['assetId' => $asset->id]));

        $this->assertTrue($asset->refresh()->location()->is($rtdLocation));
    }

    public function testDefaultLocationCanBeUpdatedUponCheckin()
    {
        $location = Location::factory()->create();
        $asset = Asset::factory()->assignedToUser()->create();

        $this->actingAs(User::factory()->checkinAssets()->create())
            ->post(route('hardware.checkin.store', ['assetId' => $asset->id]), [
                'location_id' => $location->id,
                'update_default_location' => 0
            ]);

        $this->assertTrue($asset->refresh()->defaultLoc()->is($location));
    }

    public function testAssetsLicenseSeatsAreClearedUponCheckin()
    {
        $asset = Asset::factory()->assignedToUser()->create();
        LicenseSeat::factory()->assignedToUser()->for($asset)->create();

        $this->assertNotNull($asset->licenseseats->first()->assigned_to);

        $this->actingAs(User::factory()->checkinAssets()->create())
            ->post(route('hardware.checkin.store', ['assetId' => $asset->id]));

        $this->assertNull($asset->refresh()->licenseseats->first()->assigned_to);
    }

    public function testLegacyLocationValuesSetToZeroAreUpdated()
    {
        $asset = Asset::factory()->canBeInvalidUponCreation()->assignedToUser()->create([
            'rtd_location_id' => 0,
            'location_id' => 0,
        ]);

        $this->actingAs(User::factory()->checkinAssets()->create())
            ->post(route('hardware.checkin.store', ['assetId' => $asset->id]));

        $this->assertNull($asset->refresh()->rtd_location_id);
        $this->assertEquals($asset->location_id, $asset->rtd_location_id);
    }

    public function testPendingCheckoutAcceptancesAreClearedUponCheckin()
    {
        $asset = Asset::factory()->assignedToUser()->create();

        $acceptance = CheckoutAcceptance::factory()->for($asset, 'checkoutable')->pending()->create();

        $this->actingAs(User::factory()->checkinAssets()->create())
            ->post(route('hardware.checkin.store', ['assetId' => $asset->id]));

        $this->assertFalse($acceptance->exists(), 'Acceptance was not deleted');
    }

    public function testCheckinTimeAndActionLogNoteCanBeSet()
    {
        Event::fake([CheckoutableCheckedIn::class]);

        $this->actingAs(User::factory()->checkinAssets()->create())
            ->post(route(
                'hardware.checkin.store',
                ['assetId' => Asset::factory()->assignedToUser()->create()->id]
            ), [
                'checkin_at' => '2023-01-02',
                'note' => 'hello'
            ]);

        Event::assertDispatched(function (CheckoutableCheckedIn $event) {
            return $event->action_date === '2023-01-02' && $event->note === 'hello';
        }, 1);
    }
}
