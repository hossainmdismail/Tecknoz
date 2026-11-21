<x-filament-widgets::widget class="fi-dashboard-quick-links">
    <div style="display: grid; gap: 1.5rem;">
        <x-filament::section heading="Quick Actions">
            <div style="display: grid; gap: 1.25rem;">
                <div style="display: flex; flex-wrap: wrap; gap: 0.5rem;">
                    @foreach ($createLinks as $label => $url)
                        <x-filament::button :href="$url" icon="heroicon-m-plus" size="sm" tag="a">
                            {{ $label }}
                        </x-filament::button>
                    @endforeach
                </div>

                <div style="display: grid; gap: 1.25rem; grid-template-columns: repeat(auto-fit, minmax(min(100%, 16rem), 1fr));">
                    @foreach ($linkGroups as $heading => $links)
                        <div>
                            <h3 style="margin: 0 0 0.625rem; font-size: 0.875rem; font-weight: 600;">{{ $heading }}</h3>
                            <div style="display: flex; flex-wrap: wrap; gap: 0.5rem;">
                                @foreach ($links as $label => $url)
                                    <x-filament::button :href="$url" color="gray" size="sm" tag="a">
                                        {{ $label }}
                                    </x-filament::button>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </x-filament::section>

        <x-filament::section
            heading="Active Sessions"
            description="Shows how many browsers are currently signed in with this same account."
        >
            @if (! $supportsDatabaseSessions)
                <p style="margin: 0; font-size: 0.95rem; line-height: 1.6; color: rgb(148 163 184);">
                    Active session tracking is only available when the app is using the database session driver.
                </p>
            @else
                <div style="display: flex; align-items: center; justify-content: space-between; gap: 1rem; margin-bottom: 1rem; flex-wrap: wrap;">
                    <div>
                        <h3 style="margin: 0 0 0.25rem; font-size: 1rem; font-weight: 700;">
                            {{ count($activeSessions) }} active {{ \Illuminate\Support\Str::plural('session', count($activeSessions)) }}
                        </h3>
                        <p style="margin: 0; font-size: 0.9rem; line-height: 1.6; color: rgb(148 163 184);">
                            Current browser is marked, and you can log out any other device from here.
                        </p>
                    </div>

                    @if (count($activeSessions) > 1)
                        <x-filament::button color="danger" size="sm" wire:click="revokeOtherSessions">
                            Log Out Other Devices
                        </x-filament::button>
                    @endif
                </div>

                <div style="display: grid; gap: 0.875rem;">
                    @forelse ($activeSessions as $session)
                        <div
                            style="
                                display: flex;
                                align-items: flex-start;
                                justify-content: space-between;
                                gap: 1rem;
                                border: 1px solid rgba(148, 163, 184, 0.22);
                                border-radius: 1rem;
                                padding: 1rem 1.1rem;
                                background: rgba(255, 255, 255, 0.02);
                            "
                        >
                            <div style="min-width: 0;">
                                <div style="display: flex; align-items: center; gap: 0.625rem; margin-bottom: 0.4rem; flex-wrap: wrap;">
                                    <strong style="font-size: 0.98rem;">{{ $session['ip_address'] }}</strong>

                                    @if ($session['is_current'])
                                        <span
                                            style="
                                                display: inline-flex;
                                                align-items: center;
                                                border-radius: 999px;
                                                background: rgba(0, 161, 176, 0.12);
                                                color: #00a1b0;
                                                padding: 0.2rem 0.55rem;
                                                font-size: 0.78rem;
                                                font-weight: 700;
                                            "
                                        >
                                            Current Device
                                        </span>
                                    @endif
                                </div>

                                <p style="margin: 0 0 0.35rem; font-size: 0.92rem; line-height: 1.5; color: rgb(226 232 240); word-break: break-word;">
                                    {{ $session['user_agent'] }}
                                </p>

                                <p style="margin: 0; font-size: 0.84rem; line-height: 1.5; color: rgb(148 163 184);">
                                    Last active {{ $session['last_active'] }}
                                </p>
                            </div>

                            @if (! $session['is_current'])
                                <x-filament::button color="gray" size="sm" wire:click="revokeSession('{{ $session['id'] }}')">
                                    Log Out
                                </x-filament::button>
                            @endif
                        </div>
                    @empty
                        <p style="margin: 0; font-size: 0.95rem; line-height: 1.6; color: rgb(148 163 184);">
                            No active sessions were found for this account right now.
                        </p>
                    @endforelse
                </div>
            @endif
        </x-filament::section>
    </div>
</x-filament-widgets::widget>
