@extends('layouts.admin')

@section('content')
@php
    use Carbon\Carbon;
    $today = Carbon::now()->setTimezone('Asia/Manila');
    $startOfWeek = $today->copy()->startOfWeek();
    $weekDates = [];

    for ($i = 0; $i < 5; $i++) {
        $weekDates[$i] = $startOfWeek->copy()->addDays($i);
    }
    
    $isReschedule = isset($schedule);
@endphp

{{-- Include Tailwind CDN if not already in layout --}}
<script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    'clsu-green': '#006633',
                    'clsu-green-dark': '#004d26',
                    'clsu-green-light': '#008844',
                    'clsu-yellow': '#FFD700',
                    'clsu-gold': '#D4AF37',
                    'clsu-gold-light': '#F5E6A3',
                    'cream': '#FFFEF7',
                    'warm-white': '#FEFDFB',
                },
                fontFamily: {
                    'franklin': ['Libre Franklin', 'system-ui', 'sans-serif'],
                    'playfair': ['Playfair Display', 'Georgia', 'serif'],
                }
            }
        }
    }
</script>
<link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">

{{-- Custom styles for radio button that can't be done with pure Tailwind --}}
<style>
    .clsu-radio {
        appearance: none;
        -webkit-appearance: none;
        width: 24px;
        height: 24px;
        border: 2px solid rgba(0, 102, 51, 0.12);
        border-radius: 50%;
        cursor: pointer;
        transition: all 0.25s ease;
        position: relative;
        background: #fff;
        flex-shrink: 0;
    }
    @media (min-width: 640px) {
        .clsu-radio {
            width: 28px;
            height: 28px;
        }
    }
    .clsu-radio:hover {
        border-color: #006633;
        box-shadow: 0 0 0 4px rgba(0, 102, 51, 0.1);
    }
    .clsu-radio:checked {
        border-color: #006633;
        background: #006633;
    }
    .clsu-radio:checked::after {
        content: '✓';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: #fff;
        font-size: 0.75rem;
        font-weight: bold;
    }
    @media (min-width: 640px) {
        .clsu-radio:checked::after {
            font-size: 0.85rem;
        }
    }
</style>

<div class="min-h-screen p-4 sm:p-6 lg:p-8 relative font-franklin" style="background: linear-gradient(165deg, #FFFEF7 0%, #f0f7f0 50%, #FEFDFB 100%);">
    
    {{-- Background decoration --}}
    <div class="absolute top-0 left-0 right-0 h-72 pointer-events-none" 
         style="background: radial-gradient(ellipse 80% 50% at 20% 40%, rgba(0, 102, 51, 0.03) 0%, transparent 50%), radial-gradient(ellipse 60% 40% at 80% 30%, rgba(212, 175, 55, 0.04) 0%, transparent 50%);"></div>

    {{-- Alerts --}}
    @if(session('error'))
    <div class="relative z-10 flex items-center gap-3 px-4 sm:px-5 py-3 sm:py-4 mb-4 sm:mb-6 rounded-xl font-medium text-red-800 max-w-[1100px] mx-auto text-sm sm:text-base" 
         style="background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);">
        <i class="fa fa-exclamation-circle"></i>
        {{ session('error') }}
    </div>
    @endif
    {{-- Success Message --}}
    @if(session('success'))
        <div data-success-message="{{ session('success') }}" style="display: none;"></div>
    @endif

    {{-- Main Card --}}
    <div class="relative z-10 bg-warm-white rounded-xl sm:rounded-2xl overflow-hidden border border-clsu-green/10 max-w-[1100px] mx-auto"
         style="box-shadow: 0 4px 6px rgba(0, 102, 51, 0.04), 0 20px 40px rgba(0, 102, 51, 0.08);">
        
        {{-- Card Header --}}
        <div class="relative px-4 sm:px-6 lg:px-8 py-4 sm:py-6"
             style="background: linear-gradient(135deg, {{ $isReschedule ? '#f59e0b 0%, #d97706' : '#006633 0%, #004d26' }} 100%);">
            {{-- Decorative circle --}}
            <div class="absolute -top-1/2 -right-[10%] w-32 sm:w-52 h-32 sm:h-52 pointer-events-none"
                 style="background: radial-gradient(circle, rgba(255, 215, 0, 0.15) 0%, transparent 70%);"></div>
            {{-- Gold accent line --}}
            <div class="absolute bottom-0 left-0 right-0 h-1"
                 style="background: linear-gradient(90deg, #FFD700 0%, #D4AF37 50%, #FFD700 100%);"></div>
            
            <h1 class="relative z-10 font-playfair font-bold text-xl sm:text-2xl text-white mb-1 sm:mb-2 flex items-center gap-2 sm:gap-3">
                <i class="fa fa-calendar{{ $isReschedule ? '' : '-plus' }} text-clsu-yellow"></i>
                {{ $isReschedule ? 'Reschedule Interview' : 'Interview Schedule' }}
            </h1>
            <p class="relative z-10 text-white/90 text-sm sm:text-base">
                {{ $isReschedule ? 'Select a new time slot for the interview' : 'Select a time slot and enter a location for the interview' }}
            </p>
        </div>

        <form action="{{ $isReschedule ? route('schedule.updateReschedule', $schedule->id) : route('schedule.store') }}" method="POST">
            @csrf
            @if($isReschedule) @method('PUT') @endif

            <div class="p-4 sm:p-6 lg:p-8">
                
                {{-- Location Input --}}
                <div class="mb-5 sm:mb-7">
                    <label class="block font-semibold text-gray-800 mb-2 text-sm sm:text-base">
                        <i class="fa fa-map-marker text-clsu-green mr-2"></i>
                        Interview Location
                    </label>
                    <input type="text" 
                           name="location" 
                           id="location" 
                           class="w-full px-4 sm:px-5 py-2.5 sm:py-3 border-2 border-clsu-green/10 rounded-xl bg-white transition-all duration-300 text-gray-800 text-sm sm:text-base focus:outline-none focus:border-clsu-green focus:ring-4 focus:ring-clsu-green/10" 
                           placeholder="e.g., CLSU Admin Building, Room 203"
                           required 
                           value="{{ $schedule->interview_location ?? old('location') }}">
                </div>

                {{-- Selected Applicants --}}
                <div class="rounded-xl sm:rounded-2xl p-4 sm:p-5 mb-5 sm:mb-8 border border-clsu-green/10" 
                     style="background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 100%);">
                    <h3 class="font-playfair font-semibold text-base sm:text-lg text-clsu-green mb-3 sm:mb-4 flex items-center gap-2">
                        <i class="fa fa-users text-clsu-gold"></i>
                        Selected Applicants ({{ count($applicants) }})
                    </h3>
                    <ul class="flex flex-wrap gap-2 list-none p-0 m-0">
                        @foreach($applicants as $applicant)
                            <li class="inline-flex items-center gap-2 bg-white border border-clsu-green/10 px-3 sm:px-4 py-1.5 sm:py-2 rounded-full text-xs sm:text-sm font-medium text-gray-800">
                                <i class="fa fa-user text-clsu-green text-xs"></i>
                                <input type="hidden" name="applicant_ids[]" value="{{ $applicant->id }}">
                                <span class="truncate max-w-[150px] sm:max-w-none">{{ $applicant->first_name }} {{ $applicant->middle_name }} {{ $applicant->last_name }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Schedule Table --}}
                <div class="mb-5 sm:mb-8">
                    <h3 class="font-playfair font-semibold text-base sm:text-lg text-gray-800 mb-3 sm:mb-4 flex items-center gap-2">
                        <i class="fa fa-clock-o text-clsu-gold"></i>
                        Select Time Slot
                    </h3>
                    
                    {{-- Legend --}}
                    <div class="flex gap-4 sm:gap-6 mb-3 sm:mb-4 text-xs sm:text-sm text-gray-600">
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full border-2 border-clsu-green/20 bg-white"></span>
                            Available
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full bg-clsu-green"></span>
                            Selected
                        </div>
                    </div>

                    {{-- Desktop Table View --}}
                    <div class="hidden md:block overflow-x-auto rounded-xl sm:rounded-2xl border border-clsu-green/10 bg-white">
                        <table class="w-full border-collapse min-w-[700px]">
                            <thead style="background: linear-gradient(180deg, #006633 0%, #004d26 100%);">
                                <tr>
                                    <th class="px-4 sm:px-5 py-3 sm:py-4 text-left text-xs sm:text-sm font-semibold text-white border-r border-white/10 bg-clsu-green-dark">
                                        Time Slot
                                    </th>
                                    @foreach ($weekDates as $date)
                                        <th class="px-3 sm:px-4 py-3 sm:py-4 text-center text-white border-r border-white/10 last:border-r-0">
                                            <span class="block text-xs sm:text-sm font-semibold mb-0.5">{{ $date->format('l') }}</span>
                                            <span class="block text-[10px] sm:text-xs font-normal opacity-85">{{ $date->format('M d, Y') }}</span>
                                        </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(["8:00 AM - 10:00 AM", "10:00 AM - 12:00 PM", "1:00 PM - 2:00 PM", "3:00 PM - 4:00 PM"] as $time)
                                <tr class="transition-colors duration-200 hover:bg-clsu-green/[0.02]">
                                    <td class="px-4 sm:px-5 py-2.5 sm:py-3 border-b border-r border-clsu-green/10 font-semibold text-gray-800 whitespace-nowrap text-xs sm:text-sm"
                                        style="background: linear-gradient(90deg, #f8fafc 0%, #fff 100%);">
                                        <i class="fa fa-clock-o text-clsu-gold mr-2"></i>
                                        {{ $time }}
                                    </td>
                                    @foreach ($weekDates as $date)
                                        <td class="px-3 sm:px-4 py-2.5 sm:py-3 border-b border-r border-clsu-green/10 text-center last:border-r-0">
                                            <div class="flex justify-center items-center">
                                                <input type="radio" 
                                                       class="clsu-radio schedule-checkbox" 
                                                       name="schedule[date_time]"
                                                       value="{{ $date->toDateString() }}|{{ $time }}"
                                                       @if($isReschedule && $schedule->interview_date == $date->toDateString() && $schedule->interview_time == $time) checked @endif
                                                       required>
                                            </div>
                                        </td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Mobile Cards View --}}
                    <div class="md:hidden space-y-4">
                        @foreach ($weekDates as $date)
                            <div class="border border-clsu-green/10 rounded-xl overflow-hidden bg-white">
                                {{-- Day Header --}}
                                <div class="px-4 py-3 text-white font-semibold text-sm"
                                     style="background: linear-gradient(135deg, #006633 0%, #004d26 100%);">
                                    <span class="block">{{ $date->format('l') }}</span>
                                    <span class="text-xs font-normal opacity-85">{{ $date->format('M d, Y') }}</span>
                                </div>
                                {{-- Time Slots --}}
                                <div class="divide-y divide-gray-100">
                                    @foreach(["8:00 AM - 10:00 AM", "10:00 AM - 12:00 PM", "1:00 PM - 2:00 PM", "3:00 PM - 4:00 PM"] as $time)
                                        <label class="flex items-center justify-between px-4 py-3 cursor-pointer hover:bg-gray-50 transition-colors">
                                            <span class="text-sm text-gray-800 font-medium">
                                                <i class="fa fa-clock-o text-clsu-gold mr-2"></i>
                                                {{ $time }}
                                            </span>
                                            <input type="radio" 
                                                   class="clsu-radio schedule-checkbox" 
                                                   name="schedule[date_time]"
                                                   value="{{ $date->toDateString() }}|{{ $time }}"
                                                   @if($isReschedule && $schedule->interview_date == $date->toDateString() && $schedule->interview_time == $time) checked @endif
                                                   required>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Submit Button --}}
                <div class="flex flex-col sm:flex-row justify-end gap-3 sm:gap-4 pt-4 border-t border-clsu-green/10">
                    <a href="{{ route('admin.accepted.applicants') }}" 
                       class="inline-flex items-center justify-center gap-2 px-6 sm:px-8 py-2.5 sm:py-3 rounded-full font-semibold text-sm sm:text-base bg-gray-200 text-gray-700 transition-all duration-300 hover:-translate-y-0.5 hover:bg-gray-300 hover:shadow-md no-underline order-2 sm:order-1">
                        <i class="fa fa-arrow-left"></i>
                        Back
                    </a>
                    <button type="submit" 
                            class="inline-flex items-center justify-center gap-2 px-6 sm:px-8 py-2.5 sm:py-3 rounded-full font-semibold text-sm sm:text-base text-white transition-all duration-300 hover:-translate-y-0.5 order-1 sm:order-2"
                            style="background: linear-gradient(135deg, {{ $isReschedule ? '#f59e0b 0%, #d97706' : '#006633 0%, #004d26' }} 100%); box-shadow: 0 4px 15px {{ $isReschedule ? 'rgba(245, 158, 11, 0.3)' : 'rgba(0, 102, 51, 0.3)' }};">
                        <i class="fa fa-{{ $isReschedule ? 'refresh' : 'check' }}"></i>
                        {{ $isReschedule ? 'Confirm Reschedule' : 'Submit Schedule' }}
                    </button>
                </div>
            </div>
        </form>

        {{-- Footer --}}
        <div class="flex justify-between items-center px-4 sm:px-6 lg:px-8 py-2.5 sm:py-3"
             style="background: linear-gradient(90deg, {{ $isReschedule ? '#f59e0b 0%, #d97706' : '#006633 0%, #004d26' }} 100%);">
            <span class="text-white/90 text-[10px] sm:text-xs italic">Sieving for Excellence</span>
            <span class="flex items-center gap-1.5 font-semibold text-[10px] sm:text-xs {{ $isReschedule ? 'text-white' : 'text-clsu-yellow' }}">
                <i class="fa fa-university"></i>
                CLSU
            </span>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const checkboxes = document.querySelectorAll(".schedule-checkbox");
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener("change", function () {
                checkboxes.forEach(cb => {
                    if (cb !== this) cb.checked = false;
                });
            });
        });
    });
</script>
@endsection